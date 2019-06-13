var basePath = $('meta[name="_basePath"]').attr('content');
let currentUser
let room;
var messages = {};
var initial = false;
var unreadCount = 0;


$(document).ready(function () {
    if ($('.chat-popup').length > 0) {
        const user_id = $('.chat-popup').data('user-id');
        const tokenProvider = new Chatkit.TokenProvider({
            url: basePath + '/login/chat-end-point',
            queryParams: {
                type: 'chatkit'
            },
            headers: {
                'X-CSRF-Token': $('meta[name="_csrfToken"]').attr('content'),
                'x-requested-with': 'XMLHttpRequest'
            }
        })

        $('.open-chat').click(function(e) {
            $('.chat-popup').show();
        });

        $('.close-chat').click(function(e) {
            $('.chat-popup').hide();
        });

        $(document.body).on('click', '.invoice-order' ,function(){
            var roomId = $(this).parents('li').data('room-id');
            var elementMessage = $('.chat-popup').find('.chat-history')
                .attr('active-room-id', roomId);
            elementMessage.find('#messages').html(''); //clear html

            $('.wrapper-invoice-order').removeClass('active');
            var unreadElement = $(this).parents('li').addClass('active');

            if (typeof messages[roomId] != 'undefined') {
                for(var i in messages[roomId]) {
                    if (unreadElement.hasClass('unread')) {
                        currentUser.setReadCursor({
                            roomId: messages[roomId][i].roomId,
                            position: messages[roomId][i].id
                        })
                        .then(() => {
                            //console.log('Success!')
                            --unreadCount;
                            var b = getChatBadge();
                            if (unreadCount <= 0) {
                                b.hide();
                            } else {
                                b.show().text(unreadCount);
                            }
                        })
                        .catch(err => {
                            //console.log(`Error setting cursor: ${err}`)
                        });
                    }

                    renderChatMessages(messages[roomId][i]);
                }
                $('.chat-popup').find('.chat-history')
                    .scrollTop(elementMessage.find('#messages').height());
                    //.animate({ scrollTop: elementMessage.height() }, 1000);

                //elementMessage.append(`<li class="typing">&nbsp;</li>`);
            }

            unreadElement.removeClass('unread');


        });

        $('#message-to-send').keyup(function () {
            //console.log('sedang menulis');
            var roomId = $('.chat-popup').find('.chat-history')
                .attr('active-room-id');
            currentUser.isTypingIn({ roomId: roomId })
                .then(() => {
                    //console.log('Success!')
                })
                .catch(err => {
                    //console.log(`Error sending typing indicator: ${err}`)
                });
        });

        $('.chat-popup').find('form').submit(function(e) {
            e.preventDefault();
            var messageToSend = $(this).find('#message-to-send');
            var roomId = $(this).find('.chat-history').attr('active-room-id');
            //console.log(messageToSend.val());

            currentUser
                .sendMessage({
                    text: messageToSend.val(),
                    roomId: roomId,
                    // attachment: {
                    //   link: 'https://assets.zeit.co/image/upload/front/api/deployment-state.png',
                    //   type: 'image',
                    // },
                    attachment: undefined
                })
                .then(messageId => {
                    console.log("Success!", messageId)
                    messageToSend.val('');
                })
                .catch(error => {
                    console.log("Error", error)
                })


        });


        const noopLogger = (...items) => {}

        const chatManager = new Chatkit.ChatManager({
            instanceLocator: 'v1:us1:643558e4-7a90-485c-b398-56de24a33bff',
            tokenProvider: tokenProvider,
            userId: user_id
        });

        chatManager
            .connect({
                onAddedToRoom: room => {
                    //console.log("added to room: ", room);
                    $('#list-invoice').prepend(subscribeRoom(room));

                },
                onRemovedFromRoom: room => {
                    //console.log("removed from room: ", room);
                    var elementInvoiceList = $('.wrapper-invoice-order[data-room-id="'+room.id+'"]');
                    elementInvoiceList.remove();
                    $('#list-invoice .invoice-order:first').trigger('click');

                },
                onUserJoinedRoom: (room, user) => {
                    //console.log("user: ", user, " joined room: ", room)
                },
                onUserLeftRoom: (room, user) => {
                    //console.log("user: ", user, " left room: ", room)
                },
                onPresenceChanged: ({ previous, current }, user) => {
                    //console.log("user: ", user, " was ", previous, " but is now ", current)
                },
            })
            .then(cUser => {
                currentUser = cUser
                window.currentUser = cUser
                const roomToSubscribeTo = currentUser.rooms[0]
                var domInvoice = '';
                var rooms = currentUser.rooms.reverse();
                for(var i in rooms) {
                    if (rooms[i]) {
                        domInvoice += subscribeRoom(rooms[i]);
                    }
                }
                $('#list-invoice').html(domInvoice);
                $('#list-invoice .invoice-order:first').trigger('click');
                //console.log("Successful connection", currentUser);
                setTimeout(function () {
                    initial = true;
                }, 5000);

            })
            .catch(err => {
                console.log("Error on connection: ", err)
            });


        function subscribeRoom(room) {
            //console.log("Going to subscribe to", room)
            unreadCount += room.unreadCount;
            currentUser.subscribeToRoom({
                roomId: room.id,
                hooks: {
                    onMessage: message => {
                        //console.log("new message:", message);
                        if (typeof messages[message.roomId] === 'undefined') {
                            messages[message.roomId] = [];
                        }
                        messages[message.roomId].push(message);

                        var elementMessage = $('.chat-popup').find('#messages');
                        if ($('.chat-history').attr('active-room-id') === message.roomId) {
                            renderChatMessages(message);
                            $('.chat-popup').find('.chat-history')
                                .scrollTop(elementMessage.height());
                        } else if (initial) {
                            $('.wrapper-invoice-order[data-room-id="'+message.roomId+'"]').addClass('unread');
                        }

                        if (initial) {
                            getChatBadge().show().text(++unreadCount);
                        }
                    },

                    onUserStartedTyping: user => {
                        //console.log(`User ${user.name} started typing`, user);
                        var elementMessage = $('.chat-history[active-room-id="'+room.id+'"]').find('.typing').text(`${user.name} started typing`);
                    },
                    onUserStoppedTyping: user => {
                        //console.log(`User ${user.name} stopped typing`);
                        var elementMessage = $('.chat-history[active-room-id="'+room.id+'"]').find('.typing').html('&nbsp; ');
                    }
                },
            });


            var chatBadge = getChatBadge();
            if (unreadCount > 0) {
                chatBadge.show().text(unreadCount);
            } else {
                chatBadge.hide().text('0');
            }
            var unreadClass = '';
            if (room.unreadCount > 0) {
                unreadClass = 'unread';
            }

            return '<li class="clearfix wrapper-invoice-order '+unreadClass+'" data-room-id="'+room.id+'">\n' +
                '<a href="javascript:void(0);" class="about invoice-order">\n' +
                '<div class="status">Nomor Pesanan</div>\n' +
                '<div class="name">'+room.name+'</div> \n' +
                '</a>\n' +
                '</li>';
        }

        function getChatBadge() {
            return  $('.chat-wrapper .open-button .chat__badge');
        }

        function renderChatMessages(message) {
            var messagesList = document.getElementById("messages");
            var messageItem = document.createElement("li");

            /*currentUser.setReadCursor({
                roomId: message.roomId,
                position: message.id
            })
                .then(() => {
                    console.log('Success!')
                })
                .catch(err => {
                    console.log(`Error setting cursor: ${err}`)
                });*/
            var textDiv;
            if (user_id.toUpperCase() === message.senderId.toUpperCase()) {
                messageItem.className = "clearfix"
                messagesList.append(messageItem)
                textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data align-right" data-message-id="'+message.id+'">\n' +
                    '<span class="message-data-time">'+ moment(message.createdAt).calendar(null, {sameElse: 'YYYY-MM-DD h:MM A'}) +'</span> &nbsp; &nbsp;\n' +
                    '<span class="message-data-name">'+message.sender.name+'</span> <i class="fa fa-circle me"></i> \n' +
                    '</div>\n' +
                    '<div class="message other-message float-right">'+message.text+'</div>';
                messageItem.appendChild(textDiv);
            } else {
                messageItem.className = ""
                messagesList.append(messageItem)
                textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data" data-message-id="'+message.id+'">\n' +
                    '<i class="fa fa-circle me"></i> <span class="message-data-name">'+message.sender.name+'</span> \n' +
                    '<span class="message-data-time">'+ moment(message.createdAt).calendar(null, {sameElse: 'YYYY-MM-DD h:MM A'}) +'</span> &nbsp; &nbsp;\n' +
                    '</div>\n' +
                    '<div class="message my-message">'+message.text+'</div>';
                messageItem.appendChild(textDiv);
            }

        }
    }

});

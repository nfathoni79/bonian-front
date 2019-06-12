var basePath = $('meta[name="_basePath"]').attr('content');
let currentUser
let room;
var messages = {};


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
            var elementMessage = $('.chat-popup').find('#messages')
                .attr('active-room-id', roomId);
            elementMessage.html(''); //clear html
            if (typeof messages[roomId] != 'undefined') {
                for(var i in messages[roomId]) {
                    renderChatMessages(messages[roomId][i]);
                }
                $('.chat-popup').find('.chat-history')
                    .scrollTop(elementMessage.height());
                    //.animate({ scrollTop: elementMessage.height() }, 1000);
            }
        });

        $('.chat-popup').find('form').submit(function(e) {
            e.preventDefault();
            var messageToSend = $(this).find('#message-to-send');
            var roomId = $(this).find('#messages').attr('active-room-id');
            console.log(messageToSend.val());

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
            userId: user_id,
            logger: {
                info: console.log,
                warn: console.log,
                error: console.log,
                debug: console.log,
                verbose: console.log,
            },
        });

        chatManager
            .connect({
                onAddedToRoom: room => {
                    console.log("added to room: ", room)
                },
                onRemovedFromRoom: room => {
                    console.log("removed from room: ", room)
                },
                onUserJoinedRoom: (room, user) => {
                    console.log("user: ", user, " joined room: ", room)
                },
                onUserLeftRoom: (room, user) => {
                    console.log("user: ", user, " left room: ", room)
                },
                onPresenceChanged: ({ previous, current }, user) => {
                    console.log("user: ", user, " was ", previous, " but is now ", current)
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
                        console.log("Going to subscribe to", rooms[i])
                        currentUser.subscribeToRoom({
                            roomId: rooms[i].id,
                            hooks: {
                                onMessage: message => {
                                    console.log("new message:", message);
                                    if (typeof messages[message.roomId] === 'undefined') {
                                        messages[message.roomId] = [];
                                    }
                                    messages[message.roomId].push(message);
                                    var elementMessage = $('.chat-popup').find('#messages');
                                    if (elementMessage.attr('active-room-id') === message.roomId) {
                                        renderChatMessages(message);
                                        $('.chat-popup').find('.chat-history')
                                            .scrollTop(elementMessage.height());
                                    }
                                },
                            },
                        });
                        domInvoice += '<li class="clearfix" data-room-id="'+rooms[i].id+'">\n' +
                            '<a href="javascript:void(0);" class="about invoice-order">\n' +
                            '<div class="status">Nomor Pesanan</div>\n' +
                            '<div class="name">'+rooms[i].name+'</div> \n' +
                            '</a>\n' +
                            '</li>';
                    }
                }
                $('#list-invoice').html(domInvoice);
                console.log("Successful connection", currentUser)
            })
            .catch(err => {
                console.log("Error on connection: ", err)
            });

        function renderChatMessages(message) {
            var messagesList = document.getElementById("messages");
            var messageItem = document.createElement("li");
            if (user_id.toUpperCase() === message.senderId.toUpperCase()) {
                messageItem.className = ""
                messagesList.append(messageItem)
                var textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data">\n' +
                    '<span class="message-data-time">'+moment(message.createdAt).fromNow()+'</span> &nbsp; &nbsp;\n' +
                    '<span class="message-data-name">'+message.sender.name+'</span> <i class="fa fa-circle me"></i> \n' +
                    '</div>\n' +
                    '<div class="message my-message">'+message.text+'</div>';
                messageItem.appendChild(textDiv);
            } else {
                messageItem.className = "clearfix"
                messagesList.append(messageItem)
                var textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data align-right">\n' +
                    '<span class="message-data-time">'+moment(message.createdAt).fromNow()+'</span> &nbsp; &nbsp;\n' +
                    '<span class="message-data-name">'+message.sender.name+'</span> <i class="fa fa-circle me"></i> \n' +
                    '</div>\n' +
                    '<div class="message other-message float-right">'+message.text+'</div>';
                messageItem.appendChild(textDiv);
            }
        }
    }

});

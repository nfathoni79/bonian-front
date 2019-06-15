var basePath = $('meta[name="_basePath"]').attr('content');
let currentUser
let room;
var messages = {};
var initial = false;
var unreadCount = 0;
var listRooms = {};


$(document).ready(function () {

    var requestAudio = false;
    var audio = $('#chat-notification-sound');
    if (audio.length > 0) {
        audio = audio.get(0);
        $(document).focus(function () {
            if (!requestAudio) {
                audio.volume = 0;
                audio.play();
                requestAudio = true;
            }
        });

        $(document).click(function () {
            if (!requestAudio) {
                audio.volume = 0;
                audio.play();
                requestAudio = true;
            }
        });
    }



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
            $('#list-invoice .invoice-order:first').trigger('click');
            $('.chat-popup .chat-history').trigger('contentchanged');
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
            renderPanel(roomId);
            if (typeof messages[roomId] != 'undefined') {
                for(var i in messages[roomId]) {
                    renderChatMessages(messages[roomId][i]);
                }

                var last = _.last(messages[roomId]);
                if (last) {
                    if (unreadElement.hasClass('unread')) {
                        //console.log('do unread')
                        currentUser.setReadCursor({
                            roomId: last.roomId,
                            position: last.id
                        })
                            .then(() => {
                                var element = $('.wrapper-invoice-order[data-room-id="'+last.roomId+'"]')
                                var total_unread = element.attr('data-unread-count');
                                element.attr('data-unread-count', 0)
                                unreadCount -= parseInt(total_unread);
                                var b = getChatBadge();
                                if (unreadCount <= 0) {
                                    unreadCount = 0;
                                    b.hide();
                                } else {
                                    b.show().text(unreadCount);
                                }
                            })
                            .catch(err => {
                                //console.log(`Error setting cursor: ${err}`)
                            });
                    }
                }


                $('.chat-popup').find('.chat-history')
                    .scrollTop(elementMessage.find('#messages').height());


                    //.animate({ scrollTop: elementMessage.find('#messages').height() }, 1000);

                //elementMessage.append(`<li class="typing">&nbsp;</li>`);
            }

            unreadElement.removeClass('unread');

            elementMessage.trigger('contentchanged');




        });

        $('.chat-history').bind('contentchanged', function() {
            // do something after the div content has changed

            $('.chat-history img').one('load',function() {
                // fire when image loads
                $(this).parent().magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-img-mobile',
                    image: {
                        verticalFit: true
                    }
                });

                var chatHistory = $('.chat-popup').find('.chat-history');
                chatHistory.scrollTop(chatHistory.find('#messages').height());

            });


            /*$('.chat-image-popup-vertical-fit').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                }
            });*/
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
                    text: messageToSend.val().replace(/(<([^>]+)>)/ig,""),
                    roomId: roomId,
                    // attachment: {
                    //   link: 'https://assets.zeit.co/image/upload/front/api/deployment-state.png',
                    //   type: 'image',
                    // },
                    attachment: undefined
                })
                .then(messageId => {
                    //console.log("Success!", messageId);
                    currentUser.setReadCursor({
                        roomId: roomId,
                        position: messageId
                    })
                    .then(() => {

                    })
                    .catch(err => {
                        //console.log(`Error setting cursor: ${err}`)
                    });
                    messageToSend.val('');
                })
                .catch(error => {
                    console.log("Error", error)
                })


        });

        const emojiLists = [
            '😀', '😁', '😂', '🤣', '😉', '😊', '😋', '😎',
            '😍', '😘', '😴', '😌', '😛', '😜', '😝', '🤤', '😒', '😓', '😔', '😭', '🥰',
            '🤝', '👍', '👇', '🧥', '👚', '👕', '👖',
            '👔', '👗', '👙', '👘', '👠', '👡', '👢',
            '👞', '👟', '🥾', '👛',
            '👜', '💼', '❤️', '💔', '🕐', '😬', '👌', '🥼', '🙏', '✍️', '⚽️', '🏀', '🏸', '🚚', '✈️'
        ];

        function renderEmoji() {
            var o = '<ul class="emoji-list">';
            for(var i in emojiLists) {
                o += `<li data-emoji="${emojiLists[i]}" style="display: inline-block; width: 16px; height: 16px; font-size: 16px; word-break: keep-all; margin-right: 5px; cursor: pointer;">${emojiLists[i]}</li>`;
            }
            o += '</ul>';
            return o;
        }

        $('.chat-emoji-picker').popover({
            html: true,
            title: false,
            content: renderEmoji()
        });

        $(document).on('click', 'ul.emoji-list li', function (e) {
           var message = $('#message-to-send');
           message.val(message.val() + ' ' + $(this).data('emoji'));
            $('.chat-emoji-picker').popover('hide');
        });

        $(document).on('focus', '#message-to-send', function (e) {
            $('.chat-emoji-picker').popover('hide');
        });



        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
        );

        var pond = FilePond.create();
        pond.setOptions({
            maxFiles: 2,
            required: true,
            name: 'image',
            acceptedFileTypes: ['image/png','image/jpeg','image/jpg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                resolve(type);
            }),
            server: {
                url: basePath + '/user/attachments/image',
                process: {
                    headers: {
                        'X-CSRF-Token': $('meta[name="_csrfToken"]').attr('content')
                    },
                    onload: (res) => {
                        // select the right value in the response here and return
                        try {
                            var obj = JSON.parse(res);
                            if (obj.type) {
                                currentUser.sendMultipartMessage({
                                    roomId: pond.roomId,
                                    parts: [
                                        { type: "text/plain", content: obj.name },
                                        {
                                            type: obj.type,
                                            url: obj.url,
                                        }
                                    ],
                                })
                                    .then(messageId => {
                                        currentUser.setReadCursor({
                                            roomId: pond.roomId,
                                            position: messageId
                                        })
                                            .then(() => {

                                            })
                                            .catch(err => {
                                                //console.log(`Error setting cursor: ${err}`)
                                            });
                                    })
                                    .catch(err => {
                                        console.log(`Error adding message to ${myRoom.name}: ${err}`)
                                    })
                            }
                        } catch(e) {

                        }
                        return res;
                    }
                }
            }
        });



        pond.on('addfile', (error, file) => {
            if (error) {
                swal('File yang di upload harus berupa gambar / image');
                return;
            }


            if ($(`.chat-upload-progress-${pond.random}`).length > 0) {
                swal('Silahkan tunggu sampai upload selesai');
                return;
            }

            var roomId = $('.chat-history').attr('active-room-id');
            pond.roomId = roomId;

            pond.random = parseInt(Math.random() * 10000);
            $('ul#messages').append(`<li class="chat-process-file chat-upload-progress-${pond.random}" style="margin-bottom: 40px;"><div style="height: 3px; position: relative;"></div></li>`);
            pond.bar = new ProgressBar.Line(`.chat-upload-progress-${pond.random} div`, {
                strokeWidth: 2,
                easing: 'easeInOut',
                //duration: 1400,
                color: '#555',
                trailColor: '#eee',
                trailWidth: 1,
                svgStyle: {width: '100%', height: '100%'},
                text: {
                    style: {
                        // Text color.
                        // Default: same as stroke color (options.color)
                        color: '#999',
                        position: 'absolute',
                        right: '0',
                        top: '20px',
                        padding: 0,
                        margin: 0,
                        fontSize: '12px',
                        transform: null
                    },
                    autoStyleContainer: false
                },
                from: {color: '#FFEA82'},
                to: {color: '#ED6A5A'},
                step: (state, bar) => {
                    bar.setText(Math.round(bar.value() * 100) + ' %');
                }
            });

            pond.processFile().then(file => {
                // File has been processed
                //console.log('process', file)
            });
        });

        pond.on('processfileprogress', (file, progress) => {
            //console.log(file, progress)
            pond.bar.animate(progress);
        });

        pond.on('processfile', (error, file) => {
            $(`.chat-upload-progress-${pond.random}`).remove();
        });

        $('.chat-upload-image').click(function() {
            if ($(`.chat-upload-progress-${pond.random}`).length > 0) {
                swal('Silahkan tunggu sampai upload selesai');
                return;
            }
            pond.browse();
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
                    listRooms[room.id] = room;

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
                onNewReadCursor: cursor => {
                    //console.log('cursor', cursor);
                }
            })
            .then(cUser => {
                currentUser = cUser
                window.currentUser = cUser
                //const roomToSubscribeTo = currentUser.rooms[0]
                var domInvoice = '';
                //var rooms = currentUser.rooms.reverse();
                var rooms = _.sortBy(currentUser.rooms, [function(o) { return o.lastMessageAt ? o.lastMessageAt : o.updatedAt; }]);
                rooms = rooms.reverse();
                for(var i in rooms) {
                    if (rooms[i]) {
                        domInvoice += subscribeRoom(rooms[i]);
                    }
                }
                $('#list-invoice').html(domInvoice);
                //console.log("Successful connection", currentUser);
                setTimeout(function () {
                    initial = true;
                }, 2000);

            })
            .catch(err => {
                console.log("Error on connection: ", err)
            });

        function renderPanel(roomId) {
            let room = listRooms[roomId];
            if (room) {
                if (room.customData && typeof room.customData.order_detail_id != 'undefined') {
                    var images = '';
                    if (room.customData.images.length > 0) {
                        for(var i in room.customData.images) {
                            images += `<li class="avatars__item">
                                        <img src="${room.customData.images[i]}" class="avatars__img" />
                                    </li>`;
                            if (i >= 1) {
                                break;
                            }
                        }
                        var moreImages = room.customData.images.length - (parseInt(i) + 1);
                        if (moreImages > 0) {
                            images += `<li class="avatars__item">
                                        <span class="avatars__others">+${moreImages}</span>
                                    </li>`;
                        }
                    }

                    if (images !== '') {
                        images = `<div class="col-md-4">
                                <ul class="avatars" style="padding: 13px 0px 7px 7px">
                                    ${images}
                                </ul>
                            </div>`;
                    }

                    var t = `<div class="row">
                            ${images}
                            <div class="${images !== '' ? 'col-md-6' : 'col-md-10 col-md-offset-1'}">
                                No Pesanan : <span class="no-pesanan">${room.name}</span> <br>
                                Total : Rp.<span class="total-pesanan">${numeral(room.customData.total).format('0,0')}</span><br>
                                <!-- <span class="status-pesanan">Selesai</span> -->
                            </div>
                        </div>`;
                    $('.chat-history[active-room-id="'+room.id+'"]').find('.panel').removeClass('hide').html(t);
                } else {
                    $('.chat-history').find('.panel').addClass('hide').html('');
                }

            } else {
                $('.chat-history').find('.panel').addClass('hide').html('');
            }

        }

        function subscribeRoom(room) {
            //console.log("Going to subscribe to", room)
            listRooms[room.id] = room;
            unreadCount += room.unreadCount;
            currentUser.subscribeToRoom({
                roomId: room.id,
                hooks: {
                    onMessage: message => {
                        //console.log("new message:", message);
                        if (typeof messages[message.roomId] === 'undefined') {
                            messages[message.roomId] = [];
                        }
                        var index = messages[message.roomId].push(message);

                        var chatPopup = $('.chat-popup');
                        var elementMessage = chatPopup.find('#messages');
                        var invoiceListElement = $('.wrapper-invoice-order[data-room-id="'+message.roomId+'"]');
                        invoiceListElement.attr('data-last-message', message.createdAt);
                        if ($('.chat-history').attr('active-room-id') === message.roomId && chatPopup.is(':visible')) {
                            //console.log('visible')
                            renderChatMessages(message);
                            $('.chat-popup').find('.chat-history')
                                .scrollTop(elementMessage.height());

                            currentUser.setReadCursor({
                                roomId: message.roomId,
                                position: message.id
                            })
                            .then(() => {

                            })
                            .catch(err => {
                                //console.log(`Error setting cursor: ${err}`)
                            });

                        } else if (initial) {
                            invoiceListElement.addClass('unread');
                            if (user_id.toUpperCase() !== message.senderId.toUpperCase()) {
                                var currentUnread = parseInt(invoiceListElement.attr('data-unread-count'));
                                invoiceListElement.attr('data-unread-count', ++currentUnread);
                                getChatBadge().show().text(++unreadCount);
                            }

                        }

                        if (initial) {
                            tinysort('ul#list-invoice>li',{data:'last-message',order:'desc'});
                            if (requestAudio && user_id.toUpperCase() !== message.senderId.toUpperCase()) {
                                audio.volume = 0.4;
                                audio.play();
                            }


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

            return '<li class="clearfix wrapper-invoice-order '+unreadClass+'" data-room-id="'+room.id+'" data-unread-count="'+room.unreadCount+'" data-last-message="'+(room.lastMessageAt ? room.lastMessageAt : room.createdAt)+'">\n' +
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


            let attachment;
            var m_attachment = '';
            if (message.attachment) {
                switch (message.attachment.type) {
                    case "image":
                        attachment = document.createElement("img")
                        break
                    default:
                        break
                }

                attachment.className += " attachment"
                attachment.width = "400"
                attachment.style = "margin-top: 10px"
                attachment.src = message.attachment.link;
                m_attachment = `<a class="chat-image-popup-vertical-fit" href="${message.attachment.link}">` + attachment.outerHTML + `</a>`;
            }

            var textDiv;
            if (user_id.toUpperCase() === message.senderId.toUpperCase()) {
                messageItem.className = "clearfix"
                messagesList.append(messageItem)
                textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data align-right" data-message-id="'+message.id+'">\n' +
                    '<span class="message-data-time">'+ moment(message.createdAt).calendar(null, {sameElse: 'YYYY-MM-DD h:MM A'}) +'</span> &nbsp; &nbsp;\n' +
                    '<span class="message-data-name">'+message.sender.name+'</span> <i class="fa fa-circle me"></i> \n' +
                    '</div>\n' +
                    '<div class="message other-message float-right">'+message.text + m_attachment +'</div>';
                messageItem.appendChild(textDiv);
            } else {
                messageItem.className = ""
                messagesList.append(messageItem)
                textDiv = document.createElement("div")
                textDiv.innerHTML = '<div class="message-data" data-message-id="'+message.id+'">\n' +
                    '<i class="fa fa-circle me"></i> <span class="message-data-name">'+message.sender.name+'</span> \n' +
                    '<span class="message-data-time">'+ moment(message.createdAt).calendar(null, {sameElse: 'YYYY-MM-DD h:MM A'}) +'</span> &nbsp; &nbsp;\n' +
                    '</div>\n' +
                    '<div class="message my-message">'+message.text + m_attachment +'</div>';
                messageItem.appendChild(textDiv);

            }





        }
    }

});

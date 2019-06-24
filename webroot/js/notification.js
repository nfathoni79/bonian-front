"use strict";

$(document).ready(function() {
    var basePath = $('meta[name="_basePath"]').attr('content');
    var baseImagePath = $('meta[name="_baseImagePath"]').attr('content');
    //.zl-notif .dropdown-toggle
    $('#bs-notification-navbar-dropdown').mouseenter(function mouseEnter(e) {
        if(!$(this).data('loaded') || $(this).data('loaded') == 0) {
            $(this).data('loaded', 1);
            var self = this;
            //console.log('data', $(this).data('loaded'))
            loadNotification(function() {
                $(self).data('loaded', 0);
            });

        }
    });

    function ZlNotification (data) {
        /* jshint ignore:start */
        var out = `<div class="notify-drop-title">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">Daftar Notifikasi</div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right"> 
                        </div>
                    </div>
                </div>
                <!-- end notify title -->
                <!-- notify content -->
                <div class="drop-content">`;
                if (data.result && data.result.data && data.result.data instanceof Array) {
                    for (var i in data.result.data) {
                        var path_image = 'https://placehold.it/45x45';
                        if (data.result.data[i].image) {
                            path_image = data.result.data[i].image_type ==1 ? baseImagePath + data.result.data[i].image : data.result.data[i].image;
                        }
                        var link = '#';
                        if (data.result.data[i].static_url) {
                            link = data.result.data[i].static_url.match(/^http/) ? data.result.data[i].static_url : basePath + data.result.data[i].static_url;
                        }
                        var img = '<img src="'+path_image+'" alt="" style="width:45px;" />';
                        out += `<li class="notification-item" data-is-read="${data.result.data[i].is_read}" data-notification="${data.result.data[i].id}">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="notify-img">
                                ${img}
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                             <a href="${link}" class="notify-link">${data.result.data[i].title}</a>
                            <p>${truncate(data.result.data[i].message.replace(/(<([^>]+)>)/ig,""), 50)}</p>
                            <p class="time">${data.result.data[i].time_ago}</p>
                        </div>
                    </li>`;
                    }

                }

                out += `</div>
                <div class="notify-drop-footer text-center">
                    <a href="${basePath}/user/notification">Lihat semua notifikasi</a>
                </div>`;
        /* jshint ignore:end */
        return out;
    }

    function loadNotification(callback) {
        $.ajax({
            url: basePath + '/user/notification/getData',
            type : 'POST',
            data : {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content')
            },
            dataType : 'json',
            success: function(response, statusText){
                if (statusText === 'success') {
                    //console.log(response, xhr);
                    $('.zl-notif .dropdown-menu.notify-drop').html(ZlNotification(response));

                    if ($('.zl-notif .notification-count').text() !== '0') {
                        markNotification();
                    }

                    /*
                    var selector = $('[data-is-read="false"]');
                    var is_send = [];

                    selector.waypoint({
                        handler: function(direction) {
                            var notif_id = $(this.element).data('notification');
                            if($.inArray(notif_id, is_send) === -1) {
                                is_send.push(notif_id);
                                //console.log('oke', notif_id)
                                markNotification(notif_id);
                            }

                        },
                        context: '.zl-notif .drop-content',
                        offset: '50%'
                    });
                    selector.off('mouseenter').mouseenter(function () {
                        var notif_id = $(this).data('notification');
                        if($.inArray(notif_id, is_send) === -1) {
                            is_send.push(notif_id);
                            //console.log('mouse', notif_id)
                            markNotification(notif_id);
                        }
                    });

                     */

                }


            },
            error: function () {

            }
        }).done(function() {
            if (typeof callback === 'function') {
                callback();
            }
        });
    }

    function markNotification(id) {
        $.ajax({
            url: basePath + '/user/notification/mark',
            type: 'POST',
            data: {
                _csrfToken: $('meta[name="_csrfToken"]').attr('content'),
                //notification_id: id
            },
            dataType: 'json',
            success: function(response, statusText) {
                if (statusText === 'success') {
                    if (response.result && response.result.total >= 0) {
                        console.log(response.result.total);
                        $('.zl-notif .notification-count').text(response.result.total);
                    }
                }
            }
        });
    }

    const channel = pusherClient.subscribe('private-notification');
    channel.bind('my-event-' + $.cookie('reffcode'), function(data) {
        if (data && data.total) {
            $('.zl-notif .notification-count').text(data.total);
        }
    });

})

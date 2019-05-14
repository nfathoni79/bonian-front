"use strict";

$(document).ready(function() {
    var basePath = $('meta[name="_basePath"]').attr('content');

    $('.zl-notif .dropdown-toggle').mouseenter(function mouseEnter(e) {
        if(!$(this).data('loaded') || $(this).data('loaded') == 0) {
            $(this).data('loaded', 1);
            var self = this;
            console.log('data', $(this).data('loaded'))
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
                        <a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="Baca semua">
                        <i class="fa fa-dot-circle-o"></i></a></div>
                    </div>
                </div>
                <!-- end notify title -->
                <!-- notify content -->
                <div class="drop-content">`;
                if (data.result && data.result.data && data.result.data instanceof Array) {
                    for (var i in data.result.data) {
                        out += `<li>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="notify-img">
                                <img src="https://placehold.it/45x45" alt="" />
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                             ${data.result.data[i].title} <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                            <p>${truncate(data.result.data[i].message.replace(/(<([^>]+)>)/ig,""), 50)}</p>
                            <hr>
                            <p class="time">${data.result.data[i].time_ago}</p>
                        </div>
                    </li>`;
                    }

                }

                out += `</div>
                <div class="notify-drop-footer text-center">
                    <a href=""><i class="fa fa-eye"></i> Lihat semua notifikasi</a>
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


    const channel = pusherClient.subscribe('private-notification');
    channel.bind('my-event-' + $.cookie('reffcode'), function(data) {
        if (data && data.total) {
            $('.zl-notif .notification-count').text(data.total);
        }
    });

})

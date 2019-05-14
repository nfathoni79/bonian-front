
var basePath = $('meta[name="_basePath"]').attr('content');
const pusherClient = new Pusher('68012dd37c1a39994c74', {
    cluster: 'ap1',
    authEndpoint: basePath + '/login/end-point',
    auth: {
        headers: {
            'X-CSRF-Token': $('meta[name="_csrfToken"]').attr('content')
        }
    }
});
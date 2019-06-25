
var basePath = $('meta[name="_basePath"]').attr('content');
const pusherClient = new Pusher($('meta[name="_pusherKey"]').attr('content') || '68012dd37c1a39994c74', {
    cluster: 'ap1',
    authEndpoint: basePath + '/login/end-point',
    auth: {
        headers: {
            'X-CSRF-Token': $('meta[name="_csrfToken"]').attr('content'),
			'x-requested-with': 'XMLHttpRequest'
        }
    }
});
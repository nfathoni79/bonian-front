var basePath = $('meta[name="_basePath"]').attr('content');
let currentUser
let room

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

const noopLogger = (...items) => {}

const chatManager = new Chatkit.ChatManager({
    instanceLocator: 'v1:us1:643558e4-7a90-485c-b398-56de24a33bff',
    tokenProvider: tokenProvider,
    userId: 'ridwan',
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

        if (roomToSubscribeTo) {
            room = roomToSubscribeTo
            console.log("Going to subscribe to", roomToSubscribeTo)
            currentUser.subscribeToRoom({
                roomId: roomToSubscribeTo.id,
                hooks: {
                    onMessage: message => {
                        console.log("new message:", message)
                    },
                },
            })
        } else {
            console.log("No room to subscribe to")
        }
        console.log("Successful connection", currentUser)
    })
    .catch(err => {
        console.log("Error on connection: ", err)
    })
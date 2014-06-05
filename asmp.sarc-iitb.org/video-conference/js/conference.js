/*
 * Need some explanations about this code ? Take a look at our API tutorial:
 * https://api.developers.bistri.com/tutorial
 */

onBistriConferenceReady = function(){

	// at first we test if the browser is WebRTC enable
    if( !BistriConference.isCompatible() ){
		alert( "your browser is not WebRTC compatible !" );
		return;
	}

	window.localStreamReady = false;

	/*
     * this is the function called when the button "Join Conference" is pressed
     */
    window.joinRoom = function(){
        
        // if the local stream (webcam) is ready 
		if( !window.localStreamReady ){
			alert( "local media is not ready" );
			return;
		}
        
        // then when are ready to join the conference room called "myMeetingRoom"
		BistriConference.joinRoom( "myMeetingRoom" );
	};

    /*
     * this is the function called when the button "Quit Conference" is pressed
     */
	window.quitRoom = function(){
        
        // We stop calls with all conference room members
		BistriConference.endCalls();
        
        // then we quit the conference room
		BistriConference.quitRoom();
	};

	/*
     * API is initialized with personal keys
     * To get your own keys, go to https://api.developers.bistri.com/login
     * debug is set to true to print some logs in the javascript console
     */
    BistriConference.init( {
		// don't forget to replace the following keys by your own
		appId: "38077edb",
		appKey: "4f304359baa6d0fd1f9106aaeb116f33",
		debug: true
	} );

    /*
     * we add a handler to manage "onConnected" event triggered by the signaling server
     * this event occurs when user is connected to the signaling server
     */
	BistriConference.signaling.addHandler( "onConnected", function(){
        
        // we are now connected to the signaling server, 
        // we can request access to the user webcam
		BistriConference.startStream( "webcamSD" );
	} );

    /*
     * we add a handler to manage "onJoinedRoom" event triggered by the signaling server
     * this event occurs when user join the conference room
     */
	BistriConference.signaling.addHandler( "onJoinedRoom", function( result ){
        
        // we entered the conference room.
        // we request a call start with every single member already present in the room
		var roomMembers = result.members;
		for( var i=0; i<roomMembers.length; i++ ){
			BistriConference.call( roomMembers[ i ].id );
		}
        
        // we hide "Join Conference" button
		document.querySelector( ".join" ).style.display = "none";
        
        //  and show "Quit Conference" button
		document.querySelector( ".quit" ).style.display = "inline";
	} );

    /*
     * we add a handler to manage "onJoinRoomError" event triggered by the signaling server
     * this event occurs when user fails to join the conference room
     */
	BistriConference.signaling.addHandler( "onJoinRoomError", function( data ){
        
        // we can't handle more than 4 participants in a same room (for performance issue)
		if( data.members.length >= 4 ){
			alert( "The conference room is full. Please, try again later." );
		};
	} );

    /*
     * we add a handler to manage "onQuittedRoom" event triggered by the signaling server
     * this event occurs when user has quitted the conference room
     */
	BistriConference.signaling.addHandler( "onQuittedRoom", function( data ){
        
        // we hide "Quit Conference" button
		document.querySelector( ".quit" ).style.display = "none";
        
        // and we show "Join Conference" button
		document.querySelector( ".join" ).style.display = "inline";

	} );

    /*
     * we add a handler to manage "onStreamAdded" event triggered by the stream manager
     * this event occurs when a local or remote video stream is received
     */
	BistriConference.streams.addHandler( "onStreamAdded", function( stream, pid ){
		
        // if pid is undefined, then then stream received is the local one
        if( !pid ){
			window.localStreamReady = true;
		}
        
		// we "insert" the video stream into a container
        BistriConference.attachStream( stream, document.querySelector( '.video-container' ), {
			// video auto start after being inserted
            autoplay: true,
            // video switch to fullscreen when user click on it
			fullscreen: true
		} );
	} );

    /*
     * we add a handler to manage "onStreamClosed" event triggered by the stream manager
     * this event occurs when a local or remote stream is closed
     */
	BistriConference.streams.addHandler( "onStreamClosed", function( stream, pid ){
        
        // we remove the video stream from the page
		BistriConference.detachStream( stream );
	} );

    // we open a session on the signaling server
	BistriConference.connect();

}
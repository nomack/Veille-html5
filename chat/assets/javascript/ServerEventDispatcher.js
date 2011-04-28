/*
	Ismael Celis 2010
	Simplified WebSocket events dispatcher (no channels, no users)

	var socket = new ServerEventsDispatcher();

	// bind to server events
	socket.bind('some_event', function(data){
		alert(data.name + ' says: ' + data.message)
	});

	// broadcast events to all connected users
	socket.trigger( 'some_event', {name: 'ismael', message : 'Hello world'} );
*/
var ServerEventsDispatcher = function( host ){
	var conn = new WebSocket('ws://' + host);
	var callbacks = {};

	this.bind = function(event_name, callback){
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;// chainable
	};

	this.trigger = function(event_name, data){
		var payload = JSON.stringify([event_name, data]);
		conn.send( payload ); // <= send JSON data to socket server
		return this;
	};

	// dispatch to the right handlers
	conn.onmessage = function(evt) {
		data = evt.data;

		if ( !data.charCodeAt(0) )
			data = data.substr(1);

		var data = JSON.parse( data ),
			event_name = data[0],
			message = data[1];
		dispatch(event_name, message)
	};

	conn.onclose = function(){dispatch('close',null)}
	conn.onopen = function(){dispatch('open',null)}

	var dispatch = function(event_name, message){
		var chain = callbacks[event_name];
		if(typeof chain == 'undefined') return; // no callbacks for this event
		for(var i = 0; i < chain.length; i++){
			chain[i]( message )
		}
	}
};
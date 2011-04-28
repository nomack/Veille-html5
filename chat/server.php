<?php
	require dirname(__FILE__).'/includes/WebSocketServer.php';

	function process(WebsocketUser $user, $msg, WebsocketServer $server)
	{
		$server->send( $user->socket, $msg );
	}

	$server = new WebsocketServer('localhost', 12345, 'process');
	$server->run();
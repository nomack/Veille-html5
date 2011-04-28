<!DOCTYPE html>
<html>
<head>
<script src="./jquery.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/javascript">
var socket;
var host = "ws://localhost:8080/websocket/startDaemon.php";
	
$(document).ready(function() {
	
	try
	{
		var socket = new WebSocket(host);
		
		message('<p class="event">Etat : '+socket.readyState);
		
		socket.onopen = function(){ 
			message('<p class="event">Etat : '+socket.readyState+' (Ouvert)'); 
		}
		
		socket.onmessage = function(msg){ 
			message('<p class="message">Reçu : '+msg.data); 
		}
		
		socket.onclose = function(){ 
			message('<p class="event">Etat : '+socket.readyState+' (Fermer)'); 
		}			
	} 
	catch(exception){ message('<p>Erreur : '+exception); }
	
	function send()
	{
		var text = $('#text').val();
		if(text=="")
		{
			message('<p class="warning">Veuillez indiquer un message');
			return ;	
		}
		
		try
		{
			socket.send(text);
			message('<p class="event">Envois : '+text)
		} 
		catch(exception){ message('<p class="warning">'); }
		
		$('#text').val("");
	}
	
	function message(msg)
	{
		$('#chatLog').append(msg+'</p>');
	}
	
	$('#text').keypress(function(event) {
		if (event.keyCode == '13') {
			send();
		}
	});	
	
	$('#send').click(function(){ send(); });
	
	$('#disconnect').click(function(){ socket.close(); });
			
});
</script>
<meta charset=utf-8 />
<style type="text/css">
body {
	font-family:Arial, Helvetica, sans-serif;
}
#chatLog {
	padding:5px;
	border:1px solid black;
}
#chatLog p {
	margin:0;
}
.event {
	color:#999;
}
.warning {
	font-weight:bold;
	color:#CCC;
}
</style>
<title>WebSockets Client</title>
</head>
<body>
<h1>WebSockets</h1>
<div id="chatLog"></div>
<p id="examples">Taper : 'bonjour', 'nom', 'age', 'date', 'as tu l'heure'</p>
<input id="text" type="text" />
<button id="send">Envoyer</button>
<button id="disconnect">Deconnexion</button>
</body>
</html>
​
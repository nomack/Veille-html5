<?php
ob_implicit_flush(true);

require_once 'socket.class.php';
require_once 'socketWebSocket.class.php';
require_once 'trigger.class.php';

new socketWebSocket('localhost',8080);
?>
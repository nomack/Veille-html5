<?php
class socket
{
	protected $master, $allsockets = array();
	
	public function __construct( $host='localhost', $port=8080 )
	{
		$this->createSocket($host,$port);
	}
	
	private function createSocket( $host, $port )
	{
		if( ( $this->master = socket_create(AF_INET,SOCK_STREAM,SOL_TCP) ) < 0 )
			die('socket_create() erreur, raison: '.socket_strerror($this->master));
	
		self::console('Socket '.$this->master.' créé.');
	
		socket_set_option($this->master,SOL_SOCKET,SO_REUSEADDR,1);
	
		if( ( $ret = socket_bind($this->master,$host,$port) ) < 0 )
			die('socket_bind() erreur, raison: '.socket_strerror($ret));
	
		self::console('Socket connecté '.$host.':'.$port);
	
		if( ( $ret = socket_listen($this->master,5) ) < 0 )
			die('socket_listen() erreur, raison: '.socket_strerror($ret));
	
		self::console('Debut de l\'écoute.');
	
		$this->allsockets[] = $this->master;
	}
	
	protected function console( $msg, $type = 'System' )
	{
		$msg = explode("\n",$msg);
		foreach( $msg as $line )
			echo date('Y-m-d H:i:s') . ' '.$type.' : '.$line."\n";
	}
	
	protected function send($client,$msg)
	{
		socket_write($client, $msg,strlen($msg));
	}
}
?>
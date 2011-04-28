<?php
class socketWebSocket extends socket
{
	private $clients = array(), $handshakes = array();
	
	public function __construct()
	{
		parent::__construct();
		self::run();
	}
	
	protected function console( $msg, $type='WebSocket' )
	{
		parent::console( $msg, $type );
	}
	
	protected function send( $client, $msg )
	{
		self::console('> '.$msg);
		parent::send($client,chr(0).$msg.chr(255));
	}
	
	private function run()
	{
		while(true)
		{
			$changed_sockets = $this->allsockets;
	
			$num_sockets = socket_select($changed_sockets,$write=NULL,$exceptions=NULL,NULL);
	
			foreach( $changed_sockets as $socket )
			{
				if( $socket == $this->master )
				{
					if( ($client=socket_accept($this->master)) < 0 )
					{
						console('socket_accept() erreur: raison: ' . socket_strerror(socket_last_error($client)));
						continue;
					}
					else
					{
						$this->allsockets[] = $client;
						$socket_index = array_search($client,$this->allsockets);
						$this->clients[$socket_index] = new stdClass;
						$this->clients[$socket_index]->socket_id = $client;
	
						self::console($client . ' connecté!');
					}
				}
				else
				{
					$socket_index = array_search($socket,$this->allsockets);
	
					$bytes = socket_recv($socket,$buffer,2048,0);
					
					if( $bytes === 0 )
						self::disconnected($socket);
	
					else
					{
						if( !isset($this->handshakes[$socket_index]) )
						{
							self::do_handshake($buffer,$socket,$socket_index);
							self::send($socket,'connexion');
						}
						else
						{
							if(!$action = substr($buffer,1,$bytes-2))
								self::disconnected($socket);
	
							else
							{
								self::console('< '.$action);
								
								$action = str_replace(array(' ','\'','-',','),'_',$action);
								if( method_exists('trigger',$action) )
									self::send($socket,trigger::$action());
							}
						}
					}
				}
			}
		}
	}
	
	private function do_handshake($buffer,$socket,$socket_index)
	{
		self::console('Requete handshake...');
	
		list($resource,$host,$origin,$key1,$key2,$l8b) = self::getheaders($buffer);
	
		self::console('Handshaking...');
		
		$upgrade  = "HTTP/1.1 101 WebSocket Protocol Handshake\r\n" .
								"Upgrade: WebSocket\r\n" .
								"Connection: Upgrade\r\n" .
								"Sec-WebSocket-Origin: {$origin}\r\n" .
								"Sec-WebSocket-Location: ws://{$host}{$resource}\r\n" .
								"\r\n" . self::calcKey($key1,$key2,$l8b) . "\r\n";
					
		$this->handshakes[$socket_index] = true;
	
		socket_write($socket,$upgrade.chr(0),strlen($upgrade.chr(0)));
	
		self::console('Handshaking effectué...');
	}
	
	private static function calcKey($key1,$key2,$l8b)
	{
		preg_match_all('/([\d]+)/', $key1, $key1_num);
		preg_match_all('/([\d]+)/', $key2, $key2_num);
		
		$key1_num = implode($key1_num[0]);
		$key2_num = implode($key2_num[0]);
		
		preg_match_all('/([ ]+)/', $key1, $key1_spc);
		preg_match_all('/([ ]+)/', $key2, $key2_spc);
		
		$key1_spc = strlen(implode($key1_spc[0]));
		$key2_spc = strlen(implode($key2_spc[0]));
		
		if( $key1_spc==0|$key2_spc==0 )
		{ 
			self::console('Key invalide'); 
			return false; 
		}
		
		$key1_sec = pack("N",$key1_num / $key1_spc);
		$key2_sec = pack("N",$key2_num / $key2_spc);
		
		return md5($key1_sec.$key2_sec.$l8b,1);
	}
	
	private function disconnected($socket)
	{
		if( $index = array_search($socket, $this->allsockets) )
			unset($this->allsockets[$index], $this->clients[$index], $this->handshakes[$index]);
	
		socket_close($socket);
		self::console($socket.' deconnexion');
	}
	
	private static function getheaders($req)
	{
		$r = $h = $o = NULL;
		
		if(preg_match("/GET (.*) HTTP/" ,$req,$match))
			$r = $match[1];
		if(preg_match("/Host: (.*)\r\n/" ,$req,$match))
			$h = $match[1];
		if(preg_match("/Origin: (.*)\r\n/" ,$req,$match))
			$o = $match[1];
		if(preg_match("/Sec-WebSocket-Key1: (.*)\r\n/",$req,$match))
			$sk1 = $match[1];
		if(preg_match("/Sec-WebSocket-Key2: (.*)\r\n/",$req,$match))
			$sk2 = $match[1];
		if($match=substr($req,-8))
			$l8b = $match;
			
		return array($r, $h, $o, $sk1, $sk2, $l8b );
	}
}
?>
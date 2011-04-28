<?php
class trigger extends socketWebSocket
{
		protected static function bonjour()
		{
			return 'Bonjour, comment allez vous ?';
		}
		
		protected static function nom()
		{
			return 'Mon nom est alban';
		}	
		
		protected static function date()
		{
			return date('d-m-Y');
		}	
		
		protected static function age()
		{
			return 'J\'ai 28 ans';
		}	
		
		protected static function as_tu_l_heure()
		{
			return date('H:i:s');
		}			
}
?>
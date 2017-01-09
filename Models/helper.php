<?php
	class Helper
	{
		public static function Check_string($str)
		{
			if(preg_match('/^[a-z0-9]+$/', $str))
			{
				return 1;
			}
			return 0;
		}
		public static function Check_string_length($str)
		{
			if(strlen($str)<=15)
			{
				return 1;
			}
			return 0;
		}
		public static function Disconnection(&$con)
		{
			$con=null;
		}
	}
?>
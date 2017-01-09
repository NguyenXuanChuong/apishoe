<?php
	class Helper_Controller
	{
		public static function isValuable($data)
		{
			if(isset($data))
			{
				return 1;
			}
			return 0;
		}
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
		public static function Check_phone_string($phone)
		{
			if(preg_match("/^[0-9]+$/", $phone) && (strlen($phone)==10 || strlen($phone==11)))
			{
				return 1;
			}
			return 0;
		}
		public function Check_email_string($email)
		{
			if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
			{
        		return 0;
        	}
		    else
		    {
		        $email=trim(strtolower($email));
		        if(filter_var($email, FILTER_VALIDATE_EMAIL)===true) 
		        {
		        	return 1;
		        }
		        else
		        {
		            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		            if(preg_match($pattern, $email))
		            {
		            	return 1;
		            }
		            return 0;
		        }
		    }
		}
		public function Check_number_string($number)
		{
			if(preg_match("/^[0-9]+$/", $number))
			{
				return 1;
			}
			return 0;
		}
	}
?>
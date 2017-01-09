<?php
	class Token
	{
		public static function createToken($data,$key)
		{
			$header=array(
				"alg"=>"HS256",
				"typ"=>"JWT"
			);
			$body=array(
				"username"=>$data["username"],
				"password"=>$data["password"]
			);
			$body=json_encode($body);
			$header=json_encode($header);
			
			$body=$this->base64url_encode($body);
			$header=$this->base64url_encode($header);
			$temp=$header.".".$body;
			$signature=hash_hmac("sha256",$temp,$key,true);
			$signature=$this->base64url_encode($signature);
			$token="$temp.$signature";
			return $token;
		}
		public static function verifyJWT($token,$key)
		{
			$token=explode(".",$token);
			if(count($token)<3)
			{
				return 0;
			}
			$header=json_decode($this->base64url_decode($token[0]));
			if(!isset($header->typ))
			{
				return 0;
			}
			if($header->typ!="JWT")
			{
				
				return 0;
			}
			if(!isset($header->alg))
			{
				return 0;
			}
			if($header->alg!="HS256")
			{
				
				return 0;
			}
			$signature=$this->base64url_decode($token[2]);
			
			if($signature!=hash_hmac("sha256","$token[0].$token[1]",$key,true))
			{
				
				return 0;
			}
			$claim=json_decode($this->base64url_decode($token[1]));
			
			if(!$claim)
			{
				
				return 0;
			}
			if(!isset($claim->username))
			{
				
				return 0;
			}
			return 1;
	
		}
		public static function base64url_encode($data) { 
			return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
		} 
		public static function base64url_decode($data) { 
			return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
		} 
	}
?>
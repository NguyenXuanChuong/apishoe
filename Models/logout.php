<?php
	class Logout
	{
		public function Logout()
		{
			$_SESSION["login"]=0;
			return "Đăng xuất thành công";
		}
	}
?>
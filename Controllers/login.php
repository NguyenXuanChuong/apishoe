<?php
	require_once("Models/login.php");
	require_once(dirname(__FILE__)."/helper.php");
	class Login_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Login();
		}
		public function Login($data)
		{
			if(Helper_Controller::isValuable($data["username"]) && Helper_Controller::isValuable($data["password"]))
			{	
				if(Helper_Controller::Check_string_length($data["username"]) && Helper_Controller::Check_string_length($data["password"]))
				{
					if(Helper_Controller::Check_string($data["username"]) && Helper_Controller::Check_string($data["password"]))
					{

						return $this->model->Login($data);
					}
					return "Tên đăng nhập hoặc mật khẩu có kí tự không hợp lệ";
				}
				return "Tên đăng nhập hoặc mật khẩu dài hơn 15 kí tự";

			}
			return "Tên đăng nhập hoặc mật khẩu rỗng";
		}
	}
?>
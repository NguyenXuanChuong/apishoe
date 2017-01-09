<?php
	require_once("Models/register.php");
	require_once(dirname(__FILE__).'/helper.php');
	class Register_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Register();
		}
		public function Register($data)
		{
			if(Helper_Controller::isValuable($data["username"]) && Helper_Controller::isValuable($data["password"]))
			{	
				if(Helper_Controller::Check_string_length($data["username"]) && Helper_Controller::Check_string_length($data["password"]))
				{
					if(Helper_Controller::Check_string($data["username"]) && Helper_Controller::Check_string($data["password"]))
					{
						return $this->model->Register($data);
					}
					return "Username hoặc Password có kí tự không hợp lệ";
				}
				return "Username hoặc Password dài quá 15 kí tự";
			}
			return "Username hoặc Password rỗng";
		}
	}
?>
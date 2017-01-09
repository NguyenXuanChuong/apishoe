<?php
	require_once("Models/logout.php");
	class Logout_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Logout();
		}
		public function Logout()
		{
			return $this->model->Logout();

		}
	}
?>
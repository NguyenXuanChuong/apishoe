<?php

	$_SESSION["login"]=0;
	require_once("Database/connection.php");
	require_once(dirname(__FILE__)."/helper.php");
	class Login
	{
		private $con;
		public function __construct()
		{
			$temp=new DBConnection();
			$this->con=$temp->Connection();

		}
		
		public function Login($array)
		{
			$username=$array["username"];
			$password=$array["password"];

			try
			{
				$sql="SELECT * FROM users WHERE user_name=:username AND password=:password";
				$temp=$this->con->prepare($sql);
				$temp->bindParam('username',$username,PDO::PARAM_STR);
				$temp->bindParam('password',$password,PDO::PARAM_STR);
				$temp->execute();

				if($temp->rowCount())
				{
					$list=$temp->fetchAll(PDO::FETCH_BOTH);
					$admin=$list[0]["admin"];
					if($admin=="Y")
					{
						$_SESSION["login"]=1;
						$_SESSION["admin"]=1;
						$_SESSION['user_id']= $list[0]['user_id'];


					}
					else
					{
						$_SESSION["login"]=1;
						$_SESSION["admin"]=0;
                        $_SESSION['user_id']= $list[0]['user_id'];
					}
					
					Helper::Disconnection($this->con);
					return "Success";
				}
				Helper::Disconnection($this->con);
				return "Error";

			}
			catch(Exception $e)
			{
				return $e->getMessage();
			}
				
		}
	}
?>
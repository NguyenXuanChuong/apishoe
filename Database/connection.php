<?php
require_once("constant.php");

class DBConnection
{
	private $con;

	public function Connection()
	{
		try
		{
			$this->con=new PDO(db_path,db_username,db_password);
			return $this->con;
		}
		catch(Exception $e)
		{
			return "Caught Exception : ".$e->getMessage();
//            return "Loi ket noi";
		}
	}
}
?>
<?php 

class Manager {

	protected function dbConnect()
		{
			$db=new \PDO('mysql:host=localhost;dbname=microcms;charset=utf8','microcms_user','secret',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		
}
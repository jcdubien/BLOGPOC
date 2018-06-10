<?php 

class Manager {

	protected function dbConnect()
		{
			
			$db=new \PDO('mysql:host=localhost;dbname=microcms;charset=utf8','microcms_user','secret',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			//$db=new \PDO('mysql:host=db676297092.db.1and1.com;dbname=db676297092;charset=utf8','dbo676297092','Matouba1',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		
}
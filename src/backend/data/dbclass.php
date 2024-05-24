<?php
class Data{
	private$pdo;
	public function connect_sql(){
		$this->pdo=new PDO("mysql:host=localhost;dbname=u327081214_gov",'root','');
		return $this->pdo;
	}
}
?>
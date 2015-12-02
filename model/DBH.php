<?php
	class DBH
	{
		private $dbh;
		private $table;
		//private $function;

		
		public function DBH($table) {

		require_once "config.php";
			

		$dsn="mysql:host=$host;dbname=$db;charset=$charset";
		$opt=array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
		
			$this->dbh = new PDO($dsn, $user, $pass, $opt);
			$this->table=$table;
			//$this->function=$function;
			
		}
		
	
	public function getDBH(){
		return $this->dbh;
	}
	//-------------------------выносим из UserModel и PostModel одинаковую функции
		public function get_all_rows() 
		{			//вызов всех записей из базы данных
		//$link = open_database_connection();
		$sql ="SELECT * FROM $this->table";
		$stmt=$this->getDBH()->query($sql);//переменная обращения к
		$posts = array();
		while ($row = $stmt->fetch())
		{		//вывод списка записей массивом
			$s[] = $row;
		}

		return $s;
		}
//------------------выносим из UserModel и PostModel одинаковые функции
		public function get_row_by_id($id)
		{			//вызов всех записей из базы данных
		//$link = open_database_connection();
		$sql ="SELECT * FROM $this->table WHERE id=?";
		$stmt=$this->getDBH()->prepare($sql);//переменная обращения к
		$stmt->execute([$id]);

		$row = $stmt->fetch();
	

		return $row;
		}




}

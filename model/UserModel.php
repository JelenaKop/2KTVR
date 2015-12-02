<?php
class UserModel extends DBH{

	public function UserModel()
	{
		parent::DBH('user');

	}
	

    //----------------выбор всех записей из таблицы $posts
	//--------------возвращает массив записей в таблице
	/*public function get_all_users() {			//вызов всех постов из базы данных
		//$link = open_database_connection();
		$sql ="SELECT * FROM user";
		$stmt=$this->getDBH()->query($sql);//переменная обращения к
		$users = array();
		while ($row = $stmt->fetch()) {		//вывод списка постов массивом
			$s[] = $row;
		}
		//close_database_connection($link);s
		return $users;
		//close_database_connection($link);
	}
	public function get_user_by_id($id){		//выбор поста по id
	//echo " test12";
	//$link = open_database_connection();
	$sql="SELECT `id`,`code`,`firstname`,`lastname`  FROM user WHERE id=?";

	$stmt=$this->getDBH()->prepare($sql);

	$stmt->execute([$id]);

	$post = $stmt->fetch();


	//$result = mysql_query($sql, $link);
	//$row = mysql_fetch_assoc($result);
	//$post=$row;
	//close_database_connection($link);

	return $user;

	}*/
	public function add_user()					//добавить запись(пост)
	{
	if(empty($_REQUEST['add_code'])		//если не пусто
		|| empty($_REQUEST['add_firstname'])
			|| empty($_REQUEST['add_lastname']))

				
	{
		echo "Пропущена запись!";
		return false;
	}
	$add_code=$_REQUEST['add_code'];
	$add_firstname=$_REQUEST['add_firstname'];
	$add_lastname=$_REQUEST['add_lastname'];
	
	$sql="INSERT INTO user(`code`,`firstname`,`lastname`)
	VALUES(?,?,?)";
	//$link=open_database_connection();
	//mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	//close_database_connection($link);
	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute(array($add_code,$add_firstname,$add_lastname));
	return true;
}

	public function delete_user($id)			//удалить запись(пост)
{
	$sql="DELETE FROM user WHERE id=?";//запрос с плейсхолдером

	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute([$id]);//выполнение подготовленного запроса
	//при выполнении запроса вместо плейсхолдеров будут вставлены значения из массива
	//данных,полученных от пользователя.

	//$link=open_database_connection();
	//mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	//close_database_connection($link);
	return;
	

}


public function update_user($id)
{
	if(empty($_REQUEST['update_code'])		//если не пусто
			||empty($_REQUEST['update_firstname'])
				|| empty($_REQUEST['update_lastname']))
				
	{
		echo "Пропущена запись!";
		return false;
	}
	$id=$_REQUEST['update_id'];	
	$update_code=$_REQUEST['update_code'];
	$update_firstname=$_REQUEST['update_firstname'];	
	$update_lastname=$_REQUEST['update_lastname'];
	

	$sql = "UPDATE user SET `code`=?, firstname=?,lastname=?
    WHERE id=?";

	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute([$update_code,$update_firstname,$update_lastname,id]);//выполнение подготовленного запроса
	//при выполнении запроса вместо плейсхолдеров будут вставлены значения из массива
	//данных,полученных от пользователя.


	/*$sql="UPDATE post SET(`date`,`autor`,`title`,`content`)
	VALUES('$add_date','$add_autor','$add_title','$add_content') WHERE id='$id'";*/


	//$link=open_database_connection();
	//mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	//close_database_connection($link);

	echo "Обновлено!";
	
	return true;

	}

}
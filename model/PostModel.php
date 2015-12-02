<?php
class PostModel extends DBH{

	public function PostModel()
	{
		parent::DBH('post');

	}

	/*public function get_all_posts() {			//вызов всех постов из базы данных
		//$link = open_database_connection();
		$sql ="SELECT * FROM post";
		$stmt=$this->getDBH()->query($sql);//переменная обращения к
		$posts = array();
		while ($row = $stmt->fetch()) {		//вывод списка постов массивом
			$s[] = $row;
		}
		//close_database_connection($link);
		return $posts;
		//close_database_connection($link);
	}*/
	/*public function get_post_by_id($id){		//выбор поста по id
	//echo " test12";
	//$link = open_database_connection();
	$sql="SELECT `id`,`date`,`title`,`content`  FROM post WHERE id=?";

	$stmt=$this->getDBH()->prepare($sql);

	$stmt->execute([$id]);

	$post = $stmt->fetch();


	//$result = mysql_query($sql, $link);
	//$row = mysql_fetch_assoc($result);
	//$post=$row;
	//close_database_connection($link);

	return $post;

	}*/
	public function add_post()					//добавить запись(пост)
	{
	if(empty($_REQUEST['add_date'])		//если не пусто
		|| empty($_REQUEST['add_autor'])
			|| empty($_REQUEST['add_title'])
				|| empty($_REQUEST['add_content']))

				
	{
		echo "Пропущена запись!";
		return false;
	}
	$add_code=$_REQUEST['add_date'];
	$add_firstname=$_REQUEST['add_autor'];
	$add_lastname=$_REQUEST['add_title'];
	$add_lastname=$_REQUEST['add_content'];
	
	$sql="INSERT INTO post(`date`,`autor`,`title`,`content`)
	VALUES(?,?,?)";
	//$link=open_database_connection();
	//mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	//close_database_connection($link);
	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute(array($add_date,$add_autor,$add_title,$add_content));
	return true;
}

	public function delete_post($id)			//удалить запись(пост)
{
	$sql="DELETE FROM post WHERE id=?";//запрос с плейсхолдером

	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute([$id]);//выполнение подготовленного запроса
	//при выполнении запроса вместо плейсхолдеров будут вставлены значения из массива
	//данных,полученных от пользователя.

	//$link=open_database_connection();
	//mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	//close_database_connection($link);
	return;
	

}


public function update_post($id)
{
	if(empty($_REQUEST['update_autor'])		//если не пусто
			||empty($_REQUEST['update_date'])
				|| empty($_REQUEST['update_title'])
					|| empty($_REQUEST['update_content']))
	{
		echo "Пропущена запись!";
		return false;
	}
	$id=$_REQUEST['update_id'];	
	$update_autor=$_REQUEST['update_autor'];
	$update_date=date("Y-m-d H:i:s");	
	$update_title=$_REQUEST['update_title'];
	$update_content=$_REQUEST['update_content'];


	$sql = "UPDATE post SET `date`=?, autor=?,title=?,
	content=? WHERE id=?";

	$stmt=$this->getDBH()->prepare($sql);//подготовка запроса 
	$stmt->execute([$update_date,$update_autor,$update_title,$update_content,$id]);//выполнение подготовленного запроса
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




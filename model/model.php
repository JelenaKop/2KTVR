<?php

function open_database_connection() {
	$link = @mysql_connect('localhost', 'Jelena_Kopats', '123');//открытие базы данных
	// or die(mysql_error());
	mysql_select_db('Jelena_Kopats', $link);	//выбор базы данных
	mysql_query('SET NAMES utf8');			//запрос в  базу данных
	return $link;
}
  
function close_database_connection($link) {     //закрытие базы данных
	mysql_close($link);
}

function get_all_posts() {			//вызов всех постов из базы данных
	$link = open_database_connection();
	$result = mysql_query("SELECT id,title FROM post", $link);
	$posts = array();
	while ($row = mysql_fetch_assoc($result)) {		//вывод списка постов массивом
		$posts[] = $row;
	}
	close_database_connection($link);

	return $posts;
}
function get_post_by_id($id){		//выбор поста по id
	//echo " test12";
	$link = open_database_connection();
	$sql="SELECT `id`,`title`,`content`,`autor`,`date`  FROM post WHERE id='$id'";
	$result = mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	$post=$row;
	close_database_connection($link);

	return $post;

}
function add_post()					//добавить запись(пост)
{
	if(empty($_REQUEST['add_autor'])		//если не пусто
		|| empty($_REQUEST['add_date'])
			|| empty($_REQUEST['add_title'])
				|| empty($_REQUEST['add_content']))
	{
		echo "Пропущена запись!";
		return false;
	}
	$add_autor=$_REQUEST['add_autor'];
	$add_date=date("Y-m-d H:i:s");
	$add_title=$_REQUEST['add_title'];
	$add_content=$_REQUEST['add_content'];
	$sql="INSERT INTO post(`date`,`autor`,`title`,`content`)
	VALUES('$add_date','$add_autor','$add_title','$add_content')";
	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);
	
	return true;

}
function delete_post($id)			//удалить запись(пост)
{
	$sql="DELETE FROM post WHERE id='$id'";
	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);
	return;
	}
// function update_post($id)		//редактировать запись(пост)
// {
// 	$sql="UPDATE FROM post WHERE id='$id'";
// 	$link=open_database_connection();
// 	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
// 	close_database_connection($link);
// 	return;
// 	}	


function update_post($id)
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


	$sql = "UPDATE post SET `date`='$update_date', autor='$update_autor',title='$update_title',
	content='$update_content' WHERE id='$id'";
echo "sql=".$sql;

	/*$sql="UPDATE post SET(`date`,`autor`,`title`,`content`)
	VALUES('$add_date','$add_autor','$add_title','$add_content') WHERE id='$id'";*/


	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);

	echo "Обновлено!";
	
	return true;

}


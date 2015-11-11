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
	$sql="SELECT `title`,`content`,`autor`,`date`  FROM post WHERE id='$id'";
	$result = mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	$post=$row;
	close_database_connection($link);

	return $post;

}
function add_post()					//добавить запись(пост)
{
	if(!empty($_REQUEST['add_autor'])		//если не пусто
		AND !empty($_REQUEST['add_date'])
			AND !empty($_REQUEST['add_title'])
				AND !empty($_REQUEST['add_content']))
	{
	$add_autor=$_REQUEST['add_autor'];
	$add_date=$_REQUEST['add_date'];
	$add_title=$_REQUEST['add_title'];
	$add_content=$_REQUEST['add_content'];
	$sql="INSERT INTO post(`date`,`autor`,`title`,`content`)
	VALUES('$add_date','$add_autor','$add_title','$add_content')";
	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);
	} else {
		echo "Пропущена запись!";
	}
	return;

}
function delete_post($id)			//удалить запись(пост)
{
	$sql="DELETE FROM post WHERE id='$id'";
	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);
	return;
	}
function edit_post($id)		//редактировать запись(пост)
{
	$sql="UPDATE FROM post WHERE id='$id'";
	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);
	return;
	}	
function get_edit_row()				
{
	return get_post_by_id($_REQUEST['id']);
}

function change_post()
{
	if(!empty($_REQUEST['add_autor'])
		AND !empty($_REQUEST['add_date'])
			AND !empty($_REQUEST['add_title'])
				AND !empty($_REQUEST['add_content'])
					AND !empty($_REQUEST['id']))

	{
	$id=$_REQUEST['id'];	
	$add_autor=$_REQUEST['add_autor'];
	$add_date=$_REQUEST['add_date'];
	$add_title=$_REQUEST['add_title'];
	$add_content=$_REQUEST['add_content'];


	$sql = "UPDATE post SET date='$add_date', autor='$add_autor',title='$add_title',
	content='$add_content' WHERE id='$id'";


	/*$sql="UPDATE post SET(`date`,`autor`,`title`,`content`)
	VALUES('$add_date','$add_autor','$add_title','$add_content') WHERE id='$id'";*/


	$link=open_database_connection();
	mysql_query($sql,$link)OR die("Запрос не выполнен".mysql_error());
	close_database_connection($link);

	echo "Обновлено!";
	} else {
		echo "Пропущена запись!";
		echo "<pre>";
		print_r($_REQUEST);
	}
	return;

}


<?php

use Symfony\Component\HttpFoundation\Response;



function render_template($path,array $args) //
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}


function list_action() {

	echo "sdkhfksddsf";

	$posts = get_all_posts();
	$html=render_template("view/templates/list.php",array('posts'=>$posts));
	return new Response($html);
}
	
function show_action($id) {
	//echo " test13";
	$post = get_post_by_id($id);
	$html=render_template("view/templates/show.php",array('post'=>$post));
	return new Response($html);
	/*global $test;
	if($test==true)var_dump_to_file($post,'log_post.txt');*/
}

function admin_action() {
	
	$posts = get_all_posts();
	$html=render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}
function add_action() {
	add_post();
	$posts = get_all_posts();
	$html=render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}
function delete_action($id){
	delete_post($id);
	$posts = get_all_posts();
	$html=render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}

function about_action(){
	$html=render_template("view/templates/about.php",array());
	return new Response($html);
}
function edit_action(){
	$edit_row= get_edit_row();
	//var_dump($edit_row);
	$posts = get_all_posts();
	$html=render_template("view/templates/admin.php",array('edit_row'=>$edit_row,
															'posts'=>$posts));
															
	return new Response($html);
}
function change_action()
{
	change_post();
	
}



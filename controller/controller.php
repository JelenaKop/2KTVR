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

	$postModel=new PostModel();

	$posts = $postModel->get_all_posts();
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
function edit_action($id){
	$edit_row=get_post_by_id($id);
	//var_dump($edit_row);
	$posts = get_all_posts();
	$html=render_template("view/templates/edit.php",array(	'id'=>$id,
															'edit_row'=>$edit_row,
															'posts'=>$posts));
															
	return new Response($html);
}
function update_action($id)
{
	update_post($id);
	$posts = get_all_posts();
	$html=render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}



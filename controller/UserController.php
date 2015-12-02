<?php
use Symfony\Component\HttpFoundation\Response;

class UserController {




public function render_template($path,array $args) //
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}


public function list_action() {

	$userModel=new UserModel();

	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/listuser.php",array('users'=>$users));
	return new Response($html);
}
	
public function show_action($id) {
	//echo " test13";
	$userModel=new UserModel();
	$post = $userModel->get_row_by_id($id);
	$html=$this->render_template("view/templates/showuser.php",array('users'=>$users));
	return new Response($html);
	/*global $test;
	if($test==true)var_dump_to_file($post,'log_post.txt');*/
}

public function admin_action() {

	$userModel=new UserModel();
	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/adminuser.php",array('users'=>$users));
	return new Response($html);
}
public function add_action() {
	$userModel=new UserModel();
	$userModel->add_user();
	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/adminuser.php",array('users'=>$users));
	return new Response($html);
}
public function delete_action($id){
	$userModel=new UserModel();
	$userModel->delete_rows($id);
	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/adminuser.php",array('users'=>$users));
	return new Response($html);
}

public function about_action(){
	$userModel=new UserModel();
	$html=$this->render_template("view/templates/about.php",array());
	return new Response($html);
}
public function edit_action($id){
	$userModel=new UserModel();
	$edit_row=$userModel->get_row_by_id($id);
	//var_dump($edit_row);
	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/edit.php",array(	'id'=>$id,
															'edit_row'=>$edit_row,
															'users'=>$users));
															
	return new Response($html);
}
public function update_action($id)
{
	$userModel=new UserModel();
	$userModel->update_row($id);
	$users = $userModel->get_all_rows();
	$html=$this->render_template("view/templates/adminuser.php",array('users'=>$users));
	return new Response($html);
}

}

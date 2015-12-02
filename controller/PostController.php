<?php
use Symfony\Component\HttpFoundation\Response;

class PostController{
	private $dbh;
	private $user="Jelena_Kopats";
	private $pass="123";
	private $db="Jelena_Kopats";
	private $charset="UTF8";
	private $host="localhost";

	/**
	*	Конструктор
	*	http://phpfaq.ru/pdo
	*/
	public function PostModel(){

		$dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt=array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
			
		} catch (Exception $e) {
			echo "error! ";
		}
	}






public function render_template($path,array $args) //
{
	extract($args);
	ob_start();
	require $path;
	$html=ob_get_clean();
	return $html;
}


public function list_action() {

	$postModel=new PostModel();

	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/list.php",array('posts'=>$posts));
	return new Response($html);
}
	
public function show_action($id) {
	//echo " test13";
	$postModel=new PostModel();
	$post = $postModel->get_row_by_id($id);
	$html=$this->render_template("view/templates/show.php",array('post'=>$post));
	return new Response($html);
	/*global $test;
	if($test==true)var_dump_to_file($post,'log_post.txt');*/
}

public function admin_action() {

	$postModel=new PostModel();
	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}
public function add_action() {
	$postModel=new PostModel();
	add_post();
	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}
public function delete_action($id){
	$postModel=new PostModel();
	$postModel->delete_post($id);
	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}

public function about_action(){
	$postModel=new PostModel();
	$html=$this->render_template("view/templates/about.php",array());
	return new Response($html);
}
public function edit_action($id){
	$postModel=new PostModel();
	$edit_row=$postModel->get_row_by_id($id);
	//var_dump($edit_row);
	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/edit.php",array(	'id'=>$id,
															'edit_row'=>$edit_row,
															'posts'=>$posts));
															
	return new Response($html);
}
public function update_action($id)
{
	$postModel=new PostModel();
	$postModel->update_row($id);
	$posts = $postModel->get_all_rows();
	$html=$this->render_template("view/templates/admin.php",array('posts'=>$posts));
	return new Response($html);
}

}
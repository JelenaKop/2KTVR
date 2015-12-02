<?php
use Symfony\Component\HttpFoundation\Request;	
use Symfony\Component\HttpFoundation\Response;

$request=Request::createFromGlobals();
echo "uri=".$uri = $request->getPathInfo();


if ($uri == '/')
{
	$postController=new PostController();
	$response=$postController->list_action();
}
elseif($uri == '/post')
{
	$postController=new PostController();
	$response=$postController->list_action();
}
elseif ($uri=='/user') 
{
	$userController=new UserController();
	$response=$userController->list_action();
}
elseif ($uri=='/showpost' && $request->query->has('id')) 
{
	$postController=new PostController();
	$response=$postController->show_action($request->query->get('id'));
}
elseif ($uri=='/showuser' && $request->query->has('id')) 
{
	$userController=new UserController();
	$response=$userController->show_action($request->query->get('id'));
}
elseif ($uri=='/admin' )
{
	$postController=new PostController();
	$response=$postController->admin_action();
}
elseif ($uri=='/adminuser' )
{
	$userController=new UserController();
	$response=$userController->admin_action();
}
elseif ($uri=='/add')
{
	$postController=new PostController();
	echo "hello";
	$response= $postController->add_action();
}
elseif ($uri=='/adduser')
{
	$userController=new UserController();
	echo "hello";
	$response= $userController->add_action();
}
elseif ($uri=='/delete'&& $request->query->has('id'))
{
	$postController=new PostController();
	$response=$postController->delete_action($request->query->get('id'));
}
elseif ($uri=='/deleteuser'&& $request->query->has('id'))
{
	$userController=new UserController();
	$response=$userController->delete_action($request->query->get('id'));
}
elseif ($uri=='/about')
{
	$postController=new PostController();
	$response=$postController->about_action();
}
elseif ($uri=='/edit'&& $request->query->has('id')) 
{
	$postController=new PostController();
	$response=$postController->edit_action($request->query->get('id'));
}
elseif ($uri=='/edituser'&& $request->query->has('id')) 
{
	$userController=new UserController();
	$response=$userController->edit_action($request->query->get('id'));
}
elseif ($uri=='/update') 
{
	$postController=new PostController();
	$response=$postController->update_action($request->query->get('id'));
} 
elseif ($uri=='/updateuser') 
{
	$userController=new UserController();
	$response=$userController->update_action($request->query->get('id'));
} else {

	echo "Ни один вариант не выбран: --> ".$uri;
}



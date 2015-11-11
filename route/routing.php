<?php
use Symfony\Component\HttpFoundation\Request;	
use Symfony\Component\HttpFoundation\Response;

$request=Request::createFromGlobals();
$uri = $request->getPathInfo();


if ($uri == '/')
{
	$response=list_action();
}
elseif ($uri=='/show' && $request->query->has('id')) 
{
	$response=show_action($request->query->get('id'));
}
elseif ($uri=='/admin' )
{
	$response=admin_action();
}
elseif ($uri=='/add')
{
	echo "hello";
	$response= add_action();
}
elseif ($uri=='/delete'&& $request->query->has('id'))
{
	$response=delete_action($request->query->get('id'));
}
elseif ($uri=='/about')
{
	$response=about_action();
}
elseif ($uri=='/edit'&& $request->query->has('id')) 
{
	$response=edit_action($request->query->get('id'));
}
elseif ($uri=='/change'&& $request->query->has('id')) 
{
	$response=change_action($request->query->get('id'));
} else {

	echo "Не один вариант не выбран: --> ".$uri;
}



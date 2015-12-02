<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$test=true;


include_once "vendor/autoload.php";
include_once "model/DBH.php";
//include_once "model/model.php";
include_once "model/PostModel.php";
include_once "model/UserModel.php";
include_once "controller/PostController.php";

include_once "controller/UserController.php";
include_once "route/routing.php";

$response->send();




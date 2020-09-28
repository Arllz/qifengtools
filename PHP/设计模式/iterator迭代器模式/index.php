<?php
header("Content-Type:text/html;charset-utf-8");
spl_autoload_register(function($class){
	include "iterator/".$class.'.php';
});

$users = new Alluser();
echo "<pre>";
foreach ($users as $user)
{
	var_dump($user);
	$user->age = 10;
}


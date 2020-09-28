<?php
spl_autoload_register(function($class){
	include $class.".php";
});

class proxy implements Iuserproxy
{
	public function getUser($id)
	{
		// TODO: Implement getUser() method.

	}

	public function setUserName($id, $name)
	{
		// TODO: Implement setUserName() method.
	}

}
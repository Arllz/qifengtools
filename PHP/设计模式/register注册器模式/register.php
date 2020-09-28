<?php


class register
{
	protected static $objects = array();
	static public function set($alias,$object)
	{
		self::$objects[] = $object;
	}

	static public function getInstance($alins)
	{
		return self::$objects[$alins];
	}

	function __unset($alias)
	{
		unset(self::$objects[$alias]);
	}
}


//注册树模式
$db = new Database("127.0.0.1",'root','123456','test');
register::set('db',$db);
return register::getInstance($db);
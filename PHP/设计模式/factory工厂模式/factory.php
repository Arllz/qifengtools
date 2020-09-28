<?php


class Factory
{
	static public function createDatabase()
	{
		$db = new Database("127.0.0.1",'root','123456','test');
		register::set('db',$db);//注册树模式
		return register::getInstance($db);
	}
}

//实例化
$db = Factory::createDatabase();
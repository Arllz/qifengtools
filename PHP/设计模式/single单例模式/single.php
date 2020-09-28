<?php


namespace Qifeng;


class single
{
	static private $instance;
	private function __construct()
	{

	}

	static public function getInstance()
	{
		if (is_object(self::$instance)) {
			return self::$instance;
		} else {
			self::$instance = new self();
			return self::$instance;
		}
	}
}

$db = single::getInstance();//单例模式的实例化
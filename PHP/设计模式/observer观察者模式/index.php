<?php
header("Content-Type:text/html;charset-utf-8");
spl_autoload_register(function($class){
	include "observer/".$class.'.php';
});


class Page extends Baseobserver
{
	public function index()
	{
		$this->notify();
	}
}

class Event1 implements Iobserver
{
	public function update($observer_info = null)
	{
		// TODO: Implement update() method.
		echo "event1";
	}
}

class Event2 implements Iobserver
{
	public function update($observer_info = null)
	{
		// TODO: Implement update() method.
		echo "event2";
	}
}

$obj = new Page();
$obj->addOberver(new Event1());
$obj->addOberver(new Event2());
$obj->index();
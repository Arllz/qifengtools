<?php
spl_autoload_register(function($class){
	include "db/".$class.".php";
});
class Alluser implements \Iterator
{
	protected $ids;
	protected $index;
	protected $data = array();
	protected $conn;
	public function __construct()
	{
		$db = new Mysqli('127.0.0.1','root','123456','test');
		$this->conn = $db;
		$res = $db->query("select id from db_user");
		$this->ids = $res->fetch_all(MYSQLI_ASSOC);
	}
	//返回当前元素
	public function current()
	{
		// TODO: Implement current() method.
		$id = $this->ids[$this->index]['id'];
		$res = $this->conn->query("select * from db_user where id={$id}");
		return $res->fetch_assoc();

	}

	//向前移动到下一个元素
	public function next()
	{
		// TODO: Implement next() method.
		$this->index ++;
	}

    //回到第一个元素
	public function rewind()
	{
		// TODO: Implement rewind() method.
		$this->index = 0;
	}

	//返回当前元素的键值
	public function key()
	{
		// TODO: Implement key() method.
		return $this->index;
	}

	//返回到迭代器的第一个元素
	public function valid()
	{
		// TODO: Implement valid() method.
		return $this->index < count($this->ids);
	}

}
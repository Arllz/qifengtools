<?php
class Dataobjectreflect
{
	public $id;
	public $token;
	public $age;
	protected $conn;
	public function __construct($id)
	{
		$conn = mysqli_connect("127.0.0.1",'root','123456','test');
		$this->conn = $conn;
		$res = $this->conn->query("select * from db_token where id={$id} limit 1");
		$data = $res->fetch_assoc();
		$this->id = $data['id'];
		$this->token = $data['token'];
		$this->age = $data['age'];
	}

	public function __destruct()
	{
		$this->conn->query("update db_token set token='{$this->token}',age={$this->age} where id={$this->id}");
	}
}


//数据映射模式
$object = new Dataobjectreflect(1);
$id = $object->id;//获取字段值
$object->name = 'jack';//更新字段值
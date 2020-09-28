<?php
namespace Qifeng;

class Pdo implements Idatabase
{
	protected $conn;
	public function conn($host, $user, $pwd, $dbname)
	{
		// TODO: Implement conn() method.
		$conn = new \PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
		$this->conn = $conn;
	}

	public function query($sql)
	{
		// TODO: Implement query() method.
		return $this->conn->query($sql);

	}

	public function close()
	{
		// TODO: Implement close() method.
		unset($this->conn);
	}

}
<?php
namespace Qifeng;

class Mysqli implements Idatabase
{
	protected $conn;
	public function conn($host, $user, $pwd, $dbname)
	{
		// TODO: Implement conn() method.
		$conn = mysqli_connect($host,$user,$pwd,$dbname);
		$this->conn = $conn;
		return $this->conn;
	}

	public function query($sql)
	{
		// TODO: Implement query() method.
		return mysqli_query($this->conn,$sql);
	}

	public function close()
	{
		// TODO: Implement close() method.
		mysqli_close($this->conn);
	}

}
<?php
class Mysqli
{
	protected $conn;
	public function conn($host, $user, $pwd, $dbname)
	{
		$conn = mysqli_connect($host,$user,$pwd,$dbname);
		$this->conn = $conn;
		return $this->conn;
	}

	public function query($sql)
	{
		return mysqli_query($this->conn,$sql);
	}

	public function close()
	{
		mysqli_close($this->conn);
	}

}
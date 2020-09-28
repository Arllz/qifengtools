<?php
namespace Qifeng;

class Mysql implements Idatabase
{
	protected $conn;
	public function conn($host, $user, $pwd, $dbname)
	{
		// TODO: Implement conn() method.
		$conn = mysql_connect($host,$user,$pwd);
		mysql_select_db($dbname,$conn);
		$this->conn = $conn;
		return $this->conn;

	}

	public function query($sql)
	{
		// TODO: Implement query() method.
		$ret = mysql_query($sql,$this->conn);
		return $ret;
	}

	public function close()
	{
		// TODO: Implement close() method.
		mysql_close($this->conn);
	}

}
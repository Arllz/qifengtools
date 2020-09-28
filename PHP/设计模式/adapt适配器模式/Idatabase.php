<?php
namespace Qifeng;

interface Idatabase
{
	public function conn($host,$user,$pwd,$dbname);
	public function query($sql);
	public function close();
}
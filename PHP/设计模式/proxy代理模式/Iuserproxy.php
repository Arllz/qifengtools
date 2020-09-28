<?php


interface Iuserproxy
{
	public function getUser($id);
	public function setUserName($id,$name);
}
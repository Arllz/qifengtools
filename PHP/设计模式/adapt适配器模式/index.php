<?php
$db = new Mysqli();
//可以在Mysqli,Mysql,Pdo之间自由切换
//$db = new Mysqli();
//$db = new Pdo();
$db->conn("127.0.0.1",'root','123456','test');
$db->query("show databases");
$db->close();


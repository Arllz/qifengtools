<?php
//dirname
class Myclass {

    public function fun1() {
        //返回Myclass的实例，不管哪个去调用
        return new self;
    }

    public function fun2()
    {
        //返回调用者的实例
        return new static;
    }


}

//$obj = new Myclass;
//var_dump($obj->fun1());
//echo "<br>";
//var_dump($obj->fun2());
//echo "<br>";


class Son1 extends Myclass
{

}

class Son2 extends Myclass
{

}

$obj1 = new Son1();
$obj2 = new Son2();
var_dump($obj1->fun1());#object(Myclass)#3 (0) { }
echo "<br>";
var_dump($obj2->fun1());#object(Myclass)#3 (0) { }
echo "<br>";
var_dump($obj1->fun2());#object(Son1)#3 (0) { }
echo "<br>";
var_dump($obj2->fun2());#object(Son2)#3 (0) { }
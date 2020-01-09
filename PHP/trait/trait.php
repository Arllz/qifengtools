<?php
//自PHP5.4.0起，PHP实现了一种代码复用的方法，称为trait
//优先级：从基类继承的成员会被trait插入的成员覆盖，当前类的成员优先trait的方法，而trait则覆盖了被继承的方法
trait HelloWord {
    public function sayHello()
    {
        echo "Hello World";
    }
}

class Myclss{
    use HelloWord;
    /*public function sayHello() {
        echo "I am Myclass,Hello World";
    }*/
}


$obj = new Myclss();
$obj->sayHello(); #输入 "Hello world"

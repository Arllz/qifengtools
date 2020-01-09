<?php
class Fa
{
    protected $instace = 22;
    protected $name = 'tome';
    protected  function getInstance()
    {
        return 333;
    }
    public  function get()
    {
       return __METHOD__;
    }
}
//实例化反射类，不用加载
$class = new ReflectionClass("Fa");

//传递实例参数
//$instance = $class->newInstanceArgs();

//获取类的构造函数
$construct = $class->getConstructor();

//获取所有属性
$instances = $class->getProperties();
foreach ($instances as $property)
{
    echo $property->getName()."\n"; #输出属性 instance name
}

//获取所有方法
$allMethods = $class->getMethods();
foreach ($allMethods as $method)
{
    echo $method->getName()."\n"; #输出 getInstance get
}




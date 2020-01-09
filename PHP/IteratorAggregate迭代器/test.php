<?php
//dirname
class Myclass implements IteratorAggregate{
    public $tag = 11;
    public $tag2 = 12;
    public function getIterator() {
        // TODO: Implement getIterator() method.
        return new ArrayIterator($this);
    }
}

$obj = new Myclass();
//输入所有类的属性的键值对  等价于 get_object_vars($obj)；
foreach ($obj as $key => $item)
{
    var_dump($key,$item);
    echo "<br>";
}
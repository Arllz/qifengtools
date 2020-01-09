<?php
header("Content-type:text/html;charset=utf-8");
class TesttoString
{
    public $instance = null;
    public function __construct($val)
    {
        $this->instance = $val;
    }

    //__toString 必须返回一个字符串
    public function __toString()
    {
        return (string) $this->instance;
    }
}

echo new TesttoString('Hello');
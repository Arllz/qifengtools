<?php
function func($arr,$name){print_r($arr.$name);};
call_user_func_array('func',['tom1','jack']);//输出1
echo "<br>";
func('tome1','tom3');//输出2
echo "<br>";

class foo {
    function bar($arg, $arg2) {
        echo __METHOD__, " got $arg and $arg2\n";
    }
}
$obj = new foo;
call_user_func_array(array($obj,'bar'),array('three','four'));//输出3
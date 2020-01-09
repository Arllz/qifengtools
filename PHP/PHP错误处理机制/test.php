<?php
function __error_handler($errno,$errstr,$errfile,$errline)
{
    echo "错误编码error:{$errno}<br>";
    echo "错误信息errstr:{$errstr}<br>";
    echo "出错文件errfile:{$errfile}<br>";
    echo "出错行数：{$errline}<br>";
}

//设置用户自定义的错误处理函数
//以下级别的错误不能由用户定义的函数来处理：E_ERROR,E_PARSE,E_CODE_ERROR,E_WARNING,E_COMPILE_ERROR,E_COMPILE_WARNING
//和在调用set_error_handler()函数所在文件中产生的大多数E_STRICT
//E_ERROR是系统错误，不能被set_error_handler捕获，E_USER_ERROR用户自定义错误类型，可以被set_error_handler捕获
set_error_handler('__error_handler',E_ALL | E_STRICT);


function __exception_handler($exception)
{
    //echo "<br>Exception:".$exception->getMessage();
    echo "<pre>";
    print_r($exception);
}
set_exception_handler('__exception_handler');


echo $foo['bar'];

echo foor(3,4);
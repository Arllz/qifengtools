<?php
//自动加载器
spl_autoload_register(function($class_name){
    //需要加载类文件可能在的目录数组
    $file_exist_dir = array(
        "./lib/$class_name.class.php",
        "./tmp/$class_name.class.php"
    );
    //循环数组
    foreach ($file_exist_dir as $path) {
        if (file_exists($path)) require_once $path;
    }
});
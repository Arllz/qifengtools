<?php
//PHP处理文件
//fopen($filename,mode,include_path,context);
//fread($resource,$filesize);$source文件打开的资源，$filesize文件的大小
//fwrite($file,$content);$file文件打开的资源，$content要往文件写的内容
//fclose($file);$file打开文件的资源
//$param $filename 必须规定要打开的文件或者URL
//$param $mode 必须 规定要求到该文件/流访问类型
//"r" 只读方式打开，将文件指正指向文件头
//"r+" 读写方式打开，将文件指针指向文件头
//"w" 写入方式打开，将文件指针之下你给文件头，并将文件大小截为零，如果文件不存在则尝试创建它
//"w+" 读写方式打开，将文件指针之下你给文件头，并将文件大小截为零，如果文件不存在则尝试创建它
//"a" 写入方式打开，将文件指针指向文件末尾，如果文件不存在则尝试创建它
//"a+" 读写方式打开，将文件指针指向文件末尾，如果文件不存在则尝试创建它
//"x" 创建并写入方式打开，将文件指针指向文件头，如果文件已存在，则fopen()调用失败，并返回FALSE,并生成一条E_EARNING级别的错误信息，如果文件不存在则尝试创建它。
//"x+" 创建并已写入的方式打开，将文件指针指向文件头，吐过文件已存在，则fopen()调用失败，并返回FALSE,并生成一条E_EARNING级别的错误信息，如果文件不存在则尝试创建它。

$filename = "./1.txt";

//创建文件
$obj = fopen($filename,"a+");

//读取文件
$obj = fopen($filename,'r');
$size = filesize($filename);
$contetn = fread($obj,$size);

echo "<pre>";
echo $contetn;
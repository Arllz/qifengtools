<?php
//opendir($dir) 代开文件夹，返回文件夹资源
//readdir(dir_handle)返回目录中下一个文件的文件名，dir_handle由opendir()打开的目录的句柄资源
$file = __DIR__;
function get_file($file)
{
    global $files;
    if (is_dir($file))
    {
        $handle = opendir($file);
        while($source = readdir($handle))
        {
           if ($source != "." && $source != "..")
           {
               if (is_dir($file.'/'.$source)) {
                   get_file($file.'/'.$source);
               } else {
                   $files[] =  $file.'/'.$source;
               }
           }
        }
    }
    return $files;
}
//$files = get_file($file);
//echo "<pre>";
//print_r($files);
//die;

#scandir($dir) 遍历文件夹，返回文件下所有文件
function get_file_1($dir) {
    $ret = scandir($dir);
    global $files;
    foreach ($ret as $row) {
        if ($row != '.' && $row != '..')
        {
            if (is_dir($dir.'/'.$row)) {
                get_file_1($dir.'/'.$row);
            } else {
                $files[] =  $dir.'/'.$row;
            }
        }
    }
    return $files;
}
$file = __DIR__;
$files = get_file_1($file);
echo "<pre>";
print_r($files);
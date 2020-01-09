<?php
function countx($filename = 'countx.txt')
{
    if (file_exists($filename)) {
        $fp = fopen($filename,'r');
        $numx = fgets($fp,10);
        $numx++;
    } else {
        $numx = 1;
    }
    file_put_contents($filename,$numx);
    echo $numx;
}

//调用计数器
countx();
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
    #冒泡排序
    public function maopao()
    {
       $arr = [2,9,52,17,6,95,15];
       for ($i = 0;$i < count($arr);$i++)
       {
           for ($j=$i+1;$j < count($arr);$j++)
           {
               if ($arr[$i] < $arr[$j])
               {
                   $a = $arr[$j];
                   $arr[$j] = $arr[$i];
                   $arr[$i] = $a;
               }
           }
       }
       print_r($arr);
    }

    #9*9
    public function nine_pix()
    {
        $arr = array();
        for ($i=0;$i<=9;$i++) {
            for ($j=$i;$j<=9;$j++) {
                echo $i."*".$j.'='.$i*$j."\n";
            }
            echo "<br>";
        }
    }

    #time
    public function ti()
    {
        echo date('Y-m-d');//今天
        echo "<br>";
        echo date("Y-m-d",strtotime('+1 day'));//明天
        echo "<br>";
        echo date("Y-m-d",strtotime('-1 day'));//昨天
        echo "<br>";
        echo date("Y-m-d",strtotime("-1 month"));//一个月前的今天
        echo "<br>";
        echo date('Y-m-d',strtotime("-1 year"));
        echo "<br>";
        echo "下周一：".date('Y-m-d',strtotime("next Monday"));
        echo "下周二：".date('Y-m-d',strtotime("next Tuesday"));
    }

    public function te()
    {
        $a = 37.2568;
        echo floor($a*100)*0.01;
    }


    #

}

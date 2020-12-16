<?php     
$season = ceil((date('n'))/3);//季度
$half = ceil((date('n'))/6);  //半年中
$first_day_month = mktime(0, 0, 0,date("m"),1,date("Y"));//月初
$last_day_month = mktime(23,59,59,date("m"),date("t"),date("Y")); //月末
$first_day_quarter = mktime(0, 0, 0,$season*3-3+1,1,date('Y')); //季度中
$last_day_quarter = mktime(23,59,59,$season*3,date('t',mktime(0, 0 , 0,$season*3,1,date("Y"))),date('Y')); //季度末
$first_day_half = mktime(0, 0, 0,$half*6-6+1,1,date('Y'));//半年初
$last_day_half = mktime(23,59,59,$half*6,date('t',mktime(0, 0 , 0,$half*6,1,date("Y"))),date('Y')); //半年末
$first_day_year = mktime(0, 0, 0,1,1,date('Y'));//年出
$last_day_year = mktime(23,59,59,12,31,date('Y')); //年末
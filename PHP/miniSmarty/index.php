<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/23
 * Time: 10:15
 */

include_once './TestSmarty.class.php';
$smarty = new TestSmarty();
$smarty->template_dir = './templete';
$smarty->compile_dir = './compile';

//给模板对象复制
$tile = '我在写smarty small demo';
$content = 'so small,so eary';
$smarty->assign('title',$tile);
$smarty->assign('content',$content);
$smarty->display('test.html');
<?php
include_once "Task.php";
include_once "Scheduler.php";
$a = array();
function task1()
{
    for ($i = 1; $i <= 10; $i++)
    {
        echo "This is task 1 iteration $i.<br>";
        yield $i;
    }
}


function task2()
{
    for ($j = 1; $j <= 5; $j++) {
        echo "This is task 2 iteration $j.<br>";
        yield $j;
    }
}



$scheduler = new Scheduler();//实例化一个调度器

$scheduler->addTask(task1());
$scheduler->addTask(task2());
$a = $scheduler->run();


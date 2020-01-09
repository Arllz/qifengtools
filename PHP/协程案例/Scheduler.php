<?php
/*
 * 调度程序scheduler
 *
 * */
class Scheduler
{
   protected $taskQueue;
   public $tid = 0;
   public function __construct() {
       /*
        * 原理就是维护一个队列
        * 前面说过，从编程的角度上看，协程的思想本质就是控制流的主动让出（yield）和恢复（resume）机制
        */
       $this->taskQueue = new SplQueue();
   }

   //增加一个任务
    public function addTask(generator $task)
    {
        $tid = $this->tid;
        $task = new Task($tid,$task);
        $this->taskQueue->enqueue($task);
        $this->tid++;
        return $tid;
    }

    //把任务放进队列
    public function schedule(Task $task)
    {
        $this->taskQueue->enqueue($task);
    }

    //运行调度器
    public function run()
    {
        while (!$this->taskQueue->isEmpty()) {
            //任务出列
            $task = $this->taskQueue->dequeue();
            $res = $task->run();
            if (!$task->isFinished()) {
                //任务如果还没有执行完毕，入队等下次执行
                $this->schedule($task);
            }
        }
    }
}

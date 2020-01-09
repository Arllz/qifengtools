<?php

class Task
{
   protected $taskId;
   protected $coroutine;
   protected $beforeFistTield = true;
   protected $sendValue;

   public function __construct($taskId,Generator $coroutine) {
       $this->taskId = $taskId;
       $this->coroutine = $coroutine;
   }

   /*
    * 获取当前的Task的ID
    * return Mixed
    */
   public function getTaskId()
   {
       return $this->taskId;
   }

   /*
    * 判断Task执行完毕了没有
    *
    * @param $value
    */
    public function isFinished() {
        return !$this->coroutine->valid();
    }

    /*
     * 设置下次要传给协程的值，比如$id = (yeild $xxxx) 这个值就给了$id
     *
     * $param
     */
    public function setSendValue($value)
    {
        $this->sendValue = $value;
    }

    /*
     * 运行任务
     *
     * @return mixed
     */
    public function run()
    {
        //这里注意，生成器的开始会reset,所以第一个值要用current获取
        if ($this->beforeFistTield)
        {
            $this->beforeFistTield = false;
            return $this->coroutine->current();
        } else {
            //我们说过了，用send去调用一个生成器
            $retval = $this->coroutine->send($this->sendValue);
            $this->sendValue = null;
            return $retval;
        }
    }
}

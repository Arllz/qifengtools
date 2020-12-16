<?php
function test()
{
	//管道批量添加链表值，贼快
	 Redis::pipeline(function($pipe) use($list) {
            foreach ($list as $row) {
                $pipe->lpush($this->key,$row);
            }
        });
}

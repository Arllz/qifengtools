<?php
class Canvas
{
	public function init()
	{
		for ($i=1;$i<10;$i++)
		{
			echo "**********<br>";

		}
	}
	public function draw($a){
		echo "画画".$a;
	}
}

//普通模式
$object1 = new Canvas();
$object1->init();
$object1->draw();

$object2 = new Canvas();
$object2->init();
$object2->draw();


//原型模式  内存复制对象
$prototype = new Canvas();
$prototype->init();

$canvas1 = clone $prototype;
$canvas1->draw();

$canvas2 = clone $prototype;
$canvas2->draw();



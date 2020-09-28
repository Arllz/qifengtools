<?php
spl_autoload_register(function($class){
	include $class.".php";
});

class Canvas
{
	protected $decorators;
	public function before()
	{
		foreach ($this->decorators as $item) {
			$item->actionBefore();
		}
	}

	public function after()
	{
		$after = array_reverse($this->decorators);
		foreach ($after as $item) {
			$item->actionAfter();
		}
	}

	public function addDecorate(\Idecorator $decorator)
	{
		$this->decorators[] = $decorator;
	}
	public function draw()
	{
		$this->before();
		$fn = function($i){
			$star = "";
			for ($j=1;$j<=$i;$j++) {
				$star .= "*";
			}
			echo $star."<br>";
		};

		for ($i = 1;$i <= 10;$i++) {
			$fn($i);
		}
		$this->before();
	}

}

class decorator1 implements Idecorator
{
	public function actionBefore()
	{
		// TODO: Implement actionAfter() method.
		echo "<div style='color:red;'>";
	}

	public function actionAfter()
	{
		// TODO: Implement actionBefore() method.
		echo "</div>";
	}
}

class decorator2 implements Idecorator
{
	public function actionBefore()
	{
		// TODO: Implement actionAfter() method.
		echo "<div style='font-size:30px;'>";
	}

	public function actionAfter()
	{
		// TODO: Implement actionBefore() method.
		echo "</div>";
	}
}

$canvas1 = new Canvas();
$canvas1->addDecorate(new decorator1());
$canvas1->addDecorate(new decorator2());
$canvas1->draw();

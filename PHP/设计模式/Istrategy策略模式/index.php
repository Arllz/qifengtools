<?php
class Test
{
	protected $strategy;
	public function index()
	{
		$this->strategy->showad();
		echo "<br>";
		$this->strategy->showStratey();
	}

	public function setStrategy(\Istrategy\Istrategy $strategy)
	{
		$this->strategy = $strategy;
	}
}

$obj = new Test();
if (isset($_GET['female']))
{
	$strategy = new \Istrategy\Female();
} else {
	$strategy = new \Istrategy\Male();
}
$obj->setStrategy($strategy);
$obj->index();

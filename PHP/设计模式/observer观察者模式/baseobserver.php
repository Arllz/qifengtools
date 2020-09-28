<?php


abstract class Baseobserver
{
	protected $trggers;
	public function addOberver(\Iobserver $event)
	{
		$this->trggers[] = $event;
	}

	public function notify()
	{
		foreach ($this->trggers as $item)
		{
			$item->update();
		}
	}

}
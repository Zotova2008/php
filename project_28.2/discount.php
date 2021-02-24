<?php
interface interfaceCommand
{
	function onCommand($name);
}

class Discount
{
	private $_commands = array();
	public function addCommand($cmd)
	{
		$this->_commands[] = $cmd;
	}

	public function runCommand($name)
	{
		foreach ($this->_commands as $cmd) {
			if ($cmd->onCommand($name))
				return;
		}
	}
}

class PercentDiscount implements InterfaceCommand
{
	public function onCommand($type)
	{
		if ($type == 0) {
			echo "У Вас есть процентная скидка" . '</br>';
		} else echo  "Процентная скидка не предоставляется" . '</br>';
	}
}

class DeliveryDiscount implements interfaceCommand
{
	public function onCommand($type)
	{
		if ($type == 1) {
			echo "Возможна скидка на доставку" . '</br>';
		} else {
			echo  "Скидка на доставку невозможна" . '</br>';
		}
	}
}

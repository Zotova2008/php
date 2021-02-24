<?php
interface ICommand
{
  function onCommand($name);
}

class DiscountCommandChain
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

class PercentDiscount implements ICommand
{
  public function onCommand($type)
  {
    if ($type == 0) {
      echo "Возможно применение скидки" . '</br>';
    } else echo  "Применение скидки невозможно" . '</br>';
  }
}

class DeliveryDiscount implements ICommand
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

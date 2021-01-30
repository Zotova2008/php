<?php

abstract class Transport
{
  public function Beep()
  {
    return 'Beep Beep';
  }

  public function drivingForward()
  {
    return 'Едем вперед';
  }

  public function drivingBack()
  {
    return 'Едем назад';
  }

  public function wipersOn()
  {
    return 'Включить дворники';
  }

  public function wipersOff()
  {
    return 'Выключить дворники';
  }

  abstract public function characteristicSigns();
  abstract public function characteristicActions();
}

class Auto extends Transport
{
  public function characteristicSigns()
  {
    return 'кожанный салон';
  }

  public function characteristicActions()
  {
    return 'закись азота';
  }
}

class Tank extends Transport
{
  public function characteristicSigns()
  {
    return 'усовершенствованное управление';
  }

  public function characteristicActions()
  {
    return 'усовершенствованная гусеница';
  }
}

class SpecialEquipment extends Transport
{
  public function characteristicSigns()
  {
    return 'дополнительное спальное место';
  }

  public function characteristicActions()
  {
    return 'управление ковшом';
  }
}

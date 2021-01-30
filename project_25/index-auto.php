<?php

abstract class Transport
{

  private $name;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

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
    return 'Кожанный салон';
  }

  public function characteristicActions()
  {
    return 'Закись азота';
  }
}

class Tank extends Transport
{
  public function characteristicSigns()
  {
    return 'Усовершенствованное управление';
  }

  public function characteristicActions()
  {
    return 'Усовершенствованная гусеница';
  }
}

class SpecialEquipment extends Transport
{
  public function characteristicSigns()
  {
    return 'Дополнительное спальное место';
  }

  public function characteristicActions()
  {
    return 'Управление ковшом';
  }
}

// Автомобиль
$objectAuto = new Auto();
$objectAuto->setName('Легковой автомобиль');

// Танк
$objectTank = new Tank();
$objectTank->setName('Танк');

// Бульдозер
$objectSpecialEquipment = new SpecialEquipment();
$objectSpecialEquipment->setName('Бульдозер');

echo "В игре участвуют 3 машины: {$objectAuto->getName()}, {$objectTank->getName()}, {$objectSpecialEquipment->getName()}.";
echo "<br>";
echo "Рассмотрим, характеристики каждой машины";
echo "<br>";
echo "<h2>{$objectAuto->getName()}</h2>";
echo "<br>";
echo "<i>{$objectAuto->Beep()}</i>";
echo "<br>";
echo "<i>{$objectAuto->drivingForward()}</i>";
echo "<br>";
echo "<i>{$objectAuto->drivingBack()}</i>";
echo "<br>";
echo "<i>{$objectAuto->wipersOn()}</i>";
echo "<br>";
echo "<i>{$objectAuto->wipersOff()}</i>";
echo "<br>";
echo "<i>{$objectAuto->characteristicSigns()}</i>";
echo "<br>";
echo "<i>{$objectAuto->characteristicActions()}</i>";
echo "<br>";

echo "<h2>{$objectTank->getName()}</h2>";
echo "<br>";
echo "<i>{$objectTank->Beep()}</i>";
echo "<br>";
echo "<i>{$objectTank->drivingForward()}</i>";
echo "<br>";
echo "<i>{$objectTank->drivingBack()}</i>";
echo "<br>";
echo "<i>{$objectTank->wipersOn()}</i>";
echo "<br>";
echo "<i>{$objectTank->wipersOff()}</i>";
echo "<br>";
echo "<i>{$objectTank->characteristicSigns()}</i>";
echo "<br>";
echo "<i>{$objectTank->characteristicActions()}</i>";
echo "<br>";

echo "<h2>{$objectSpecialEquipment->getName()}</h2>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->Beep()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->drivingForward()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->drivingBack()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->wipersOn()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->wipersOff()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->characteristicSigns()}</i>";
echo "<br>";
echo "<i>{$objectSpecialEquipment->characteristicActions()}</i>";
echo "<br>";

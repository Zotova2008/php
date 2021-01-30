<?php

class Family
{
  private $surName = 'Ивановы';
  private $city = 'Москва';
  private $name;
  private $age;
  private $sex;

  public function getCity()
  {
    return $this->city;
  }

  public function getSurName()
  {
    return $this->surName;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function getSex()
  {
    return $this->sex;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setAge($age)
  {
    $this->age = $age;
  }

  public function setSex($sex)
  {
    $this->sex = $sex;
  }
}

class Father extends Family
{
  private $wifeName;

  public function getWifeName()
  {
    return $this->wifeName;
  }

  public function setWifeName($name)
  {
    $this->wifeName = $name;
  }
}

class Mother extends Family
{
  private $husbandName;

  public function getHusbandName()
  {
    return $this->husbandName;
  }

  public function setHusbandName($name)
  {
    $this->husbandName = $name;
  }
}

class Child extends Family
{
  private $mother;
  private $motherDominantFeature;
  private $father;
  private $fatherDominantFeature;

  public function getMotherName()
  {
    return $this->mother;
  }

  public function getMotherDominantFeature()
  {
    return $this->motherDominantFeature;
  }

  public function getFatherName()
  {
    return $this->father;
  }

  public function getFatherDominantFeature()
  {
    return $this->fatherDominantFeature;
  }

  public function setMotherName($name)
  {
    $this->mother = $name;
  }

  public function setMotherDominantFeature($motherDominantFeature)
  {
    $this->motherDominantFeature = $motherDominantFeature;
  }

  public function setFatherName($name)
  {
    $this->father = $name;
  }

  public function setFatherDominantFeature($fatherDominantFeature)
  {
    $this->fatherDominantFeature = $fatherDominantFeature;
  }
}

// /*Проверка*/

$objectFamily = new Family();
$objectFather = new Father();
$objectMother = new Mother();
$objectChild = new Child();

$objectFather->setName('Иван');
$objectFather->setAge('30');
$objectFather->setSex('Мужчина');
$objectFather->setWifeName('Анна');

$objectMother->setName('Анна');
$objectMother->setAge('29');
$objectMother->setSex('Женщина');
$objectMother->setHusbandName('Иван');

$objectChild->setName('Миша');
$objectChild->setAge('5');
$objectChild->setSex('Мальчик');
$objectChild->setMotherName('Анна');
$objectChild->setMotherDominantFeature('карие глаза');
$objectChild->setFatherDominantFeature('высокий рост');

echo "Семья состоит из 3 человек. Их фамилия {$objectFamily->getSurName()}. Живут они в городе {$objectFamily->getCity()}";
echo '<br>';
echo "Папа {$objectFather->getName()} ему {$objectFather->getAge()} лет. Он {$objectFather->getSex()}";
echo '<br>';
echo "Мама {$objectMother->getName()} ей {$objectMother->getAge()} лет. Она {$objectMother->getSex()}";
echo '<br>';
echo "И {$objectChild->getSex()} {$objectChild->getName()} ему {$objectChild->getAge()} лет.";
echo '<br>';
echo "{$objectChild->getName()} унаследовал от своей мамы {$objectChild->getMotherDominantFeature()}, а от папы {$objectChild->getFatherDominantFeature()}.";

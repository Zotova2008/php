<?php
include "database.php";

// Формируем массив из полных имен из example_persons_array
foreach ($example_persons_array as $key) {
  $fullName[] = $key['fullname'];
}

// Разбивает ФИО из массива $fullName по ключам
function getPartsFromFullname($value)
{
  $keys = ['surname', 'name', 'patronomyc'];
  $val = explode(" ", $value);
  $arr = array_combine($keys, $val);

  return $arr;
}

// Принимает три строки и склеивает в одну строку
function  getFullnameFromParts($surname, $name, $patronomyc)
{
  $a = $surname . ' ' . $name . ' ' . $patronomyc;

  return $a;
}

// Принимает ФИО, а возращает Иван И. (Имя Фамилия)
function getShortName($item)
{
  $i = getPartsFromFullname($item);
  $shortName = $i['name'] . ' ' . mb_substr($i['surname'], 0, 1) . '.';

  return $shortName;
}

// Определение пола пользователя
function getGenderFromName($item)
{
  $num = 0;
  $i = getPartsFromFullname($item);
  if (mb_substr($i['surname'], -2) === 'ва') {
    $num -= 1;
  } elseif (mb_substr($i['surname'], -1) === 'в') {
    $num += 1;
  } else {
    $num += 0;
  }

  if (mb_substr($i['name'], -1) === 'а') {
    $num -= 1;
  } elseif (mb_substr($i['name'], -1) === 'й') {
    $num += 1;
  } else {
    $num += 0;
  }

  if (mb_substr($i['patronomyc'], -3) === 'вна') {
    $num -= 1;
  } elseif (mb_substr($i['patronomyc'], -2) === 'ич') {
    $num += 1;
  } else {
    $num += 0;
  }

  return $num <=> 0;
}

// Расчет состава аудитории

// Дополнительные функции
function percent($countAll, $countItem)
{
  return $countItem * 100 / $countAll;
}

function filterFamale($item)
{
  return (getGenderFromName($item) < 0);
}

function filterMale($item)
{
  return (getGenderFromName($item) > 0);
}

function filterNone($item)
{
  return (getGenderFromName($item) == 0);
}

// Основная функция "Расчет состава аудитории"

function getGenderDescription($array)
{
  $countArray = count($array);

  // Формируем массивы по половому признаку
  $arrayFamale = [];
  $arrayMale = [];
  $arrayNone = [];


  // foreach ($array as $item) {
  //   $i = getGenderFromName($item);

  //   if ($i < 0) {
  //     $arrayFamale[] = $item;
  //   } elseif ($i > 0) {
  //     $arrayMale[] = $item;
  //   } else {
  //     $arrayNone[] = $item;
  //   }
  // }

  $arrayFamale = array_filter($array, 'filterFamale');
  $arrayMale = array_filter($array, 'filterMale');
  $arrayNone = array_filter($array, 'filterNone');

  $countFamale = count($arrayFamale);
  $countMale = count($arrayMale);
  $countNone = count($arrayNone);

  $percentFamale = round(percent($countArray, $countFamale));
  $percentMale = round(percent($countArray, $countMale));
  $percentNone = round(percent($countArray, $countNone));

  return [$percentMale, $percentFamale, $percentNone];
}

$audience = getGenderDescription($fullName);

// Идеальный подбор пары

function getPerfectPartner($surname, $name, $patronomyc, $fullName)
{
  // 1. Регистр
  $surname = mb_convert_case($surname, MB_CASE_TITLE, "UTF-8");
  $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
  $patronomyc = mb_convert_case($patronomyc, MB_CASE_TITLE, "UTF-8");

  // 2. 
  $name = getFullnameFromParts($surname, $name, $patronomyc);
  $nameGender = getGenderFromName($name);

  if ($nameGender < 0) {
    $arrayForPartner = array_filter($fullName, 'filterMale');
  } elseif ($nameGender > 0) {
    $arrayForPartner = array_filter($fullName, 'filterFamale');
  } else {
    $arrayForPartner = array_filter($fullName, 'filterNone');
  }

  $i = array_rand($arrayForPartner);

  $name = getShortName($name);
  $namePartner = getShortName($arrayForPartner[$i]);


  $compatibility = number_format(rand(5000, 10000) / 100, 2, ',', '');

  return [$name, $namePartner, $compatibility];
}

$data = getPerfectPartner('Иванова', 'Марина', 'Ивановна', $fullName);

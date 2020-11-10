<?php

$num = (int)readline();
function check($num, $currentNum, $i)
{
  if ($currentNum === $num) {
    return 'YES';
  }
  if ($currentNum > $num) {
    return 'NO';
  }
  if ($i > 100) {
    return 'NO';
  }
  $currentNum = $currentNum * 2;
  $i++;
  $res = check($num, $currentNum, $i);
  echo $res;
}

$result = check($num, 1, 0);
echo $result;

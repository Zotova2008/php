<?php

$num = readline();

function isPrime($num)
{
  if ($num == 1) return false;
  if ($num == 2) return true;
  if ($num % 2 == 0) {
    return false;
  }
  $ceil = ceil(sqrt($num));
  for ($i = 3; $i <= $ceil; $i = $i + 2) {
    if ($num % $i == 0) return false;
  }
  return true;
}

if (isPrime($num) == true) {
  echo "prime";
} else {
  echo "composite";
}

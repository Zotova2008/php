<?php

$a = (float)readline();
$n = (int)readline();

function power($a, $n)
{
    if($n === 0) {
        return 1;
    }
    $result = $a * power($a, $n - 1);
    return $result;
}

$result = power($a, $n);
echo $result;

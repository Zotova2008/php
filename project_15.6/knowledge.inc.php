
<?php
$a = 'Мои знания на';
$b = 100;
$c = '%';
?>

<?php
$price = 18;

if ($price >= 15 && $price <= 20) {
  $priceEcho = "Число $price находится между 15 и 20";
} else {
  $priceEcho = "Число $price не находится между 15 и 20";
}

$myArray = [1, 2, 'число'];
$check;

if (is_array($myArray)) {
  $check = ' - это массив';
}

?>

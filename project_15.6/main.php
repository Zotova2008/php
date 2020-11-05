<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Practice</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header class="header-box">
    <div class="header wrapper">
      <?php include 'logo.inc.php'; ?>
      <?php include 'menu.inc.php'; ?>
    </div>
  </header>

  <main>

    <div class="about wrapper">

      <h1> <?php echo $p; ?> </h1>

      <div class="data">
        <div class="my-img">
          <?php echo '<img src="img/logo-el.png">'; ?>
        </div>

        <div class="fullname">
          <p>Меня зовут
            <?php echo $name, ' ', $surname . '<br>';
            echo 'город', ' ', $city; ?>
          </p>

          <p>Мне <?php echo $age; ?> лет</p>
          <p>Мы научились создавать переменные </p>
          <p>Изучили простые операции с ними </p>
        </div>
      </div>

      <div class="knowledge">
        <?php include 'knowledge.inc.php'; ?>
        <?php echo $a, ' ', $b, ' ', $c; ?><br>

        <?php

        $a = 10;
        $b = 20;
        $c = $a + $b;
        $d = "Сумма $a и $b равна ";
        $e = $a * $b;
        $f = "Произведение $a и $b равна ";

        echo $d, ' ', $c;
        ?>

        <br>

        <?php
        echo $f, ' ', $e;
        ?>

        <br>

        <?php
        echo $priceEcho;
        ?>

        <br>

        <?php
        echo var_dump($myArray), ' ', $check;
        ?>

      </div>

      <div class="article">
        <p class="text">
          В данном модуле были изучены типы данных в PHP, продемонстрированы полученные знания в виде создания переменных с различными типами данных и выводом результата в браузере.
        </p>
      </div>
    </div>
  </main>

  <?php include 'footer.inc.php'; ?>
</body>

</html>

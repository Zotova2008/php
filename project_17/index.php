<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Module 17</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'calculation.php'; ?>
  <header class="header">
    <div class="wrapper">
      <h1 class="title">Статистические данные</h1>
    </div>
  </header>

  <main>
    <section class="statistics">
      <div class="wrapper">
        <h2 class="title">Гендерный состав аудитории:</h2>
        <ul class="statistics__list">
          <li class="statistics__item">
            <div class="statistics__title">Мужчины</div>
            <div class="statistics__number">
              <?php echo $audience[0] . '%' ?>
            </div>
          </li>
          <li class="statistics__item">
            <div class="statistics__title">Женщины</div>
            <div class="statistics__number">
              <?php echo $audience[1] . '%' ?>
            </div>
          </li>
          <li class="statistics__item">
            <div class="statistics__title">Не удалось определить</div>
            <div class="statistics__number">
              <?php echo $audience[2] . '%' ?>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="perfect">
      <div class="wrapper">
        <h2 class="title">Идеальный подбор пары</h2>
        <div class="perfect__result">
          <div class="perfect__names">
            <?php
            echo "{$data[0]} + {$data[1]}"
            ?>
          </div>
          <div class="perfect__number">
            <p>&hearts;</p>
            <?php echo "Идеально на {$data[2]}% " ?>
            <p>&hearts;</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="wrapper">
      <p class="title">Наталья Зотова. PHP-2</p>
    </div>
  </footer>
</body>

</html>
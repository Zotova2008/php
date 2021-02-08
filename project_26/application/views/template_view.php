<!DOCTYPE html>
<html class="site" lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>PHP2.MCV-фреймворк</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <header class="header">
    <div class="logo"><img src="/img/bg.png" alt="Logo"></div>
    <nav class="nav">
      <a href="/">Главная</a>
      <a href="/about">Обо мне</a>
      <a href="/contacts">Контакты</a>
      <a href="/portfolio">Портфолио</a>
    </nav>
  </header>
  <aside class="aside">
    <div class="nav">
      <a href="/">Главная</a>
      <a href="/about">Обо мне</a>
      <a href="/contacts">Контакты</a>
      <a href="/portfolio">Портфолио</a>
    </div>

    <section class="pharase">
      <blockquote class="pharase__item"><cite>Стивен Сигал:</cite>
        <p>Учитесь, чтобы понять, что является настоящим.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Джон Локк:</cite>
        <p>Великое искусство научиться многому - это браться сразу за немногое.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Хосе Марти:</cite>
        <p>Тот, кто не желает учиться, - никогда не станет настоящим человеком.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Солон:</cite>
        <p>Пока живёшь - поучайся. Не жди, чтоб старость принесла с собой мудрость.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Отто фон Бисмарк:</cite>
        <p>Учись так, как будто тебе предстоит жить вечно; живи так, как будто тебе предстоит умереть завтра.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Леонардо да Винчи:</cite>
        <p>Ученья корень горек, да плод сладок.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>А.В. Суворов:</cite>
        <p>Легко в учении - тяжело в походе, тяжело в учении - легко в походе.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>А.В. Суворов:</cite>
        <p>Ученье свет, а неученье - тьма.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Н.В. Гоголь:</cite>
        <p>Уча других, также учишься.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Роберт Шуман:</cite>
        <p>Нет конца учению.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Петроний:</cite>
        <p>Чему бы ты не учился, ты учишься для себя.</p>
      </blockquote>
      <blockquote class="pharase__item"><cite>Уле-Эйнар Бьёрндален:</cite>
        <p>Старайся работать только с теми, кто сильнее тебя. Именно такие люди помогают тебе расти.</p>
      </blockquote>
    </section>
  </aside>
  <main class="main">
    <section class="title">
      <?php include 'application/views/' . $content_view; ?>
    </section>


  </main>
  <footer class="footer">
    <p>PHP2.2021.Модуль 26</p>
  </footer>
  <script src="/js/script.js"></script>
</body>

</html>
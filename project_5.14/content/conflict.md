# Инструкция по работе с GIT

LICENSE: [MIT](license.md)

<img src="../assets/logo-git.png" alt="logo" width=300>

#### [<= К содержанию](../readme.md)

---

## Разрешение конфликтов

---

1. ## Ситуация №1

   _Вы и еще (например) один разработчик, работаете над одним файлом в одной ветке_ `master`

   _После того, как вы забрали изменения к себе `git pull`, появились конфликты_

```
<html>
  ...
  <main>
<<<<<<< HEAD
    <h1>Hello,World!</h1>
=======
    <h1>Hello,World! Life is great!</h1>
>>>>>>> master
  </main>
  ...
</html>
```

_Перед тем как идти дальше, нам нужно:_

- _исправить конфликты (вручную, путем удаления не нужного кода),_

```
<html>
  ...
  <main>
    <h1>Hello,World!</h1>
  </main>
  ...
</html>
```

- _измененные файлы, отправить в индекс [git add](add.md)_

```
git add -A
```

- _написать коммит [git commit](commit.md)_

```
git commit -m "fix conflict"
```

- _отправить в удаленный репозиторий [git push](push.md)_

```
git push origin master
```

---

2. ## Ситуация №2

   _Вы и еще (например) один разработчик, работаете над одним файлом в разных ветках_

   _И прежде чем отправить свои изменения на git вам нужно:_

- _перейти в ветку `master` [git checkout](checkout.md),_

```
git checkout master
```

- _обновить свою версию проекта [git pull](pull.md),_

```
git pull origin master
```

- _вернуться обратно в свою ветку [git checkout](checkout.md),_

```
git checkout main-menu
```

- _объеденить обе версии проекта [git merge](merge.md),_

```
git merge master
```

- _исправить конфликты (вручную, путем удаления не нужного кода),_

- _измененные файлы, отправить в индекс [git add](add.md)_

```
git add -A
```

- _написать коммит [git commit](commit.md)_

```
git commit -m "fix conflict"
```

- _отправить в удаленный репозиторий [git push](push.md)_

```
git push origin main-menu
```

#### [<= К содержанию](../readme.md)

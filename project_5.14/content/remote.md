# Инструкция по работе с GIT

LICENSE: [MIT](license.md)

<img src="../assets/logo-git.png" alt="logo" width=300>

#### [<= К содержанию](../readme.md)

---

## git remote

---

**Если на GitHub у вас еще нет проекта:**

1. Переходим по https://github.com/new на GitHub

   _Если вы еще не авторизовались, то авторизуемся_

   _или_

   ![](../assets/new.png)

1) **Подключаемся к своему аккаунту github.**

   _Данная команда выполняется один раз, в момент установки git на свой компьютер.
   Подробнее об установке можно узнать на сайте https://git-scm.com/_

```
git config --global user.name "Your Name"
git config --global user.email "your_email@mail.com"
```

2. **Создаем папку для проекта**
3. **Открываем терминал и пишем:**

```
$ cd C:/Users/user/my_project
```

4. **Выполняем команду:**

   _(Данная команда создает в текущей директории новую папку `.git`)_

```
$ git init
```

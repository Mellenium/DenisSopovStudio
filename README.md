Denis Sopov Studio
==================

![Скриншот главнй страницы](https://github.com/web4life/DenisSopovStudio/blob/master/design/home.png?raw=true)


Требования
-----------

* Apache 2.2.21
* MySQL 5.5.16
* Wordpress 3.2.1

Установка
----------

* Создать базу данных `<имя_базы_данных>`
* Импортировать базу из `/backup/database.sql`
* Изменить url в базе данных командой `UPDATE wp_options SET option_value = replace(option_value,
 'http://www.СТАРЫЙУРЛ.com', 'http://www.НОВЫЙУРЛ.com')
WHERE option_name = 'home' OR option_name = 'siteurl';`
* Перейти в админку Wordpress
* Wordpress предложит создать файл wp-config.php
* При создании в автоматическом режиме, необходимо заполнить необходимые поля:
    база данных = `<имя_базы_данных>`
    остальные поля заполняются пользователем
* Зайти в админку Wodrpress
* Активировать нужную тему `markup`


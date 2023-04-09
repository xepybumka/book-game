# Game-books

Что это?
------
Это некоммерческий проект Михаила Благодатских, воодушевленный творчеством Дмитрия Браславского, а также серии игр
Космические Рейнджеры, Space quest и др.
Проект призван использовать привычный формат книги-игры в качестве приложения-игры, или, если угодно, текстового квеста.

Список требований:
------

- PHP 8.1
- Composer
- Symfony
- Файл базы данных с подготовленной книгой "Повелитель безбрежной пустыни"

Важное пояснение:
-------
К сожалению все мои попытки получить одобрение автора Дмитрия Браславского на использование его интеллектуальной
собственности обернулись ничем.
Ввиду того, что есть возможность попасть под статью и штраф - оригинальный файл подготовленной книги распространению не
подлежит.
У меня есть оригинал книги, который и послужил материалом для создания этого приложения.

Поддержать разработчика
-----
Хоть проект и некоммерческий, я буду рад вашей поддержке на чай/кофе со вкусняшками.
Для выражения признательности вы можете написать письмо мне на почту: xepybumka@yandex.ru
Поддержать меня можно любой суммой на карту: 5536 9138 0557 0104 (Тинькофф)

Как развернуть:
------
Чтобы приложение успешно работало необходимо установить следующие программы:
* Git
* Docker

Необходимые инструкции по скачиванию под вашу операционную систему этих программ можно найти в интернете.

Затем скачиваем проект в нужную нам папку при помощи команды <strong> git clone some_url_address</strong>

Потом выполняем команду <strong>docker-compose up -d</strong> из корневой папки проекта

Затем нам необходимо установить зависимости для работы приложения. Для этого мы попадаем в контейнер, выполняя команду <strong> docker exec -it php bash</strong>
Заходим в папку с проектом : <strong>cd app</strong> и выполняем команду <strong>composer install</strong>

Игра будет доступна по адресу http://localhost:8080/

Структура проекта:
-----
Приложение использует Symfony структуру.

Список используемых библиотек
------

- Symfony v6.2.8 
- PHPv8.1.17

- ------
Последние обновления:
------
08.04.22

Приложение разворачивается в Docker и использует фреймворк Symfony


Известные ошибки:
------

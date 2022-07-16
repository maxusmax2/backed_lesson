# Задание 1
  Был разработаны базовые страницы со статьями с функцией
  прочтения каждой статьи в отдельности. В сети статьи сохранялись в БД.
  Были добавлены конфигурационные файлы .httpaccess и robot.txt(запрещал индексировать странички-утилиты)

# Задание 2
  К базовой странице статей было была добавлена функция добавления комментариев.
  Комментарии остаются в БД и связываются со статьями.
  Функция отображения отправленного комментария была сделана с использование технологии  AJAX.

# Задание 3
## Установка nginx, php and mysql
Весь этот софт я устанавливал на OS Linux  на дистрибутив  Ubuntu 20.4
nginx я установил с помощью команды 
sudo apt install  nginx

после установил php версии 7.4 командой:
sudo apt install php

затем установил mysql-server :
sudo apt install mysql-server

и подключим mysql к php:
sudo apt install php-mysql

теперь 
Настроим конфиг nginx 
Добавим в nginx.conf строку:
include /etc/nginx/conf.d/\*.conf;;

Теперь в файлике  myconfig.conf в папке conf.d  добавим следующие строки


server {
  root /home/maxusmax/server/html;
  index index.php ,index.html;
  error_log /home/maxusmax/server/html;
  listen localhost:80;
  location  ~ \.(php)$ {
    fastcgi_pass localhost:9000;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    fastcgi_param QUERY_STRING $query_string;
    include fastcgi_params;
  }
}

Здесь мы настроили nginx на работу с fastcgi который будет выполнять наш php-скрипт 
и с которым nginx будет общаться через locahost:9000

Теперь запускаем  fastcgi двумя командами
sudo service php7.4-fpm start localhost:9000
и открываем localhost 
и видем вывод скрипта index.php

# Задание 4 и 5
Сделал вместе
Доработал отображение страницы
и Перевел  сайт на ООП не забывая про принципы 
программирования такие как SOLID 

# Задание 7
Была создана отдельная страничка,
с функцией создания массива, сортировки и поиска по нему.

# Задание 8
Была создана еще одна  отдельная страничка.
На ней  можно опробывать три хранилища cookie, sessionStorage, localStorage.
с помощью fake-api которое я нашел по первой ссылке https://jsonplaceholder.typicode.com/, 
я проверил работу хранилищей.
# Задание 9
Действуя по гайду  я установил composer
и через композер создал проект.
результат запуска измененного проекта![Снимок экрана от 2022-07-06 18-14-04](https://user-images.githubusercontent.com/79931339/177584553-a3b482e5-ba35-4d87-bfdc-b80725318b99.png)

#Задание 10 
Была изучена работа с контроллерами и посредниками
#Задание 11
1. Установил DebugBar в по гайду в презентации
2.Создал миграцию и в  методе Up создал таблицу.Выполнил миграции с помощью команды php artisan migrate
3.Создал модель и контроллер с помощью команды php artisan make:model Post -mc
4.Реализовал в контроллеры методы из задания
5.добавил csrf токен
6.добавил логер в дебагбар
7.Создал пост с повторяющимся названием и в логе выдалась ошибка
file:///home/maxusmax/%D0%98%D0%B7%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D1%8F/%D0%A1%D0%BD%D0%B8%D0%BC%D0%BE%D0%BA%20%D1%8D%D0%BA%D1%80%D0%B0%D0%BD%D0%B0%20%D0%BE%D1%82%202022-07-16%2019-33-42.png![изображение](https://user-images.githubusercontent.com/79931339/179363881-30d30b11-8dcd-4205-9e6b-bbffc7d1de67.png)




  

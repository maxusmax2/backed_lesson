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
  

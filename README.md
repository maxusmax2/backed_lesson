# backed_lesson
My_home_work_for_backend
## download nginx, php and mysql for windows 10
 ### nginx
  1. Download nginx for windows from  https://nginx.org/ru/download.html
  2. Open nginx.conf and write configuration for example
![image](https://user-images.githubusercontent.com/79931339/171197183-d89b4917-4130-4be8-bbe0-7a13b0be92a3.png)
  ### php
  1. Download php from https://windows.php.net/download
  2. rename file php.ini-production on php.ini
  3. Open php.ini and uncomment row
![image](https://user-images.githubusercontent.com/79931339/171198260-97ad467d-5556-49c1-a4a9-90e40e871e08.png)
  ### mysql
  1. Download mysql from official site oracle
##  connect nginx, php and mysql 
  1. Create index.php on nginx\html directory 

![image](https://user-images.githubusercontent.com/79931339/171199165-3ab84d21-bfe9-4aee-a30d-953cd8b3352e.png)
  2. Open cmd and write start /b nginx
                  start /b php\php-cgi.exe -b 127.0.0.1:9000 -c c:\nginx\php\php.ini
  3. Open localhost and see request

  

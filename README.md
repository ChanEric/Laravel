# Laravel

Entrez l'adresse suivant dans votre URL 127.0.0.1/todolist/index.php pour pouvoir accéder au site

Assurez vous que vous aviez composer de installé 

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

Ainsi que laravel 

apt-get install php5-mcrypt
composer create-project "laravel/laravel:4.2.*" laravel4
chown -Rc www-data.www-data todolist

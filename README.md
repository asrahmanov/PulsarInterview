<h1 style="text-align: center;color: red">PULSAR PRODUCTION</h1>

<h1 style="text-align: center;color: #6610f2">Локально</h1>  
<pre>
composer update
php artisan migrate
php artisan db:seed

npm install

npm run prod 
    или
npm run watch
</pre>




<h1 style="text-align: center;color: #6610f2">Для DOCKER</h1>  
<pre>
sudo docker-compose up -d

sudo docker exec pulsar_production_sevice_fpm composer install

cp .env.prod .env

sudo docker exec pulsar_production_sevice_fpm php artisan swagger-lume:generate

Создание баз данных

sudo cat docker/backup.sql | sudo docker exec -i pulsar_production_sevice_mysql /usr/bin/mysql -u root --password=#tWM1dKA

sudo docker exec pulsar_production_sevice_fpm php artisan migrate

sudo docker exec pulsar_production_sevice_fpm php artisan db:seed
</pre> 


Внутри vue можно использовать роуты laravel. 
Используется библиотека <b>lord/laroute</b>


<h1 style="text-align: center;color: #6610f2">IDE helper</h1> 
<pre>
php artisan ide-helper:generate
php artisan ide-helper:models
php artisan ide-helper:meta
</pre>

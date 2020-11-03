#!/bin/sh

echo 'Installing global dependencies..'
sudo apt install php7.4 zip unzip php7.4-zip php7.4-mbstring php7.4-xml php7.4-pgsql postgresql postgresql-contrib

echo 'Starting postgres..'
sudo -u postgres initdb --locale en_US.UTF-8 -D '/var/lib/postgres/data'
sudo pg_ctlcluster 12 main start
sudo service postgresql start
sudo -u postgres createdb spork_db
sudo -u postgres createuser spork
sudo -u postgres psql -c "grant all privileges on database spork_db to spork"

echo 'Installing composer..'
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

echo 'Installing composer dependencies..'
composer install

echo 'Installing npm dependencies..'
yarn install

echo 'Copied .env.example to .env'
cp .env.example .env

echo 'Running database migrations..'
php artisan migrate

echo 'Generating app key..'
php artisan key:generate

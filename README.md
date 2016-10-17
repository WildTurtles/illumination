# Illumination

A simple app for requesting visiblis api.

Visiblis is a website/api for seo. 
It aim's to provide semantic analyse on several things (url, titles, texts).

You need :
 - an account on the website (http://visiblis.com) and an AGENCE's account.  
 - a database (only postgres is support for the moment) with a .pgpass it's better.
 - a web server with php


The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

0. After git clone or download an extract a zip.
1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar install --prefer-dist --optimize-autoloader --no-interaction`.

If Composer is installed globally, run
```bash
composer install --prefer-dist --optimize-autoloader --no-interaction
```

You should now be able to visit the path to where you installed the app and see the default home page.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your setup.

You also need to edit the script/create_db.sh file and execute it.
If you are not using a system using bash shell you can execute each sql files, in the good order.
(see the script/create_db.sh for it)

Now you can add an user (http://cakedomain.dn/users/add).

When it's done remove the action from the UsersController.
line 153 : $this->Auth->allow(['logout', 'add']); ==> $this->Auth->allow(['logout']); 

Connect you with the new user go add your api in a new default configuration.
(http://cakedomain.dn/configurations/add) 
The app not support several configurations for the moment. (it take the first default one it find)
Go to http://cakedomain.dn/semantic-requests/ to start enjoy.


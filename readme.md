## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire Laravel framework can be found on the [Laravel website](http://laravel.com/docs).

Documentation for the Frozennode can be found on the [Frozennode website](http://administrator.frozennode.com/).

Documentation for Bootstrap can be found on the [Bootstrap website](http://getbootstrap.com/).

Documentation for Bootstrap Validator can be found on the [Bootstrap Validator Website](http://formvalidation.io/).

Documentation for SASS/SCSS can be found on the [SASS website](http://sass-lang.com/).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

The Frozennode framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### Resources
* Bootstrap Snippets [Bootsnipp website](http://bootsnipp.com/).
* Laracast Video Tutorials [Laracast website](https://laracasts.com/).
* Codebright PDF Book Tutorial [Link 1](http://www.blog.flds.fr/site/assets/files/1212/codebright-1.pdf) [Link 2](http://demo.assets.adyax.com/sites/default/files/asset/document/laravel-codebright-2013-06.pdf).
* [Video on Frozennode base installation](http://vimeo.com/64693369).
* [Laravel Documentation](http://laravel.com/docs/4.2)

## Pre-Installation Recommendations
* Install [nodejs](http://nodejs.org/download/).
* Install [SASS/SCSS](http://sass-lang.com/install).
* Install [MAMP](http://www.mamp.info/en/).

### Windows Installation 
While this is mostly worked on from a mac, there is the funzies of wanting to do it from Windows. So, here is one way how to set it up done on a Machine with Windows 8.1:

* Download and install [MAMP for Windows](http://www.mamp.info/en/mamp_windows.html).  As alternatives,  you can use [WAMP](http://www.wampserver.com/en/) or [XAMPP](https://www.apachefriends.org/index.html). However, this example will be using MAMP.
* Download and install [GIT for Windows](http://msysgit.github.io/).
* Download and install [GitHub for Windows](https://windows.github.com/).
* Run [GitHub for Windows](https://windows.github.com/), setup [GitHub](https://github.com/) account, and [clone repository](https://github.com/jeremykenedy/laravel_frozennode_cms.git).
* Open MAMP, setup a new URL, select the directory of the cloned repository on your local machine, and then save and restart MAMP as prompted.
* Setup database through [phpMyAdmin](http://localhost/MAMP/index.php?page=phpmyadmin&language=English) via the "Webstart" link on the MAMP homescreen.
* You may need to comment out the .htaccess file in order to not get a 403 error.
* Download and install [Composer for Windows](https://getcomposer.org/download/). During installation it will ask you where your php.exr file is locate, it is in the MAMP folder such as ```E:\MAMP\bin\php\php5.3.23```

## Installation
* Clone the Repository to your machine/server.  Private Repo (git@bitbucket.org:jeremykenedy/project_jk_laravel_cms.git).

### Create your mySQL database.
* Note: you can access mysql via command line in MAMP using the following command in terminal:
```ruby
/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -ppassword
```
* Log in to mysql via command line using the following command in terminal:
```python
mysql -u root -p;
```
* Create the database via command line using the following command in terminal once logged in to mysql:
```python
create database laranode;
```

### DEFINE WEBSITE URL:
Add the website URL in line 29 of the /app/config/app.php file.

### DEFINE DATABASE SETTINGS:
Enter your database connection settings in the /app/config/database.php file.

* [Important Note](http://stackoverflow.com/questions/19475762/setting-up-laravel-on-a-mac-php-artisan-migrate-error-no-such-file-or-directory): If you are using MAMP you need to add " 'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',  " to your 'mysql' array.
* Example 'database.php':
```php
	'mysql' => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		**'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',**
		'database'  => 'laranode',
		'username'  => 'yourusername',
		'password'  => 'yourpassword',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),
```

### SETUP COMPOSER
* Edit file permissions as needed with "chmod 755 -R <project folder>" (You may need to run as sudo or as 777 during install).
* Install [Composer](https://getcomposer.org/doc/00-intro.md): [MAC with MAMP](http://webdevtuts.co.uk/install-composer-mac-mamp/) or [LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-your-vps-running-ubuntu)
* Edit file permissions as needed with "chmod 755 -R <project folder>" (You may need to run as sudo or as 777 during install).
* Run 'composer install' from the projects root folder from terminal (You may need to run as sudo).
* Run 'composer update' from the projects root folder from terminal (You may need to run as sudo).

### MIGRATIONS AND SEEDS:
* See [Migration Documentation](http://laravel.com/docs/4.2/migrations) for creating project seeds and how to deploy them as migrations when you are ready to deploy and instance.
* Use [Artisan](http://laravel.com/docs/4.2/artisan) to migrate database updates from terminal using the following command: 'php artisan migrate:install' (You may need to run as sudo).
* Run Migration using 'php artisan migrate'.

#### Development Environment Option 1
* From terminal run 'php artisan serve' (You may need to run as sudo) to envoke instance.
* This will tell you the http address to access your project via your web browser (e.g.  '[http://localhost:8000/](http://localhost:8000/)' ).

#### Development Environment Option 2
* Install MAMP if you haven't already
* Configure Mamp the URL of your choice.
* Add file path the new URL created.
* Save and Restart MAMP.

#### Development/Production Environment Option 3
* Create and configure your Apache sites-enabled file [Apache Docs](http://httpd.apache.org/docs/current/vhosts/examples.html), [Digital Ocean Resource](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts) . 

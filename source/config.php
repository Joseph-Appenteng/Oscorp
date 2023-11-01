<?php
// In this document i'm define some constants that I want to use trough this whole project

/*Display all errors*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// my default host
define('PROJECT_ROOT', '/var/www/html/');
define('SOURCE_PATH', PROJECT_ROOT. 'source/');
define('VIEWS_PATH', SOURCE_PATH . 'views/');

define('SITE_URL', 'http://localhost:8080/');
define('IMAGE_URL', SITE_URL. 'img/');

// database connection settings
define('MYSQL_HOST', 'mariadb');
define('MYSQL_DATABASE', 'Sgds');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '4dy5qwtrsag#!sad');
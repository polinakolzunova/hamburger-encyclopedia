<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:36
 */

// корневая директория сайта
define("SITE_DIR", $_SERVER['DOCUMENT_ROOT'] . '/');
// корневая директория прокта
define("PROJECT_PATH", SITE_DIR);
// url адрес сайта
define("SITE_URL", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

// запуск приложения
require PROJECT_PATH . '/vendor/zmp/App.php';
App::start();
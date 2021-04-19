<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:36
 */

// корневая директория прокта в файловой системе
define("PROJECT_PATH", $_SERVER['DOCUMENT_ROOT'] . '/');
// url адрес сайта
define("SITE_URL", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

// запуск приложения
require PROJECT_PATH . '/vendor/zmp/App.php';
App::start();
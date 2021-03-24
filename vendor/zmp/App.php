<?php
/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 15:36
 */

use zmp\Loader;
use zmp\Router;

/**
 * Этот общий класс был создан ради
 * хранения конфигурации и глобального доступа к ней
 */
class App
{
    static $config;

    static function start(){

        require PROJECT_PATH . '/vendor/zmp/Loader.php';
        $loader = new Loader();
        spl_autoload_register([$loader, 'loadClass']);

        App::$config = require_once PROJECT_PATH . '/app/config/config.php';

        session_start();

        $router = new Router();
        $router->start();

    }

    static function array_debug($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

}
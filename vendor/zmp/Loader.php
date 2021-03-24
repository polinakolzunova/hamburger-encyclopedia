<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:45
 */

namespace zmp;

/**
 * Class Loader
 * Автозагрузчик классов
 * @package zmp
 */
class Loader
{
    public function loadClass($class)
    {
        // преобразуем строку в массив
        $path = explode('\\', $class);

        // определяем папку, которой соответствует префикс простанства имен
        $prefix = array_shift($path);
        switch ($prefix) {
            case 'app':
                $file_prefix = 'app/';
                break;
            case 'zmp':
                $file_prefix = 'vendor/zmp/';
                break;
            default:
                $file_prefix = '';
                break;
        }

        // собираем путь до файла класса
        $file_path = SITE_DIR . '/';
        $file_path .= $file_prefix;
        $file_path .= implode('/', $path);
        $file_path .= '.php';

        // подключаем
        if (is_file($file_path)) {
            require_once $file_path;
        }
    }
}
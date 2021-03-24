<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:47
 */

namespace zmp;

/**
 * Реализация представления
 * Отрисовывает страницу (без layout)
 * @package zmp
 */
class View
{

    public function render($controller, $view, $attr) {
        $view_file = SITE_DIR . '/app/views/' . $controller . '/' . $view . '.php';
        if ($attr !== null) {
            extract($attr);
            $attr = null;
        }

        if (is_file($view_file)) {
            require_once $view_file;
            die;
        }
    }
}
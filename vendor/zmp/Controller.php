<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:45
 */

namespace zmp;

/**
 * реализация контроллера
 */
class Controller
{
    /**
     * название класса
     */
    protected $called_class;

    /**
     * извлечение название класса из его имени
     */
    public function __construct()
    {
        $path = get_class($this);
        $this->called_class = str_replace('controller', '', substr(strrchr(strtolower($path), "\\"), 1));
    }

    /**
     * отрисовка вида
     */
    public function render($view, $attr = [] )
    {
        try {
            (new View)->render($this->called_class, $view, $attr);
        } catch(\Exception $exept){
            echo 'Выброшено исключение: ', $exept->getMessage(), "\n";
        }
    }

    /**
     * перенаправление
     * @param $path - /path-to/action
     */
    public function redirect($path)
    {
        header('Location: ' . SITE_URL . $path);
        exit;
    }

    /**
     * перенаправление на домашнюю страницу
     */
    public function gohome()
    {
        $this->redirect("/");
    }
}
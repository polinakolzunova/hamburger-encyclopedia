<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

/**
 * Файл конфигурации для сайта
 * @return array Массив настроек
 */

return $config = [
    /**
     * данные для подключения к бд
     */
    'db' => [
        'host' => 'localhost',
        'dbname' => 'hamburger_encyclopedy',
        'username' => 'hamburger_encyclopedy',
        'password' => '1234',
    ],

    /**
     * маршруты приложения
     */
    'routing' => [
        '/' => ['Main', 'index'],
        '/contacts' => ['Main', 'contacts'],

        '/burger/rate' => ['Burger', 'rate'],
        '/burger/random' => ['Burger', 'random'],
        '/burger/edit' => ['Burger', 'edit'],
        '/burger/delete' => ['Burger', 'delete'],
        '/burger/insert' => ['Burger', 'insert'],
        '/burger' => ['Burger', 'item'],
        '/catalog' => ['Burger', 'index'],

        '/articles' => ['Article', 'index'],
        '/article' => ['Article', 'item'],
    ],
];
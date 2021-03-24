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

        '/catalog' => ['Burger', 'index'],
        '/burger' => ['Burger', 'item'],
        '/random-burger' => ['Burger', 'random'],
        '/burgerf' => ['Burger', 'item_from_file'],
        '/random-burgerf' => ['Burger', 'random_from_file'],

        '/articles' => ['Article', 'index'],
        '/article' => ['Article', 'item'],
    ],
];
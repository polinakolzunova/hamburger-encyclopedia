<?php
/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 14:19
 */

namespace app\controllers;

use zmp\Controller;
use zmp\DB;
use zmp\View;

class AppController extends Controller {

	/**
	 * авторизация
	 */

	protected $user;

	public function beforeAction() {

	}

	/**
	 * отрисовка вида с отображением данных из бд
	 */
	protected function loadSiteData() {
		$siteData = (DB::getConnection())->query('SELECT * FROM sitedata');
		$result   = ["user" => $this->user];

		foreach ($siteData as $item) {
			// ключ => значение
			if (empty($item["value2"])) {

				// элемент с таким ключом существует, хранит массив одиночных значение
				// -> добавляем в этот массив очередное одиночное значение
				if (isset($result[$item["name"]]) and is_array($result[$item["name"]])) {
					$result[$item["name"]][] = $item["value1"];
				}

				// элемент с таким ключом существует, хранит одиночное значение
				// -> преобразуем в массив одиночных значений
				else if (isset($result[$item["name"]])) {
					$result[$item["name"]] = [$result[$item["name"]], $item["value1"]];
				}

				// элемента с таким ключом не существует
				// -> создаем элемент, хранящий одиночное значение
				else {
					$result[$item["name"]] = $item["value1"];
				}
			}
			// ключ => [значение1, значение 2]
			else {

				// элемент с таким ключом существует, хранит массив из 2х значений
				// -> преобразуем в массив массивов
				if (isset($result[$item["name"]]) and !is_array($result[$item["name"]][0])) {
					$result[$item["name"]] = [$result[$item["name"]], [$item["value1"], $item["value2"]]];
				}

				// элемент с таким ключом существует, хранит массив массивов
				// -> добавляем в этот массив очередной массив
				else if (isset($result[$item["name"]]) and is_array($result[$item["name"]][0])) {
					$result[$item["name"]][] = [$item["value1"], $item["value2"]];
				}

				// элемента с таким ключом не существует
				// -> создаем элемент, хранящий массив из 2х значений
				else {
					$result[$item["name"]] = [$item["value1"], $item["value2"]];
				}
			}
		}

		return $result;
	}

	public function render($view, $attr = []) {
		try {
			(new View)->render(
				$this->called_class,
				$view,
				array_merge($attr, $this->loadSiteData())
			);
		} catch (\Exception $exept) {
			echo 'Выброшено исключение: ', $exept->getMessage(), "\n";
		}
	}
}
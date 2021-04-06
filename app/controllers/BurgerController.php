<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

namespace app\controllers;

use app\dao\BurgerDao;
use app\dao\CountryDao;

class BurgerController extends AppController {

	public function index() {
		$sort = null;
		if (isset($_GET["sort_by"]) and isset($_GET["sort_dir"])) {
			$sort = "b." . $_GET["sort_by"] . " " . $_GET["sort_dir"];

		}

		$where = null;
		if (isset($_POST)) {
			$conditions = [];
			if (!empty($_POST["name"])) {
				$conditions[] = "b.name LIKE '%" . $_POST["name"] . "%'";
			}
			if (!empty($_POST["text"])) {
				$conditions[] = "b.text LIKE '%" . $_POST["text"] . "%'";
			}
			if (!empty($_POST["country"])) {
				$conditions[] = "b.country_id=" . $_POST["country"];
			}
			if (count($conditions) > 0) {
				$where = $conditions[0];
				for ($i = 1; $i < count($conditions); $i++) {
					$where .= " AND " . $conditions[$i];
				}
			}
		}

		$burgers   = BurgerDao::getList($where, null, $sort);
		if (isset($burgers["id"])) {
			$burgers = [0 => $burgers];
		}

		$this->render('index', [
			"burgers"   => $burgers,
			"countries" => CountryDao::getList()
		]);
	}

	public function item() {
		$id = $_GET["id"];
		if (!empty($id) and $id >= 0) {
			$burger = BurgerDao::getById($id);

			//\App::array_debug($burger); exit();

			$this->render('item', [
				"burger" => $burger
			]);
		} else {
			$_SESSION['flesh-error'] = "Бургера с таким id не существует";
			$this->gohome();
		}
	}

	public function random() {
		$burger = BurgerDao::getRandom();

		$this->render('item', [
			"burger" => $burger
		]);
	}

	public function rate() {
		$id   = $_GET["id"];
		$rate = $_POST['rate'];

		if (!empty($id) and $id >= 0 and !empty($rate)) {
			BurgerDao::rate($id, $rate);
		} else {
			$_SESSION['flesh-error'] = "Бургера с таким id не существует";
		}

		$this->redirect("/burger?id=" . $id);
	}
}
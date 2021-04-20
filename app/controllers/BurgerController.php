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
use app\models\User;

class BurgerController extends AppController {

	protected $security_config = [
		"rate"  => [
			"is_auth" => true,
		],
		"edit" => [
			"is_auth" => true,
			"for_roles" => ["ADMIN"]
		],
		"insert" => [
			"is_auth" => true,
			"for_roles" => ["ADMIN"]
		],
		"delete" => [
			"is_auth" => true,
			"for_roles" => ["ADMIN"]
		]
	];

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

		$burgers = BurgerDao::getList($where, null, $sort);
		if (isset($burgers["id"])) {
			$burgers = [0 => $burgers];
		}

		$this->render('index', [
			"burgers"    => $burgers,
			"countries"  => CountryDao::getList(),
			"admin_menu" => [
				"Добавить" => "/burger/insert"
			]
		]);
	}

	public function item() {
		$id = $_GET["id"];
		if (!empty($id) and $id >= 0) {
			$burger = BurgerDao::getById($id);

			if (!empty($burger)) {
				$this->render('item', [
					"burger"     => $burger,
					"admin_menu" => [
						"Добавить"      => "/burger/insert",
						"Редактировать" => "/burger/edit?id=$id",
						"Удалить"       => "/burger/delete?id=$id",
					]
				]);
			}
		}

		$this->error(404);
	}

	public function random() {
		$burger = BurgerDao::getRandom();

		$this->render('item', [
			"burger"     => $burger,
			"admin_menu" => [
				"Добавить"      => "/burger/insert",
				"Редактировать" => "/burger/edit?id={$burger['id']}",
				"Удалить"       => "/burger/delete?id={$burger['id']}",
			]
		]);
	}

	public function rate() {
		$id   = $_GET["id"];
		$rate = $_POST['rate'];

		if (!empty($id) and $id >= 0 and !empty($rate)) {
			BurgerDao::rate($id, $rate);
		} else {
			$this->error(404);
		}

		$this->redirect("/burger?id=" . $id);
	}

	public function edit() {
		if (!empty($_POST)) {
			$this->editPOST();
		} else {
			$this->editGET();
		}
	}

	private function editGET() {
		if (!empty($_GET["id"]) and $_GET["id"] >= 0) {
			$this->render('edit', [
				"burger"    => BurgerDao::getById($_GET["id"]),
				"countries" => CountryDao::getList()
			]);
		} else {
			$this->error(404);
		}
	}

	private function editPOST() {
		$image = null;

		if (!empty($_FILES['image_file']) and $_FILES['image_file']['size'] > 0) {
			$image = BurgerDao::loadImageFile($_FILES['image_file']);
		}

		$item = [
			"id"          => $_GET['id'],
			"name"        => $_POST['name'],
			"text"        => $_POST['text'],
			"ingredients" => $_POST['ingredients'],
			"country_id"  => $_POST['country_id'],
			"image"       => $image
		];

		BurgerDao::update($item);
		$this->redirect("/burger?id=" . $_GET['id']);
	}

	public function insert() {
		if (!empty($_POST)) {
			$this->insertPOST();
		} else {
			$this->insertGET();
		}
	}

	private function insertGET() {
		$this->render('insert', [
			"countries" => CountryDao::getList()
		]);
	}

	private function insertPOST() {
		$image = null;
		if (!empty($_FILES['image_file'])) {
			$image = BurgerDao::loadImageFile($_FILES['image_file']);
		}

		$item = [
			"name"        => $_POST['name'],
			"text"        => $_POST['text'],
			"ingredients" => $_POST['ingredients'],
			"country_id"  => $_POST['country_id'],
			"image"       => $image
		];

		BurgerDao::insert($item);
		$this->redirect("/catalog");
	}

	public function delete() {
		$id = $_GET["id"];
		if (!empty($id) and $id >= 0) {
			BurgerDao::deleteById($id);
		} else {
			$this->error(404);
		}
		$this->redirect("/catalog");
	}
}
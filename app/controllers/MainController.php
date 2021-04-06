<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

namespace app\controllers;

use app\dao\BurgerDao;

class MainController extends AppController {

	public function index() {
		$burgers = BurgerDao::getList("", 4);
		$this->render('index', [
			"burgers" => $burgers
		]);
	}

	public function contacts() {
		$this->render('contacts');
	}

	/*public function create()
	{
		if (isset($_POST['city-title'])) {
			$db = DB::getConnection();
			$title = mysqli_real_escape_string($db->mysqli, trim($_POST['city-title']));

			if ( !preg_match('/^[А-Яа-яЁёa-zA-Z\-\s]{3,255}$/ui', $title)) {
				$_SESSION['flesh-error'] = "Название города должно содержать только буквы, пробелы и знак тире";
				$this->gohome();
			}

			if ($db->query("INSERT INTO city(id,title) VALUES(NULL,?)", [$title], true)) {
				$_SESSION['flesh-success'] = "Город успешно добавлен";
			}
		}
		$this->gohome();
	}*/
}
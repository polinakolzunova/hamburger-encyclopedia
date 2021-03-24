<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

namespace app\controllers;

use \App;
use zmp\Controller;
use zmp\DB;

class MainController extends Controller
{

    public function index() {
        //$result = (DB::getConnection())->query('SELECT * FROM city');
        $this->render('index');
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
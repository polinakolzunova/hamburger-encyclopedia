<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

namespace app\controllers;

use \App;
use zmp\DB;

class ArticleController extends AppController
{

	public function index() {
		$this->render('index');
	}

	public function item() {
		$this->render('item');
	}
}
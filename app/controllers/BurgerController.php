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

class BurgerController extends Controller {

	public function index() {
		$this->render( 'index' );
	}

	public function item_from_file() {
		if ( !empty( $_GET["id"] ) and $_GET["id"] >= 1 ) {
			$this->render( 'data/' . $_GET["id"]);
		} else {
			$this->render( 'item');
		}
	}

	public function random_from_file() {
		$index = random_int(1, 6);
		$this->render( 'data/' . $index);
	}

	public function item() {
		if ( !empty( $_GET["id"] ) and $_GET["id"] >= 1 ) {
			$this->render( 'data/' . $_GET["id"]);
		} else {
			$this->render( 'item');
		}
	}

	public function random() {
		$index = random_int(1, 6);
		$this->render( 'data/' . $index);
	}
}
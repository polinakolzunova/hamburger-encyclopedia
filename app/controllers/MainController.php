<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:42
 */

namespace app\controllers;

use app\dao\BurgerDao;
use app\dao\MailDao;
use app\dao\UserDao;
use app\models\User;

class MainController extends AppController {

	protected $security_config = [
		"login" => [
			"is_auth" => false
		],
		"logout" => [
			"is_auth" => true
		]
	];

	public function index() {
		$burgers = BurgerDao::getList("", 4);
		$this->render('index', [
			"burgers" => $burgers
		]);
	}

	public function contacts() {
		if (!empty($_POST)) {
			$this->contactsPOST();
		} else {
			$this->contactsGET();
		}
	}

	private function contactsGET() {
		$this->render('contacts');
	}

	private function contactsPOST() {
		$item = [
			"name"  => $_POST['name'],
			"email" => $_POST['email'],
			"text"  => $_POST['text'],
		];
		MailDao::insert($item);
		$_SESSION['flesh-success'] = "Ваше письмо успешно отправлено!";

		$this->redirect("/contacts");
	}

	public function login() {
		if (!empty($_POST)) {
			$login    = $_POST["login"];
			$password = $_POST["password"];

			UserDao::login($login, $password);
			$this->redirect("/");
		} else {
			$this->redirect("/404");
		}
	}

	public function logout() {
		UserDao::logout($this->user);
		$this->redirect("/");
	}
}
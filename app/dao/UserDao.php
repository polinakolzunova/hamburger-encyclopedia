<?php

namespace app\dao;

use zmp\DB;
use app\models\User;

/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 17:32
 */
class UserDao {

	/**
	 * @param $username
	 *
	 * @return User|null
	 * @throws \Exception
	 */
	public static function getByUsername($username) {
		return self::getUserBy("username", $username);
	}

	public static function getByToken($token) {
		return self::getUserBy("token", $token);
	}

	private static function getUserBy($key, $value){
		$resultUser = null;
		$resultRoles = [];
		$query      = "SELECT * FROM users WHERE {$key}=?";
		$user       = (DB::getConnection())->query($query, [$value]);
		$query      = "SELECT r.name FROM users_roles AS ur LEFT JOIN roles AS r ON r.id = ur.role_id WHERE ur.user_id=?";
		$roles      = (DB::getConnection())->query($query, [$user['id']]);

		if (isset($roles['name'])){
			$resultRoles[0] = $roles['name'];
		} else {
			foreach ($roles as $index => $role) {
				$resultRoles[$index] = $role['name'];
			}
		}

		if ($user['id'] > 0) {
			$resultUser = new User();
			$resultUser->setId($user['id']);
			$resultUser->setLogin($user['username']);
			$resultUser->setHashPassword($user['password']);
			$resultUser->setRoles($resultRoles);
		}

		return $resultUser;
	}

	/**
	 * @param User $user
	 *
	 * @return User
	 */
	public static function save($user) {
		if ($user->getId() > 0) {
			$user = self::update($user);
		} else {
			$user = self::insert($user);
		}

		return $user;
	}

	public static function login($login, $password) {
		$user = UserDao::getByUsername($login);

		if ($user != null and $user->checkPassword($password)) {
			$user->setToken();
			self::save($user);
			$_SESSION['auth_token'] = $user->getToken();
			setcookie('auth_token', $user->getToken(), time() + 60 * 60 * 24 * 30);

			$_SESSION['flesh-success'] = "Успешная аутентификация!";
		} else {
			$_SESSION['flesh-error'] = "Неверный логин или пароль";
		}
	}

	/**
	 * @param User $user
	 *
	 */
	public static function logout($user) {
		$user->resetToken();
		self::save($user);
		$_SESSION['auth_token'] = "";
		unset($_COOKIE['auth_token']);
	}

	/**
	 * @param User $user
	 *
	 * @return User
	 */
	private static function insert($user) {
		$id = (DB::getConnection())->query("INSERT INTO users(id, username, password, token) VALUES (NULL, ?, ?, '')",
			[$user->getLogin(), $user->getHashPassword()], true);
		$user->setId($id);

		return $user;
	}

	/**
	 * @param User $user
	 *
	 * @return User
	 */
	private static function update($user) {
		(DB::getConnection())->query("UPDATE users SET username=?, password=?, token=? WHERE id=?",
			[$user->getLogin(), $user->getHashPassword(), $user->getToken(), $user->getId()]);

		return $user;
	}

}
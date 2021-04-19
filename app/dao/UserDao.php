<?php

namespace app\dao;

use zmp\DB;

/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 17:32
 */
class UserDao {

	public static function getByUsername($username) {
		$query = "SELECT * FROM users WHERE username='$username'";
		$user  = (DB::getConnection())->query($query);
		$query = "SELECT * FROM users_roles WHERE user_id=" . $user['id'];

		return $user;
	}

	public static function insert($item) {
		$query = "INSERT INTO mails(name, email, text) VALUES ('" . $item['name'] .
		         "', '" . $item['email'] .
		         "', '" . $item['text'] . "')";

		(DB::getConnection())->query($query);
	}

}
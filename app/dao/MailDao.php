<?php

namespace app\dao;

use zmp\DB;

/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 17:32
 */
class MailDao {

	public static function getList() {
		$query = "SELECT * FROM mails";

		return (DB::getConnection())->query($query);
	}

	public static function insert($item) {
		$query = "INSERT INTO mails(name, email, text) VALUES ('" . $item['name'] .
		         "', '" . $item['email'] .
		         "', '" . $item['text'] . "')";

		(DB::getConnection())->query($query);
	}

}
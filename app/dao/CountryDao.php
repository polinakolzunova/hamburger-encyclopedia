<?php

namespace app\dao;

use zmp\DB;

/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 17:32
 */
class CountryDao {

	public static function getList() {
		$sql = "SELECT * FROM countries";

		return (DB::getConnection())->query($sql);
	}

}
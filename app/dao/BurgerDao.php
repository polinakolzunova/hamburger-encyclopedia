<?php

namespace app\dao;

use zmp\DB;

/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 24.03.2021
 * Time: 17:32
 */
class BurgerDao {

	public static function getList($where = null, $limit = null, $order_by = null) {
		$select = "SELECT b.id, b.name, b.text, b.image, b.ingredients, b.rate_count, b.rate_amount, c.name AS country FROM burgers AS b";
		$join   = " INNER JOIN countries AS c ON b.country_id = c.id";

		if (!empty($where)) {
			$where = " WHERE " . $where;
		}
		if (!empty($order_by)) {
			$order_by = " ORDER BY " . $order_by;
		}
		if (!empty($limit)) {
			$limit = " LIMIT " . $limit;
		}

		$sql = $select . $join . $where . $order_by . $limit;

		return (DB::getConnection())->query($sql);
	}

	public static function getRandom() {
		$result = (DB::getConnection())->query("SELECT id FROM burgers ORDER BY RAND() LIMIT 1");

		return self::getById($result["id"]);
	}

	public static function getById($id) {
		$id = ($id >= 0) ? $id : 0;

		return self::getList("b.id = " . $id, 1);
	}

	public static function rate($id, $rate) {
		$query = "UPDATE burgers SET rate_count=rate_count+1, rate_amount=rate_amount+" . $rate . " WHERE id=" . $id;
		(DB::getConnection())->query($query);
	}

}
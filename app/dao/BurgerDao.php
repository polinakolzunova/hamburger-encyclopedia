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

	public static function update($item) {
		(DB::getConnection())->query("UPDATE burgers SET name=?, text=?, ingredients=?, country_id=? WHERE id=?",
			[$item['name'], $item['text'], $item['ingredients'], $item['country_id'], $item['id']]);

		if (!empty($item['image'])) {
			(DB::getConnection())->query("UPDATE burgers SET image=? WHERE id=?",
				[$item['image'], $item['id']]);
		}
	}

	public static function insert($item) {
		$image = null;
		if (!empty($item['image'])) {
			$image = ", image='" . $item['image'] . "'";
		}

		$update = "INSERT INTO burgers SET name='" . $item['name'] . "'" .
		          ", text='" . $item['text'] . "'" .
		          ", ingredients='" . $item['ingredients'] . "'" .
		          ", country_id=" . $item['country_id'];
		$query  = $update . $image;

		(DB::getConnection())->query($query);
	}

	public static function deleteById($id) {
		$burger = self::getById($id);
		if (!empty($burger['image'])) {
			$frompath = PROJECT_PATH . "web" . $burger['image'];
			$topath   = PROJECT_PATH . "web/data/to-remove/" . end(explode("/", $burger['image']));
			//echo $frompath; echo "<br>"; echo $topath; exit;
			rename($frompath, $topath);
		}

		$query = "DELETE FROM burgers WHERE id=" . $id;
		(DB::getConnection())->query($query);
	}

	public static function loadImageFile($image_file): string {
		$fileTmpPath   = $image_file['tmp_name'];
		$fileName      = $image_file['name'];
		$fileNameCmps  = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));
		$newFileName   = md5(time() . $fileName) . '.' . $fileExtension;
		$uploadFileDir = PROJECT_PATH . '/web/data/burgers/';
		$dest_path     = $uploadFileDir . $newFileName;
		move_uploaded_file($fileTmpPath, $dest_path);

		return "/data/burgers/" . $newFileName;
	}

}
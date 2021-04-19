<?php

namespace app\models;
/** * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 19.04.2021
 * Time: 19:01
 */
class User {
	private $id;
	private $login;
	private $hash_password;

	private $token;

	private $roles;

	/**
	 * User constructor.
	 */
	public function __construct() {
		$this->id = 0;
		$this->login = "";
		$this->hash_password = "";
		$this->token = "";
		$this->roles = [];
	}

	/**
	 * @return mixed
	 */
	public function getRoles() {
		return $this->roles;
	}

	/**
	 * @param mixed $roles
	 */
	public function setRoles($roles): void {
		$this->roles = $roles;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @param mixed $login
	 */
	public function setLogin($login): void {
		$this->login = $login;
	}

	/**
	 * @return mixed
	 */
	public function getHashPassword() {
		return $this->hash_password;
	}

	/**
	 * @param mixed $hash_password
	 */
	public function setHashPassword($hash_password): void {
		$this->hash_password = $hash_password;
	}

	/**
	 * @param mixed $hash_password
	 */
	public function setPassword($hash_password): void {
		$this->hash_password = md5($hash_password);
	}

	/**
	 * @return mixed
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param mixed $token
	 */
	public function setToken(): void {
		$this->token = bin2hex(openssl_random_pseudo_bytes(16));
	}

	/**
	 *
	 */
	public function resetToken(): void {
		$this->token = "";
	}

	/**
	 * @param $password
	 *
	 * @return bool
	 */
	public function checkPassword($password) {
		return md5($password) == $this->hash_password;
	}

	public function toString() {
		$roles = implode(" ", $this->roles);

		return "User {id=$this->id, login=$this->login, hash=$this->hash_password, token=$this->token} with roles {{$roles}}";

	}

	public function isAuth(){
		return ($this->id > 0);
	}

	public function hasRole($role){
		return in_array($role, $this->roles);
	}
}
<?php

/**
** Класс конфигурации базы данных
*/
class DB{

	public static function connToDB() {

		$user = USER;
		$pass = PASS;
		$host = HOST;
		$db   = DB;

		$conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
		return $conn;

	}
}
<?php

class Connection {

	public static function connect() {
		$dbuser = 'root';
		$dbpass = '';
		$server = 'localhost';
		$dbname = 'family_tree';

		$link = mysql_connect($server, $dbuser, $dbpass, $dbname);
		mysql_query("SET NAMES 'UTF-8'");
		mysql_query("use $dbname");
		return $link;
	}

	public static function query($str) {
		global $link;
		return mysql_query($str);
	}

	public static function add($str) {
		$result = Connection::query($str);

		if ($result) {
			return mysql_insert_id();
		} else {
			return false;
		}
	}

	public static function generateInsertQuery($table, $array) {
		$query = "INSERT INTO " . $table;
		$fields = "";
		$values = "";

		foreach ($array as $key => $value) {
			$fields .= $key . ", ";
			$values .= "'" . $value . "', ";
		}

		$fields = substr($fields, 0, -2);
		$values = substr($values, 0, -2);

		$query .= " (" . $fields . ")";
		$query .= " VALUES (" . $values . ")";

		return $query;
	}
}
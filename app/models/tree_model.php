<?php
class tree_model extends model {
	public static function getMembers() {
		$members = Connection::query("SELECT * FROM members");
		$response = array();

		if ($members) {
			while ($item = mysql_fetch_array($members)) {
				$response[] = $item;
			}
		}

		return $response;
	}

	public static function addMember($array) {
		return Connection::add(Connection::generateInsertQuery("members", $array));
	}
}
?>
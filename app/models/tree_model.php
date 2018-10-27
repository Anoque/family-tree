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

	public static function addMember($data) {
		return Connection::add(Connection::getInsertQuery("members", $data));
	}

	public static function updateMember($data, $id) {
		return Connection::update("members", $data, $id);
	}

	public static function getMember($id) {
		return mysql_fetch_array(Connection::query("SELECT * FROM members WHERE id = " . $id));
	}

	public static function deleteMember($id) {
		return Connection::delete("members", $id);
	}
}
?>
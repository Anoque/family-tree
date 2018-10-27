<?php
class tree_controller extends controller {
	public function __construct() {
		$this->view = new view();
		$this->model = new tree_model();
	}

	public function action_index($id = '') {
		action_get();
	}

	public function action_get() {
		$data['title'] = "Family tree";

		$members = $this->model->getMembers();

		if (count($members) == 0) {
			$members['error'] = 1;
		}

		echo json_encode($members);
	}

	public function action_add() {
		$data['title'] = "Add member";
		$data['members'] = $this->model->getMembers();

		if (isset($_POST['name'])) {
			$values = array();
			$values['name'] = $_POST['name'];
			$values['parent_id'] = $_POST['parent_id'];

			$id = $this->model->addMember($values);
			$data['success'] = is_numeric($id);
		}

		$this->view->generate('tree_add_view.php', "template_view.php", $data);
	}
}
?>
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

	public function action_add($id = '') {
		$data['members'] = $this->model->getMembers();

		if ($id != '') {
			$member = $this->model->getMember($id);
			$data['title'] = "Edit member";
			$data['id'] = $member['id'];
			$data['name'] = $member['name'];
			$data['parent_id'] = $member['parent_id'];
		} else {
			$data['title'] = "Add member";
			$data['id'] = 0;
		}

		echo $id;

		if (isset($_POST['id'])) {
			$values = array();
			$values['name'] = $_POST['name'];
			$values['parent_id'] = $_POST['parent_id'];

			if ($_POST['id'] == 0) {
				$id = $this->model->addMember($values);
				$data['success'] = is_numeric($id);
			} else {
				$data['success'] = $this->model->updateMember($values, $_POST['id']);
			}
			
		}

		$this->view->generate('tree_add_view.php', "template_view.php", $data);
	}

	public function action_list() {
		$data['title'] = "Member list";
		$data['members'] = $this->model->getMembers();

		$this->view->generate('tree_list_view.php', "template_view.php", $data);
	}

	public function action_delete($id) {
		$data['title'] = 'Delete member status';
		$data['delete'] = $this->model->deleteMember($id);

		$this->view->generate('tree_list_view.php', "template_view.php", $data);
	}
}
?>
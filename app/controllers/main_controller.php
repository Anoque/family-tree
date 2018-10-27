<?php
class main_controller extends controller{

	private $limit = 10;

	public function __construct() {
		$this->view = new view();
		$this->model = new main_model();
	}

	public function action_index() {
		$data['title'] = "Family tree";

		$this->view->generate('main_view.php', "template_view.php", $data);
	}
}
?>
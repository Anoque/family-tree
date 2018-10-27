<?php
Class controller{

	public $view;
	public $model;
	public $data=['title'=>''];
	
	public function __construct(){
		$this->view = new view();
		$this->model = new model();
	}
	
	public function action_index(){
		
	}

	public function debug($str) {
		file_put_contents("debug.txt", strval($str) . "\n", FILE_APPEND);
	}	
}
?>
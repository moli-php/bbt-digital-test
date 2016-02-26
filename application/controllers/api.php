<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {


	protected $data;

	public function __construct() {
		parent::__construct();
		parse_str(file_get_contents('php://input'), $this->data);
	}
	

	public function add() {

		switch($this->data['action']) {
			case 'company' :
				unset($this->data['action']);
				$result = $this->model->addCompany($this->data);
			break;

			case 'employee' :
				unset($this->data['action']);
				$result = $this->model->addEmployee($this->data);

		}

		echo json_encode(array('response' => $result));
		
	}

	public function update($id = NULL) {

		unset($this->data['action']);
		$result = $this->model->updateEmployee($id, $this->data);

		echo json_encode(array('response' => $result));
	}
}
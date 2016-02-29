<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends MY_Controller {

	protected $data;
	
	/*
	* Initialize variables
	*/
	public function __construct() {
		parent::__construct();
		$this->data = new stdClass();
		$this->data->content =  $this->uri->segment(1, strtolower(__CLASS__));
		$title = $this->uri->segment(2) ? ' | ' . $this->uri->segment(2) : '';
		$this->data->title = ucfirst($this->data->content) . $title;
		$this->data->company_id = $this->uri->segment(2, NULL);
		$this->data->employee_id = $this->uri->segment(3, NULL);

	}

	/*
	* Display Employees or update employee
	*/
	public function index()
	{
		$this->data->employees = $this->model->getEmployeesCompany($this->data->company_id);
		if(!$this->data->employee_id){
			$this->load->view('body',$this->data);
		}else{
			$this->data->company = $this->model->getCompany();
			$this->data->employee = $this->model->getEmployees($this->data->employee_id);
			$this->load->view('form',$this->data);
		}
		
	}
	
}
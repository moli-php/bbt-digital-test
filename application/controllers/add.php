<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends MY_Controller {

	protected $data;

	/*
	* Initialize variables
	*/
	public function __construct() {
		parent::__construct();
		$this->data = new stdClass();
		$this->data->content =  $this->uri->segment(2, 'company');
		$title = $this->uri->segment(2) ? ' | ' . $this->uri->segment(2) : '';
		$this->data->title = ucfirst($this->data->content) . $title;
		$this->data->id = $this->uri->segment(2, NULL);

	}

	/*
	* Compnay form view
	*/
	public function company()
	{
		$this->load->view('form', $this->data);
	}

	/*
	* Employee form view
	*/
	public function employees()
	{
		$this->data->company = $this->model->getCompany();
		$this->load->view('form', $this->data);
	}

	
}


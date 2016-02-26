<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends MY_Controller {

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
		$this->data->id = $this->uri->segment(2, NULL);

	}

	/*
	* Display Company
	*/
	public function index()
	{
		$this->data->company = $this->model->getCompany($this->data->id);
		$this->load->view('body',$this->data);
	}




	
}


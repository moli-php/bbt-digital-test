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
	public function company($param = NULL)
	{
		if($param){
			$this->_error_404();
		}else{
			$this->load->view('form', $this->data);
		}
		
	}

	/*
	* Employee form view
	*/
	public function employees($param = NULL)
	{
		if($param){
			$this->_error_404();
		}else{
			$this->data->company = $this->model->getCompany();
			$this->load->view('form', $this->data);
		}
		
	}


	private function _error_404() {
		set_status_header(404);
		$this->data->title = 'Erorr 404';
		$this->data->heading = '404 Page Not Found';
		$this->data->message = 'The page you requested was not found.';
		$this->load->view('header',$this->data);
		$this->load->view('errors/error_404',$this->data);
		$this->load->view('footer');
	}

	
}


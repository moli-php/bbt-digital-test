<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends MY_Controller {

	protected $data;


	public function __construct() {
		parent::__construct();
		$this->data = new stdClass();
	}

	public function error_404() {
		set_status_header(404);
		$this->data->title = 'Erorr 404';
		$this->data->heading = '404 Page Not Found';
		$this->data->message = 'The page you requested was not found.';
		$this->load->view('header',$this->data);
		$this->load->view('errors/error_404',$this->data);
		$this->load->view('footer');
	}

}

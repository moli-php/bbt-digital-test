<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->model('model');
		$this->load->library('uri');
		$this->load->helper('url');



	}
}
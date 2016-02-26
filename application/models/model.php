<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public function __construct() {

		$this->load->database();
		// disabled db debug
		$this->db->db_debug = FALSE;
	}
	
	public function getCompany($id = NULL) {
		if($id){
			$this->db->where('id',$id);
			return $this->db->get('company')->row();
		}
		return $this->db->get('company')->result();
	}

	public function addCompany($data) {
		
		$this->db->insert('company',$data);
		// check of duplicate company name
		if($this->db->_error_number() == '1062'){
			return 0;
		}
		
		return $this->db->affected_rows();
	}


	public function getEmployees($id = NULL) {
		if($id){
			$this->db->where('id',$id);
			return $this->db->get('employees')->row();
		}
		return $this->db->get('employees')->result();
	}

	public function getEmployeesCompany($id = NULL) {
		$sql = "select a.*, b.company from employees a ";
		$sql .= "left join company b on b.id = a.company_id";
		if($id){
			$sql .= " where a.company_id = ". $id;
		}
		return $this->db->query($sql)->result();

	}

	public function addEmployee($data) {

		$this->db->insert('employees',$data);
		return $this->db->affected_rows();
	}

	public function updateEmployee($id, $data) {
		$data['date'] = date('Y-m-d H:i:s');
		$this->db->where('id',$id);
		$this->db->update('employees',$data);
		return $this->db->affected_rows();
	}


	
}

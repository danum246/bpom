<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_model extends CI_Model {

	function getdata($table,$key,$order)
	{
		$this->db->order_by($key, $order);
		$q = $this->db->get($table);
		return $q;
	}

	function insertdata($table,$data)
	{
		$q = $this->db->insert($table, $data);
		return $q;
	}

	function getdetail($table,$pk,$value,$key,$order)
	{
		$this->db->where($pk,$value);
		$this->db->order_by($key, $order);
		$q = $this->db->get($table);
		return $q;
	}

	function updatedata($table,$pk,$value,$data)
	{
		$this->db->where($pk,$value);
		$q = $this->db->update($table, $data);
		return $q;
	}

	function deletedata($table,$pk,$value)
	{
		$this->db->where($pk,$value);
		$q = $this->db->delete($table);
		return $q;
	}

}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */
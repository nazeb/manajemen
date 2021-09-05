<?php

Class M_pemilik extends CI_Model{

	function loginCheck($table, $where){
		return $this->db->get_where($table,$where);
	}
	function getData($table){
		return $this->db->get($table);
	}
	function addData($table, $data){
		$this->db->insert($table,$data);
	}
	function getWhere($table, $id){
		$this->db->where('id', $id);
		return $this->db->get($table);
	}

	function editData($table, $id, $data){
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	function deleteData($table, $id){
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

	function searchData($table, $key){
		$this->db->like('id', $key);
		$this->db->or_like('nama', $key);
		$this->db->or_like('harga', $key);
		return $this->db->get($table);
	}

	function resetTable($table){
		$this->db->truncate($table);
	}
}
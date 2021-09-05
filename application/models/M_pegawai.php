<?php

Class M_pegawai extends CI_Model{

	function loginCheck($table, $where){
		return $this->db->get_where($table,$where);
	}
}
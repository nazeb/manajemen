<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('m_pemilik');
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function loginAction(){
		$otoritas = $this->input->post('otoritas');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		if ($otoritas == "pemilik") {
			$cek = $this->m_pemilik->loginCheck('pemilik',$where)->num_rows();

			if($cek > 0){
	 
				$data_session = array(
					'nama' => $username,
					'status' => "owner"
				);
		 
				$this->session->set_userdata($data_session);
		 
				redirect('c_pemilik');
			}
			else{
				$this->session->set_flashdata('teks', 
                '<p class="text-danger">Username atau password salah!</p>');

                redirect('c_login');
			}
		}
		else{
			$cek = $this->m_pegawai->loginCheck('pegawai',$where)->num_rows();

			if($cek > 0){
	 
				$data_session = array(
					'nama' => $username,
					'status' => "pegawai"
				);
		 
				$this->session->set_userdata($data_session);
		 
				redirect('c_pegawai');
			}
			else{
				$this->session->set_flashdata('teks', 
                '<p class="text-danger">Username atau password salah!</p>');

                redirect('c_login');
			}
		}		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('c_login');
	}
}

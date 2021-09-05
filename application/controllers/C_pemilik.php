<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pemilik extends CI_Controller {

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
		if($this->session->userdata('status') != "owner"){
			redirect('c_login');
		}
		$this->load->model('m_pemilik');

	}

	public function index()
	{
		$this->load->view('pemilik/home');
	}

	public function viewPenjualan()
	{
		$data['dataCari'] = NULL;
		$data['dataCart'] = $this->m_pemilik->getData('cart')->result();
		//mendapatkan panjang array $data['dataCart']
		$arrLength = count($data['dataCart']);

		//membuat variabel harga total
		$harga_total = 0;

		for ($i=0; $i < $arrLength; $i++) { 
			$harga_total = $harga_total + $data['dataCart'][$i]->harga;
		}

		$data['harga_total'] = $harga_total; 
		$this->load->view('pemilik/viewPenjualan', $data);
	}

	public function cariBarang(){
		$key = $this->input->post('key');
		$data['dataCart'] = $this->m_pemilik->getData('cart')->result();
		$data['dataCari'] = $this->m_pemilik->searchData('menu', $key)->result();
		
		//mendapatkan panjang array $data['dataCart']
		$arrLength = count($data['dataCart']);

		//membuat variabel harga total
		$harga_total = 0;

		for ($i=0; $i < $arrLength; $i++) { 
			$harga_total = $harga_total + $data['dataCart'][$i]->harga;
		}

		$data['harga_total'] = $harga_total;
		$this->load->view('pemilik/viewPenjualan', $data);
	}

	public function cart(){
		//mendapatkan nilai dari form input
		$id = $this->input->get('id');
		$jumlah = $this->input->get('jumlah');

		//inisialisasi dataCari = null
		$data['dataCari'] = NULL;
		//mendapatkan data dari DB tabel menu dengan id = $id
		$data['dataCartTmp'] = $this->m_pemilik->getWhere('menu', $id)->result();

		//
		$array_harga = array('harga_satuan' => $data['dataCartTmp'][0]->harga);

		//mengkalikan harga dengan jumlah
		$data['dataCartTmp'][0]->harga = $data['dataCartTmp'][0]->harga * $jumlah;

		//membuat array asosiatif untuk menampung $jumlah
		$array_jumlah = array('jumlah' => $jumlah);

		//mengubah object $data['dataCart'][0] menjadi suatu array $array_cart
		$array_cart = (array) $data['dataCartTmp'][0];

		//merge $array_cart dan $array_jumlah
		$dataCart = array_merge($array_cart, $array_jumlah, $array_harga);

		//hapus data id
		unset($dataCart['id']);

		//memasukan data hasil merge ke tabel cart DB
		$this->m_pemilik->addData('cart', $dataCart);

		//getData tabel cart dari DB tabel cart
		$data['dataCart'] = $this->m_pemilik->getData('cart')->result();

		//mendapatkan panjang array $data['dataCart']
		$arrLength = count($data['dataCart']);

		//membuat variabel harga total
		$harga_total = 0;

		//menjumlahkan keseluruhan harga
		for ($i=0; $i < $arrLength; $i++) { 
			$harga_total = $harga_total + $data['dataCart'][$i]->harga;
		}

		//memasukan $harga_total ke array $data
		$data['harga_total'] = $harga_total;

		$this->load->view('pemilik/viewPenjualan', $data);		
	}

	public function resetCart(){
		$this->m_pemilik->resetTable('cart');
		$this->viewPenjualan();
	}

	public function bayar(){
		$this->load->helper('date_indonesia');
		$tanggal = $this->input->post('tanggal');
		$tgl_indo =  longdate_indo($tanggal);
		$array_tanggal = array('tanggal' => $tgl_indo);
		$array_session = array('input_oleh' => $this->session->userdata('nama'));

		$dataCart = $this->m_pemilik->getData('cart')->result();

		$array_bayar;
		$arrLength = count($dataCart);
		$array_data_bayar;

		for ($i=0; $i < $arrLength; $i++) { 
			$array_bayar[$i] = (array) $dataCart[$i];
			//unset($array_bayar[$i]['id']);
			unset($array_bayar[$i]['harga_satuan']);
			$array_data_bayar[$i] =  array_merge($array_bayar[$i], $array_tanggal, $array_session);

			$this->m_pemilik->addData('pembayaran', $array_data_bayar[$i]);
		}		

		// echo "<pre>";
		// var_dump($array_tanggal);
		// echo "</pre>";
		$bayar = $this->m_pemilik->resetTable('cart');

		if (!$bayar) {
			$this->session->set_flashdata('bayar', 
                '<div class="alert alert-success">                   
                    <p>Sukses! pembayaran telah tersimpan.</p>
                </div>'); 
		}
		else{
			$this->session->set_flashdata('bayar', 
                '<div class="alert alert-danger">                   
                    <p>Gagal melakukan pembayaran!</p>
                </div>');		
		}

		//membuat kwitansi pembayaran
		$dataPembayaran = $this->m_pemilik->getData('pembayaran')->result();


		$this->viewPenjualan();		
	}

	public function viewPembelian()
	{
		$this->load->view('pemilik/viewPembelian');
	}	

	//FUNGSI MANAJEMEN MENU
	public function viewMenu(){
		$data['menu'] = $this->m_pemilik->getData('menu')->result();
		$this->load->view('pemilik/viewMenu', $data);
	}

	public function viewAddMenu(){
		$this->load->view('pemilik/viewAddMenu');
	}

	public function addMenu(){
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');

		$data = array(
			'nama' => $nama,
			'harga' => $harga
		);

		$add = $this->m_pemilik->addData('menu', $data);

		if (!$add) {
			$this->session->set_flashdata('addMenu', 
                '<div class="alert alert-success">                   
                    <p>Sukses! Data telah tersimpan.</p>
                </div>'); 
		}
		else{
			$this->session->set_flashdata('addMenu', 
                '<div class="alert alert-danger">                   
                    <p>Data gagal tersimpan!</p>
                </div>');		
		}
		redirect ('/c_pemilik/viewAddMenu');
	}

	public function viewEditMenu($id){
		$data['menu'] = $this->m_pemilik->getWhere('menu', $id)->result();
		$this->load->view('pemilik/viewEditMenu', $data);
	}

	public function editMenu($id){
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');

		$data = array(
			'nama' => $nama,
			'harga' => $harga
		);

		$this->m_pemilik->editData('menu', $id, $data);
		
		redirect ('/c_pemilik/viewMenu');
	}

	public function deleteMenu($id){
		$this->m_pemilik->deleteData('menu', $id);
		redirect ('/c_pemilik/viewMenu');
	}

	//FUNGSI MANAJEMEN PEGAWAI
	public function viewPegawai()
	{
		$data['pegawai'] = $this->m_pemilik->getData('pegawai')->result();
		$this->load->view('pemilik/viewPegawai', $data);
	}

	public function viewAddPegawai(){
		$this->load->view('pemilik/viewAddPegawai');
	}

	public function addPegawai(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$noHP = $this->input->post('noHP');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password),
			'noHP' => $noHP
		);
		
		$add = $this->m_pemilik->addData('pegawai', $data);

		if (!$add) {
			$this->session->set_flashdata('addPegawai', 
                '<div class="alert alert-success">                   
                    <p>Sukses! Data telah tersimpan.</p>
                </div>'); 
		}
		else{
			$this->session->set_flashdata('addPegawai', 
                '<div class="alert alert-danger">                   
                    <p>Data gagal tersimpan!</p>
                </div>');		
		}
		redirect ('/c_pemilik/viewAddPegawai');
	}

	public function viewEditPegawai($id){
		$data['pegawai'] = $this->m_pemilik->getWhere('pegawai', $id)->result();
		$this->load->view('pemilik/viewEditPegawai', $data);
	}

	public function editPegawai($id){
		//$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$noHP = $this->input->post('noHP');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => $password,
			'noHP' => $noHP
		);

		$this->m_pemilik->editData('pegawai', $id, $data);
		
		redirect ('/c_pemilik/viewPegawai');
	}

	public function deletePegawai($id){
		$this->m_pemilik->deleteData('pegawai', $id);
		redirect ('/c_pemilik/viewPegawai');
	}

}

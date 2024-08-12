<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_agama extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('user_logged') == '') {
		// 	redirect('login/logout');
		// }
		$this->load->model(array('Mglobal'));
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data = array(
			"title"      => 'Data Agama',
			"url_index"  => 'C_agama',
			"base"       => base_url(),
			"url_grid"   => base_url('C_agama/grid'),
			"url_add"    => base_url('C_agama/add'),
			"url_edit"   => base_url('C_agama/edit'),
			"url_delete" => base_url('C_agama/remove'),
		);
		$this->load->view('agama/grid_agama', $data);
	}

	public function grid()
	{
		$hasil = $this->Mglobal->grid_data("tbl_agama")->result();
		if (empty($hasil)) {
			$jsonmsg = [
				'hasil' => 'false',
				'pesan' => 'data kosong',
				'datapost' => [],
			];
		} else {
			$jsonmsg = [
				'hasil' => 'true',
				'pesan' => 'Data sukses ditemukan',
				'datapost' => $hasil
			];
		}
		echo json_encode($jsonmsg);
	}
	function add()
	{
		$data['title']     = 'Data Agama';
		$data['title_sub'] = 'Form Tambah Agama';
		$data['url_index'] = base_url('C_agama');
		$data['url_sub']   = base_url('C_agama/add');
		$data['kode']      = $this->Mglobal->kd_agama();
		$this->load->view('agama/form_add', $data);
	}
}

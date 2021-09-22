<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nilaimk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NilaiMk_model');
		$this->load->model('Main_model');
		$this->delete = $this->session->userdata('nilaimk.delete');
		$this->read   = $this->session->userdata('nilaimk.read');
		$this->update = $this->session->userdata('nilaimk.update');
		$this->create = $this->session->userdata('nilaimk.create');
		$this->export = $this->session->userdata('nilaimk.export');
		$this->session->set_userdata('menu', 'nilaimk');
		if (empty($this->session->has_userdata('logged_in'))) {
			redirect('main/login','refresh');
		}
	}

	public function index()
	{
		$this->load->view('layout/base', ['content_view' => 'page/nilaimk/list']);
	}

	function get_nilaimk()
	{
		$col[0] = 'id_siswa';
		$datatable['length']		= $this->input->post('length');
		$datatable['start'] 		= $this->input->post('start');
		$datatable['search'] 		= $this->input->post('search[value]');
		$datatable['draw'] 			= $this->input->post('draw');
		$datatable['sort_column'] 	= $col[$this->input->post('order[0][column]')];
		$datatable['sort_order'] 	= $this->input->post('order[0][dir]');
		// print_r($this->Siswa_model->get_all_siswa());
		$datas = [
			'draw' => $datatable['draw'],
			'recordsTotal' => 1,
			'recordsFiltered' => 1,
			'data' => $this->NilaiMk_model->get_all_nilaimk(),
			// 'data' => [
			// 	[
			// 		'id_siswa' => '1',
			// 		'nik_siswa' => 3515,
			// 		'nama_siswa' => 'John Doe',
			// 		'email_siswa' => 'mail@mail.co',
			// 		'ranking' => '23',
			// 		'nilai_akhir' => '98.80'
			// 	]
			// ],
		];
		echo json_encode($datas);
	}

}
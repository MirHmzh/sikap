<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Core_model');
		$this->load->model('Main_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('users','refresh');
		}else{
			redirect('main/login','refresh');
		}
	}

	function login()
	{
		if ($this->input->post('username') && $this->input->post('password')) {
			$data = $this->Users_model->check_login($this->input->post('username'), $this->input->post('password'));
			if ($data) {
				$userdata = array(
					'logged_in' => true,
					'name' => $data['name'],
					'username' => $data['username'],
					'role' => $data['role']
				);
				foreach ($data['permissions'] as $v) {
					$userdata[$v] = $v;
				}
				$this->session->set_userdata( $userdata );
				redirect('siswa','refresh');
			}else{
				redirect('main/login','refresh');
			}
		}else{
			$this->load->view('page/auth/login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('main/login','refresh');
	}

	function get_bahasa_asing()
	{
		$data = [];
		foreach ($this->Main_model->get_bahasa_asing() as $v) {
			$data[$v['id_bahasa_asing']] = $v['id_bahasa_asing'];
		}
		echo json_encode($data);
	}

	function get_bahasa_daerah()
	{
		$data = [];
		foreach ($this->Main_model->get_bahasa_daerah() as $v) {
			$data[$v['id_bahasa_daerah']] = $v['bahasa_daerah'];
		}
		echo json_encode($data);
	}

	function get_suku()
	{
		$data = [];
		foreach ($this->Main_model->get_suku() as $v) {
			$data[$v['id_suku']] = $v['nama_suku'];
		}
		echo json_encode($data);
	}

	function get_provinsi()
	{
		$data = [];
		foreach ($this->Main_model->get_provinsi() as $v) {
			$data[$v['id']] = $v['name'];
		}
		echo json_encode($data);
	}

	function get_kabupaten($provinsi)
	{
		$data = "";
		foreach ($this->Main_model->get_kabupaten($provinsi) as $v) {
			$data .= '<option value="'.$v['id'].'">'.$v['name']."</option>";
		}
		echo $data;
	}

	function get_kecamatan($kabupaten)
	{
		$data = "";
		foreach ($this->Main_model->get_kecamatan($kabupaten) as $v) {
			$data .= '<option value="'.$v['id'].'">'.$v['name']."</option>";
		}
		echo $data;
	}

	function get_kelurahan($kelurahan)
	{
		$data = "";
		foreach ($this->Main_model->get_kelurahan($kelurahan) as $v) {
			$data .= '<option value="'.$v['id'].'">'.$v['name']."</option>";
		}
		echo $data;
	}

	function get_polda()
	{
		$data = [];
		foreach ($this->Main_model->get_polda() as $v) {
			$data[$v['id_polda']] = $v['nama_polda'];
		}
		echo json_encode($data);
	}

	function get_polres($polda)
	{
		$data = "";
		foreach ($this->Main_model->get_polres($polda) as $v) {
			$data .= '<option value="'.$v['id_polres'].'">'.$v['nama_polres']."</option>";
		}
		echo $data;
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
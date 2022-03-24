<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->logged_in = $this->session->userdata('logged_in');
		if ($this->session->userdata('role') == 2) {
			$this->session->set_flashdata('type', 'warning');
			$this->session->set_flashdata('msg', 'Anda bukan Admin');
			redirect('siswa','refresh');
		}
		if (empty($this->session->has_userdata('logged_in'))) {
			redirect('main/login','refresh');
		}
		$this->session->set_userdata('menu', 'users');
	}

	public function index()
	{
		$this->load->view('layout/base', ['content_view' => 'page/users/index']);
	}

	function get_users()
	{
		$col[0] = 'id_siswa';
		$datatable['length']		= $this->input->post('length');
		$datatable['start'] 		= $this->input->post('start');
		$datatable['search'] 		= $this->input->post('search[value]');
		$datatable['draw'] 			= $this->input->post('draw');
		$datatable['sort_column'] 	= $col[$this->input->post('order[0][column]')];
		$datatable['sort_order'] 	= $this->input->post('order[0][dir]');
		$datas = [
			'draw' => $datatable['draw'],
			'recordsTotal' => 1,
			'recordsFiltered' => 1,
			'data' => $this->Users_model->get_users(),
		];
		echo json_encode($datas);
	}

	function save($id = null)
	{
		if ($id == null) {
			$this->load->view('layout/base', ['content_view' => 'page/users/form']);
		}else{
			$this->load->view('layout/base', ['content_view' => 'page/users/form', 'users' => $this->Users_model->detail_users($id)]);
		}
	}

	function delete($id)
	{
		if ($this->Users_model->delete_users($id)) {
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('msg', 'User terhapus');
			redirect('users');
		}
	}

	function save_user($id = null)
	{
		$data['id'] = $id;
		$data['name'] = $this->input->post('nama');
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['role'] = $this->input->post('role');
		$akses = $this->input->post('akses');
		$p = [];
		if ($id == null) {
			$trans = $this->Users_model->insert_users($data);
			if (isset($akses)) {
				foreach ($akses as $a) {
					$p[] = [
						'id_users' => $trans,
						'permissions' => $a
					];
				}
				$this->Users_model->update_role($trans, $p);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('msg', 'User ditambahkan');
			}
		}else{
			unset($data['id']);
			$trans = $this->Users_model->update_users($id, $data);
			if (isset($akses)) {
				foreach ($akses as $a) {
					$p[] = [
						'id_users' => $id,
						'permissions' => $a
					];
				}
				$this->Users_model->update_role($id, $p);
				$this->session->set_flashdata('type', 'success');
				$this->session->set_flashdata('msg', 'User diubah');
			}

		}
		redirect('users');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
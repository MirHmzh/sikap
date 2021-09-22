<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	function get_users()
	{
		$data = $this->db->limit($this->input->post('length'))
				 ->offset($this->input->post('start'))
				 ->get('mt_users');
		return $data->result();
	}

	function get_permissions($id)
	{
		return $this->db->get_where('mt_permissions', ['id_users' => $id])->result_array();
	}

	function check_login($user, $pass)
	{
		$users = $this->db->get_where('mt_users', ['username' => $user, 'password' => md5($pass)])->row_array();
		if ($users) {
			$raw_permissions = $this->get_permissions($users['id']);
			$users['permissions'] = [];
			foreach ($raw_permissions as $v) {
				$users['permissions'][$v['permissions']] = $v['permissions'];
			}
			return $users;
		}else{
			return false;
		}
	}

	function detail_users($id)
	{
		$data = $this->db
				 ->where('mt_users.id', $id)
				 ->get('mt_users')->row_array();
		$raw_permissions = $this->get_permissions($id);
		$data['permissions'] = [];
		foreach ($raw_permissions as $v) {
			$data['permissions'][$v['permissions']] = $v['permissions'];
		}
		return $data;
	}

	function insert_users($object)
	{
		$this->db->insert('mt_users', $object);
		return $this->db->insert_id();
	}

	function update_users($id, $object)
	{
		return $this->db->update('mt_users', $object, ['id' => $id]);
	}

	function delete_users($id)
	{
		$this->db->delete('mt_permissions', ['id_users' => $id]);
		return $this->db->delete('mt_users', ['id' => $id]);
	}

	function update_role($id,$object)
	{
		$this->db->delete('mt_permissions', ['id_users' => $id]);
		return $this->db->insert_batch('mt_permissions', $object);
	}

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
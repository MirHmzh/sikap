<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function get_siswa($id)
	{
		return $this->db->where(['id_siswa' => $id])->get('mt_siswa')->row_array();
	}

	function insert_siswa($data)
	{
		$this->db->insert('mt_siswa', $data);
		return $this->db->insert_id();
	}

	function update_siswa($id, $data)
	{
		$this->db->update('mt_siswa', $data, ['id_siswa' => $id]);
		return $id;
	}

	function delete_siswa($id)
	{
		return $this->db->delete('mt_siswa', ['id_siswa' => $id]);
	}

	function insert_pendidikan($data)
	{
		$this->db->insert('tr_pendidikan', $data);
		return $this->db->insert_id();
	}

	function update_pendidikan($id, $data)
	{
		$this->db->update('tr_pendidikan', $data, ['id_pendidikan', $id]);
		return $id;
	}

	function delete_pendidikan($id)
	{
		return $this->db->delete('tr_pendidikan', ['id_pendidikan', $id]);
	}

	function insert_wali($data)
	{
		$this->db->insert('tr_wali', $data);
		return $this->db->insert_id();
	}

	function update_wali($id, $data)
	{
		$this->db->update('tr_wali', $data, ['id_wali_siswa' => $id]);
		return $id;
	}

	function delete_wali($id)
	{
		return $this->db->delete('tr_wali', ['id_wali' => $id]);
	}

	function insert_seleksi($data)
	{
		$this->db->insert('tr_seleksi', $data);
		return $this->db->insert_id();
	}

	function update_seleksi($id, $data)
	{
		$this->db->update('tr_seleksi', $data, ['id_hasil_seleksi']);
		return $id;
	}

	function delete_seleksi($id)
	{
		return $this->db->delete('tr_seleksi', ['id_hasil_seleksi' => $id]);
	}

	function select_provinsi()
	{
		$datas = $this->db->get('mt_provinsi')->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id']] = $v['name'];
		}
		return $data;
	}

	function get_polres($polda)
	{
		$datas = $this->db->get_where('mt_polres', ['id_polda' => $polda])->result_array();
		return $datas;
	}

	function get_kabupaten($provinsi)
	{
		$datas = $this->db->get_where('mt_kabupaten', ['province_id' => $provinsi])->result_array();
		return $datas;
	}

	function get_kecamatan($kabupaten)
	{
		$datas = $this->db->get_where('mt_kecamatan', ['regency_id' => $kabupaten])->result_array();
		return $datas;
	}

	function get_kelurahan($kelurahan)
	{
		$datas = $this->db->get_where('mt_kelurahan', ['district_id' => $kelurahan])->result_array();
		return $datas;
	}

	function select_kota($provinsi)
	{
		$datas = $this->db->get_where('mt_kabupaten', ['province_id' => $provinsi])->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id']] = $v['name'];
		}
		return $data;
	}

	function select_kecamatan($kota)
	{
		$datas = $this->db->get_where('mt_kecamatan', ['regency_id' => $kota])->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id']] = $v['name'];
		}
		return $data;
	}

	function select_kelurahan($kecamatan)
	{
		$datas = $this->db->get_where('mt_kelurahan', ['district_id' => $kecamatan])->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id']] = $v['name'];
		}
		return $data;
	}

	function select_polda()
	{
		$datas = $this->db->get_where('mt_polda')->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id_polda']] = $v['nama_polda'];
		}
		return $data;
	}

	function select_polres($polda)
	{
		$datas = $this->db->get_where('mt_polres', ['id_polda' => $polda])->result_array();
		$data = [];
		foreach ($datas as $v) {
			$data[$v['id_polres']] = $v['nama_polres'];
		}
		return $data;
	}


	function find_polda($string)
	{
		$this->db->like('nama_polda', $string, 'BOTH');
		return $this->db->get('mt_polda')->row();
	}

	function find_polres($polda, $string)
	{
		$this->db->like('nama_polres', $string, 'BOTH');
		$datas = $this->db->get_where('mt_polres', ['id_polda' => $polda])->row();
		return $datas;
	}

	function find_prov($string)
	{
		$this->db->like('name', $string, 'BOTH');
		return $this->db->get('mt_provinsi')->row();
	}

	function find_kabupaten($provinsi, $string)
	{
		$this->db->like('name', $string, 'BOTH');
		$datas = $this->db->get_where('mt_kabupaten', ['province_id' => $provinsi])->row();
		return $datas;
	}

	function find_kecamatan($kabupaten, $string)
	{
		$this->db->like('name', $string, 'BOTH');
		$datas = $this->db->get_where('mt_kecamatan', ['regency_id' => $kabupaten])->row();
		return $datas;
	}

	function find_kelurahan($kelurahan, $string)
	{
		$this->db->like('name', $string, 'BOTH');
		$datas = $this->db->get_where('mt_kelurahan', ['district_id' => $kelurahan])->row();
		return $datas;
	}

}

/* End of file Main_model.php */
/* Location: ./application/models/Main_model.php */
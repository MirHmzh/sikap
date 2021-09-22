<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_model extends CI_Model {

	function get_bahasa_asing(){
		return $this->db->get('mt_bahasa_asing')->result_array();
	}

	function get_bahasa_daerah(){
		return $this->db->get('mt_bahasa_daerah')->result_array();
	}

	function get_suku()
	{
		return $this->db->get('mt_suku')->result_array();
	}

	function get_provinsi()
	{
		return $this->db->get('mt_provinsi')->result_array();
	}

	function get_kabupaten($id_provinsi)
	{
		return $this->db->where(['province_id' => $id_provinsi])->get('mt_kabupaten')->result_array();
	}

	function get_kecamatan($id_kabupaten)
	{
		return $this->db->where(['regency_id' => $id_kabupaten])->result_array();
	}

	function get_kelurahan($id_kecamatan)
	{
		return $this->db->where(['district_id' => $id_kecamatan])->get('mt_kelurahan')->result_array();
	}

	function get_polda()
	{
		return $this->db->get('mt_polda')->result_array();
	}

	function get_polres($id_polda)
	{
		return $this->db->where('id_polda', $id_polda)->get('mt_polres')->result_array();
	}

}

/* End of file Core_model.php */
/* Location: ./application/models/Core_model.php */
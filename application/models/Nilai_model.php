<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function get_nilai_by_jml($jml)
	{
		$this->db->where('jml_skor', $jml);
		return $this->db->get('mt_nilai')->row();
	}

}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */
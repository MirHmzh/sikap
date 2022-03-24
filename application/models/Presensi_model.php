<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_model extends CI_Model {

	public function get_jml_skor()
	{
		return $this->db->get('mt_nilai')->result();
	}

	public function get_presensi()
	{
		$this->db->select('pleton,tgl_checklist');
		$this->db->join('mt_siswa', 'mt_siswa.id_siswa = tr_presensi.id_siswa', 'left');
		$this->db->limit($this->input->post('length'));
		$this->db->offset($this->input->post('start'));
		$this->db->group_by('pleton,tgl_checklist');
		return $this->db->get('tr_presensi')->result_array();
	}

	public function find_presensi($pleton, $tgl_checklist)
	{
		$this->db->select('tr_presensi.id_siswa,nama_siswa,jml_skor,tr_presensi.prestasi,pelanggaran,tr_presensi.ranking');
		$this->db->where([
			'pleton' => $pleton,
			'tgl_checklist' => $tgl_checklist,
		]);
		$this->db->join('mt_siswa', 'mt_siswa.id_siswa = tr_presensi.id_siswa', 'left');
		return $this->db->get('tr_presensi')->result_array();
	}

	public function delete_presensi($pleton, $tgl_checklist)
	{
		$this->db->select('tr_presensi.id_siswa');
		$this->db->from('tr_presensi');
		$this->db->join('mt_siswa', 'mt_siswa.id_siswa = tr_presensi.id_siswa', 'left');
		$this->db->where([
			'pleton' => $pleton,
			'tgl_checklist' => $tgl_checklist,
		]);
		$where_clause = $this->db->get_compiled_select();

		$this->db->where("`id_siswa` IN ($where_clause)", NULL, FALSE);
		return $this->db->delete('tr_presensi');
	}

	public function nilai_harian($pleton, $tgl_checklist)
	{
		$this->db->select('mt_nilai.rata_rata, mt_nilai.konversi_nilai, tr_presensi.*, mt_siswa.nama_siswa, tr_seleksi.nosis_panjang');
		$this->db->join('mt_nilai', 'tr_presensi.jml_skor = mt_nilai.jml_skor', 'left');
		$this->db->join('mt_siswa', 'mt_siswa.id_siswa = tr_presensi.id_siswa', 'left');
		$this->db->join('tr_seleksi', 'mt_siswa.seleksi = tr_seleksi.id_hasil_seleksi', 'left');
		$this->db->where('mt_siswa.pleton', $pleton);
		$this->db->where('tgl_checklist', $tgl_checklist);
		return $this->db->get('tr_presensi')->result_array();
	}

}

/* End of file Presensi_model.php */
/* Location: ./application/models/Presensi_model.php */
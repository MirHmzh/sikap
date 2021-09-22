<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiMk_model extends CI_Model {

	function get_nilaimk($id)
	{
		return $this->db->where(['id_siswa' => $id])->get('nilai_siswa')->result();
	}

	function get_all_nilaimk()
	{
		return $this->db->select('
					mt_siswa.*,
					tr_wali.*,
					tr_seleksi.*,
					tr_pendidikan.*,
					provinsi_siswa.name as siswa_provinsi,
					kabupaten_siswa.name as siswa_kabupaten,
					kecamatan_siswa.name as siswa_kecamatan,
					kelurahan_siswa.name as siswa_kelurahan,
					provinsi_sma.name as sma_p,
					kabupaten_sma.name as sma_k,
					provinsi_smp.name as smp_p,
					kabupaten_smp.name as smp_k,
					provinsi_sd.name as sd_p,
					kabupaten_sd.name as sd_k,
					polda.nama_polda,
					polres.nama_polres
				')
				->join('tr_wali', 'tr_wali.id_wali_siswa = mt_siswa.wali', 'left')
				->join('tr_seleksi', 'tr_seleksi.id_hasil_seleksi = mt_siswa.seleksi')
				->join('tr_pendidikan', 'tr_pendidikan.id_pendidikan = mt_siswa.pendidikan')
				->join('mt_provinsi as provinsi_siswa', 'provinsi_siswa.id = mt_siswa.provinsi')
				->join('mt_kabupaten as kabupaten_siswa', 'kabupaten_siswa.id = mt_siswa.kabupaten_kota')
				->join('mt_kecamatan as kecamatan_siswa', 'kecamatan_siswa.id = mt_siswa.kecamatan')
				->join('mt_kelurahan as kelurahan_siswa', 'kelurahan_siswa.id = mt_siswa.kelurahan')
				->join('mt_provinsi as provinsi_sma', 'provinsi_sma.id = mt_siswa.provinsi')
				->join('mt_kabupaten as kabupaten_sma', 'kabupaten_sma.id = mt_siswa.kabupaten_kota')
				->join('mt_provinsi as provinsi_smp', 'provinsi_smp.id = mt_siswa.provinsi')
				->join('mt_kabupaten as kabupaten_smp', 'kabupaten_smp.id = mt_siswa.kabupaten_kota')
				->join('mt_provinsi as provinsi_sd', 'provinsi_sd.id = mt_siswa.provinsi')
				->join('mt_kabupaten as kabupaten_sd', 'kabupaten_sd.id = mt_siswa.kabupaten_kota')
				->join('mt_polda as polda', 'polda.id_polda = mt_siswa.asal_polda')
				->join('mt_polres as polres', 'polres.id_polres = mt_siswa.asal_polres AND polda.id_polda = mt_siswa.asal_polda')
				->limit($this->input->post('length'))
				->offset($this->input->post('start'))
				->get('mt_siswa')->result_array();
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('Main_model');
		$this->delete = $this->session->userdata('siswa.delete');
		$this->read   = $this->session->userdata('siswa.read');
		$this->update = $this->session->userdata('siswa.update');
		$this->create = $this->session->userdata('siswa.create');
		$this->export = $this->session->userdata('siswa.export');
		$this->session->set_userdata('menu', 'siswa');
		if (empty($this->session->has_userdata('logged_in'))) {
			redirect('main/login','refresh');
		}
	}

	public function index()
	{
		$this->load->view('layout/base', ['content_view' => 'page/siswa/list']);
	}

	function save($id = null)
	{
		if ($this->create == null && $id == null) {
			$this->session->set_flashdata('type', 'warning');
			$this->session->set_flashdata('msg', 'Anda tidak memiliki akses');
			redirect('siswa','refresh');
		}
		if ($this->read == null && $id != null) {
			$this->session->set_flashdata('type', 'warning');
			$this->session->set_flashdata('msg', 'Anda tidak memiliki akses');
			redirect('siswa','refresh');
		}
		$provinsi = $this->Main_model->select_provinsi();
		$kota = $this->Main_model->select_kota(11);
		$kecamatan = $this->Main_model->select_kecamatan(1101);
		$kelurahan = $this->Main_model->select_kelurahan(1101010);
		$polda = $this->Main_model->select_polda();
		$polres = $this->Main_model->select_polres(11);
		if ($id == null) {
			$this->load->view('layout/base', [
				'content_view' => 'page/siswa/form',
				'provinsi' => $provinsi,
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'polda' => $polda,
				'polres' => $polres
			]);
		}else{
			$siswa = $this->Siswa_model->detail_siswa($id);
			$this->load->view('layout/base', [
				'content_view' => 'page/siswa/form',
				'provinsi' => $provinsi,
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'kelurahan' => $kelurahan,
				'polda' => $polda,
				'polres' => $polres,
				'siswa' => $siswa,
			]);
		}
	}

	function get_siswa()
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
			'data' => $this->Siswa_model->get_all_siswa(),
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

	function delete($id)
	{
		if ($this->delete == null) {
			$this->session->set_flashdata('type', 'warning');
			$this->session->set_flashdata('msg', 'Anda tidak memiliki akses');
			redirect('siswa','refresh');
		}
		if ($this->Siswa_model->delete_siswa($id)) {
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('msg', 'Siswa terhapus');
			redirect('siswa');
		}
	}

	function up_image()
	{
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$response = array('error' => $this->upload->display_errors());
		}
		else{
			$response = array('data' => $this->upload->data());
		}
		echo json_encode($response);
	}

	function update_image($id_user)
	{
		$foto = $this->input->post('foto');
		if ($foto) {
			$this->Siswa_model->update_foto($id_user, $foto);
		}
	}

	public function save_siswa()
	{
		$this->load->model('Main_model');
		$this->load->model('Siswa_model');

		$siswa['id_siswa'] = $this->input->post('id_siswa');
		$siswa['pleton'] = $this->input->post('pleton');
		$siswa['kompi'] = $this->input->post('kompi');
		$siswa['batalyon'] = $this->input->post('batalyon');
		$siswa['nik_siswa'] = $this->input->post('nik_siswa');
		$siswa['nama_siswa'] = $this->input->post('nama_siswa');
		$siswa['jk_siswa'] = $this->input->post('jk_siswa');
		$siswa['no_hp_siswa'] = $this->input->post('no_hp_siswa');
		$siswa['email_siswa'] = $this->input->post('email_siswa');
		$siswa['tinggi_siswa'] = $this->input->post('tinggi_siswa');
		$siswa['berat_siswa'] = $this->input->post('berat_siswa');
		$siswa['agama_siswa'] = $this->input->post('agama_siswa');
		$siswa['suku_siswa'] = $this->input->post('suku_siswa');
		$siswa['tempat_lahir'] = $this->input->post('tempat_lahir');
		$siswa['tanggal_lahir'] = $this->input->post('tanggal_lahir');
		$siswa['golongan_darah'] = $this->input->post('golongan_darah');
		$siswa['alamat_rumah'] = $this->input->post('alamat_rumah');
		$siswa['kelurahan'] = $this->input->post('kelurahan');
		$siswa['kecamatan'] = $this->input->post('kecamatan');
		$siswa['kabupaten_kota'] = $this->input->post('kabupaten_kota');
		$siswa['provinsi'] = $this->input->post('provinsi');
		$siswa['pekerjaan'] = $this->input->post('pekerjaan');
		$siswa['status_kawin'] = $this->input->post('status_kawin');
		$siswa['tgl_ktp'] = $this->input->post('tgl_ktp');
		$siswa['bahasa_asing'] = $this->input->post('bahasa_asing');
		$siswa['bahasa_daerah'] = $this->input->post('bahasa_daerah');
		$siswa['prestasi'] = $this->input->post('prestasi');
		$siswa['asal_polda'] = $this->input->post('asal_polda');
		$siswa['asal_polres'] = $this->input->post('asal_polres');
		$siswa['foto'] = $this->input->post('foto');

		$pendidikan['ban'] = $this->input->post('ban');
		$pendidikan['nim'] = $this->input->post('nim');
		$pendidikan['jenjang_pendidikan'] = $this->input->post('jenjang_pendidikan');
		$pendidikan['nama_prodi'] = $this->input->post('nama_prodi');
		$pendidikan['nama_pt'] = $this->input->post('nama_pt');
		$pendidikan['ipk'] = $this->input->post('ipk');
		$pendidikan['rata_rapor'] = $this->input->post('rata_rapor');
		$pendidikan['dikum_akhir'] = $this->input->post('dikum_akhir');
		$pendidikan['jurusan'] = $this->input->post('jurusan');
		$pendidikan['rata_un_sma'] = $this->input->post('rata_un_sma');
		$pendidikan['thn_lulus_sma'] = $this->input->post('thn_lulus_sma');
		$pendidikan['provinsi_sma'] = $this->input->post('provinsi_sma');
		$pendidikan['kab_kota_sma'] = $this->input->post('kab_kota_sma');
		$pendidikan['nama_sma'] = $this->input->post('nama_sma');
		$pendidikan['rata_un_smp'] = $this->input->post('rata_un_smp');
		$pendidikan['thn_lulus_smp'] = $this->input->post('thn_lulus_smp');
		$pendidikan['provinsi_smp'] = $this->input->post('provinsi_smp');
		$pendidikan['kab_kota_smp'] = $this->input->post('kab_kota_smp');
		$pendidikan['nama_smp'] = $this->input->post('nama_smp');
		$pendidikan['rata_un_sd'] = $this->input->post('rata_un_sd');
		$pendidikan['thn_lulus_sd'] = $this->input->post('thn_lulus_sd');
		$pendidikan['provinsi_sd'] = $this->input->post('provinsi_sd');
		$pendidikan['kab_kota_sd'] = $this->input->post('kab_kota_sd');
		$pendidikan['nama_sd'] = $this->input->post('nama_sd');

		$seleksi['nosis_panjang'] = $this->input->post('nosis_panjang');
		$seleksi['jalur_seleksi'] = $this->input->post('jalur_seleksi');
		$seleksi['diktuk_spn'] = $this->input->post('diktuk_spn');
		$seleksi['nilai_jasmani'] = $this->input->post('nilai_jasmani');
		$seleksi['nilai_psi'] = $this->input->post('nilai_psi');
		$seleksi['nilai_uji_akademik'] = $this->input->post('nilai_uji_akademik');
		$seleksi['nilai_akhir'] = $this->input->post('nilai_akhir');
		$seleksi['ranking'] = $this->input->post('ranking');

		$wali['nama_wali'] = $this->input->post('nama_wali');
		$wali['agama_wali'] = $this->input->post('agama_wali');
		$wali['no_hp_wali'] = $this->input->post('no_hp_wali');
		$wali['kel_kerja_wali'] = $this->input->post('kel_kerja_wali');
		$wali['jns_kerja_wali'] = $this->input->post('jns_kerja_wali');
		$wali['gol_kerja_wali'] = $this->input->post('gol_kerja_wali');
		$wali['jabatan_wali'] = $this->input->post('jabatan_wali');
		$wali['nama_kantor_wali'] = $this->input->post('nama_kantor_wali');
		$wali['alamat_kantor_wali'] = $this->input->post('alamat_kantor_wali');
		$wali['tgl_lahir_wali'] = $this->input->post('tgl_lahir_wali');
		$wali['status_wali'] = $this->input->post('status_wali');
		$wali['nama_ibu'] = $this->input->post('nama_ibu');
		$wali['agama_ibu'] = $this->input->post('agama_ibu');
		$wali['no_hp_ibu'] = $this->input->post('no_hp_ibu');
		$wali['kel_kerja_ibu'] = $this->input->post('kel_kerja_ibu');
		$wali['jns_kerja_ibu'] = $this->input->post('jns_kerja_ibu');
		$wali['gol_kerja_ibu'] = $this->input->post('gol_kerja_ibu');
		$wali['jabatan_ibu'] = $this->input->post('jabatan_ibu');
		$wali['nama_kantor_ibu'] = $this->input->post('nama_kantor_ibu');
		$wali['alamat_kantor_ibu'] = $this->input->post('alamat_kantor_ibu');
		$wali['tgl_lahir_ibu'] = $this->input->post('tgl_lahir_ibu');
		$wali['status_ibu'] = $this->input->post('status_ibu');
		$wali['nama_bapak'] = $this->input->post('nama_bapak');
		$wali['agama_bapak'] = $this->input->post('agama_bapak');
		$wali['no_hp_bapak'] = $this->input->post('no_hp_bapak');
		$wali['kel_kerja_bapak'] = $this->input->post('kel_kerja_bapak');
		$wali['jns_kerja_bapak'] = $this->input->post('jns_kerja_bapak');
		$wali['gol_kerja_bapak'] = $this->input->post('gol_kerja_bapak');
		$wali['jabatan_bapak'] = $this->input->post('jabatan_bapak');
		$wali['nama_kantor_bapak'] = $this->input->post('nama_kantor_bapak');
		$wali['alamat_kantor_bapak'] = $this->input->post('alamat_kantor_bapak');
		$wali['tgl_lahir_bapak'] = $this->input->post('tgl_lahir_bapak');
		$wali['status_bapak'] = $this->input->post('status_bapak');

		if ($siswa['id_siswa'] == null) {
			$siswa['pendidikan'] = $this->Main_model->insert_pendidikan($pendidikan);
			$siswa['wali'] = $this->Main_model->insert_wali($wali);
			$siswa['seleksi'] = $this->Main_model->insert_seleksi($seleksi);
			$id_siswa = $this->Main_model->insert_siswa($siswa);
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('msg', 'Siswa ditambahkan');
		}else{
			if ($this->update == null) {
				echo json_encode(['msg' => 'Anda tidak memiliki akses']);
			}
			$data_siswa = $this->Main_model->get_siswa($siswa['id_siswa']);
			$foto = $this->Siswa_model->get_siswa($siswa['id_siswa']);
			$siswa['pendidikan'] = $this->Main_model->update_pendidikan($data_siswa['pendidikan'], $pendidikan);
			$siswa['wali'] = $this->Main_model->update_wali($data_siswa['wali'], $wali);
			$siswa['seleksi'] = $this->Main_model->update_seleksi($data_siswa['seleksi'], $seleksi);
			$id_siswa = $this->Main_model->update_siswa($siswa['id_siswa'], $siswa);
			$this->session->set_flashdata('type', 'success');
			$this->session->set_flashdata('msg', 'Siswa diubah');
		};
		echo json_encode($id_siswa);
	}

	function export()
	{
		if ($this->export == null) {
			$this->session->set_flashdata('type', 'warning');
			$this->session->set_flashdata('msg', 'Anda tidak memiliki akses');
			redirect('siswa','refresh');
		}
		$this->load->model('Siswa_model');
		$s = new Spreadsheet();
		$sheet = $s->getActiveSheet();
		$sheet->setCellValue('A1', 'NO URUT');
		$sheet->setCellValue('B1', 'ASAL POLDA');
		$sheet->setCellValue('C1', 'ASAL POLRES');
		$sheet->setCellValue('D1', 'NOSIS PANJANG');
		$sheet->setCellValue('E1', 'NIK');
		$sheet->setCellValue('F1', 'NAMA');
		$sheet->setCellValue('G1', 'JALUR SELEKSI');
		$sheet->setCellValue('H1', 'DIKTUK DI SPN');
		$sheet->setCellValue('I1', 'JK');
		$sheet->setCellValue('J1', 'NILAI JASMANI');
		$sheet->setCellValue('K1', 'NILAI PSI');
		$sheet->setCellValue('L1', 'NILAI UJI AKADEMIK');
		$sheet->setCellValue('M1', 'RANKING');
		$sheet->setCellValue('N1', 'NILAI AKHIR');
		$sheet->setCellValue('O1', 'NO HP');
		$sheet->setCellValue('P1', 'EMAIL');
		$sheet->setCellValue('Q1', 'TINGGI (CM)');
		$sheet->setCellValue('R1', 'BERAT (KG)');
		$sheet->setCellValue('S1', 'AGAMA');
		$sheet->setCellValue('T1', 'SUKU');
		$sheet->setCellValue('U1', 'TEMPAT LAHIR');
		$sheet->setCellValue('V1', 'TGL LAHIR');
		$sheet->setCellValue('W1', 'GOLONGAN DARAH');
		$sheet->setCellValue('X1', 'ALAMAT RUMAH');
		$sheet->setCellValue('Y1', 'KELURAHAN');
		$sheet->setCellValue('Z1', 'KECAMATAN');
		$sheet->setCellValue('AA1', 'KABUPATEN');
		$sheet->setCellValue('AB1', 'PROVINSI');
		$sheet->setCellValue('AC1', 'JENIS PEKERJAAN');
		$sheet->setCellValue('AD1', 'STATUS KAWIN');
		$sheet->setCellValue('AE1', 'TGL PEMBUATAN KTP');
		$sheet->setCellValue('AF1', 'BAHASA ASING');
		$sheet->setCellValue('AG1', 'BAHASA DAERAH');
		$sheet->setCellValue('AH1', 'PRESTASI');
		$sheet->setCellValue('AI1', 'STATUS WALI');
		$sheet->setCellValue('AJ1', 'TGL LAHIR WALI');
		$sheet->setCellValue('AK1', 'ALAMAT KANTOR WALI');
		$sheet->setCellValue('AL1', 'NAMA KANTOR WALI');
		$sheet->setCellValue('AM1', 'JABATAN WALI');
		$sheet->setCellValue('AN1', 'GOL KERJA WALI');
		$sheet->setCellValue('AO1', 'JNS KERJA WALI');
		$sheet->setCellValue('AP1', 'KEL KERJA WALI');
		$sheet->setCellValue('AQ1', 'NO HP WALI');
		$sheet->setCellValue('AR1', 'AGAMA WALI');
		$sheet->setCellValue('AS1', 'NAMA WALI');
		$sheet->setCellValue('AT1', 'STATUS IBU');
		$sheet->setCellValue('AU1', 'TGL LAHIR IBU');
		$sheet->setCellValue('AV1', 'ALAMAT KANTOR IBU');
		$sheet->setCellValue('AW1', 'NAMA KANTOR IBU');
		$sheet->setCellValue('AX1', 'JABATAN IBU');
		$sheet->setCellValue('AY1', 'GOL KERJA IBU');
		$sheet->setCellValue('AZ1', 'JNS KERJA IBU');
		$sheet->setCellValue('BA1', 'KEL KERJA IBU');
		$sheet->setCellValue('BB1', 'NO HP IBU');
		$sheet->setCellValue('BC1', 'AGAMA IBU');
		$sheet->setCellValue('BD1', 'NAMA IBU');
		$sheet->setCellValue('BE1', 'STATUS BAPAK');
		$sheet->setCellValue('BF1', 'TGL LAHIR BAPAK');
		$sheet->setCellValue('BG1', 'ALAMAT KANTOR BAPAK');
		$sheet->setCellValue('BH1', 'NAMA KANTOR BAPAK');
		$sheet->setCellValue('BI1', 'JABATAN BAPAK');
		$sheet->setCellValue('BJ1', 'GOL KERJA BAPAK');
		$sheet->setCellValue('BK1', 'JNS KERJA BAPAK');
		$sheet->setCellValue('BL1', 'KEL KERJA BAPAK');
		$sheet->setCellValue('BM1', 'NO HP BAPAK');
		$sheet->setCellValue('BN1', 'AGAMA BAPAK');
		$sheet->setCellValue('BO1', 'NAMA BAPAK');
		$sheet->setCellValue('BP1', 'BAN');
		$sheet->setCellValue('BQ1', 'NIM');
		$sheet->setCellValue('BR1', 'JENJANG PENDIDIKAN');
		$sheet->setCellValue('BS1', 'PRODI');
		$sheet->setCellValue('BT1', 'NAMA PERGURUAN TINGGI');
		$sheet->setCellValue('BU1', 'IPK');
		$sheet->setCellValue('BV1', 'RATA RATA RAPOR');
		$sheet->setCellValue('BW1', 'DIKUM AKHIR');
		$sheet->setCellValue('BX1', 'JURUSAN SMA');
		$sheet->setCellValue('BY1', 'RATA NILAI UN');
		$sheet->setCellValue('BZ1', 'TAHUN LULUS SMA');
		$sheet->setCellValue('CA1', 'PROVINSI SMA');
		$sheet->setCellValue('CB1', 'KOTA SMA');
		$sheet->setCellValue('CC1', 'NAMA SMA');
		$sheet->setCellValue('CD1', 'RATA RATA UN SMP');
		$sheet->setCellValue('CE1', 'TAHUN LULUS SMP');
		$sheet->setCellValue('CF1', 'PROVINSI SMP');
		$sheet->setCellValue('CG1', 'KOTA SMP');
		$sheet->setCellValue('CH1', 'NAMA SMP');
		$sheet->setCellValue('CI1', 'RATA RATA UN SD');
		$sheet->setCellValue('CJ1', 'TAHUN LULUS SD');
		$sheet->setCellValue('CK1', 'PROVINSI SD');
		$sheet->setCellValue('CL1', 'KOTA SD');
		$sheet->setCellValue('CM1', 'NAMA SD');
		$sheet->getStyle('A1:CM1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
		$siswa = $this->Siswa_model->get_all_siswa();
		// echo $this->db->last_query();
		$initVal = 1;
		$inc = 0;
		foreach ($siswa as $v) {
			$initVal++;
			$inc++;
			$sheet->setCellValue('A'.$initVal, $inc);
			$sheet->setCellValue('B'.$initVal, $v['nama_polda']);
			$sheet->setCellValue('C'.$initVal, $v['nama_polres']);
			$sheet->setCellValue('D'.$initVal, $v['nosis_panjang']);
			$sheet->setCellValue('E'.$initVal, $v['nik_siswa']);
			$sheet->setCellValue('F'.$initVal, $v['nama_siswa']);
			$sheet->setCellValue('G'.$initVal, $v['jalur_seleksi']);
			$sheet->setCellValue('H'.$initVal, $v['diktuk_spn']);
			$sheet->setCellValue('I'.$initVal, $v['jk_siswa']);
			$sheet->setCellValue('J'.$initVal, $v['nilai_jasmani']);
			$sheet->setCellValue('K'.$initVal, $v['nilai_psi']);
			$sheet->setCellValue('L'.$initVal, $v['nilai_uji_akademik']);
			$sheet->setCellValue('M'.$initVal, $v['ranking']);
			$sheet->setCellValue('N'.$initVal, $v['nilai_akhir']);
			$sheet->setCellValue('O'.$initVal, $v['no_hp_siswa']);
			$sheet->setCellValue('P'.$initVal, $v['email_siswa']);
			$sheet->setCellValue('Q'.$initVal, $v['tinggi_siswa']);
			$sheet->setCellValue('R'.$initVal, $v['berat_siswa']);
			$sheet->setCellValue('S'.$initVal, $v['agama_siswa']);
			$sheet->setCellValue('T'.$initVal, $v['suku_siswa']);
			$sheet->setCellValue('U'.$initVal, $v['tempat_lahir']);
			$sheet->setCellValue('V'.$initVal, $v['tanggal_lahir']);
			$sheet->setCellValue('W'.$initVal, $v['golongan_darah']);
			$sheet->setCellValue('X'.$initVal, $v['alamat_rumah']);
			$sheet->setCellValue('Y'.$initVal, $v['siswa_kelurahan']);
			$sheet->setCellValue('Z'.$initVal, $v['siswa_kecamatan']);
			$sheet->setCellValue('AA'.$initVal, $v['siswa_kabupaten']);
			$sheet->setCellValue('AB'.$initVal, $v['siswa_provinsi']);
			$sheet->setCellValue('AC'.$initVal, $v['pekerjaan']);
			$sheet->setCellValue('AD'.$initVal, $v['status_kawin']);
			$sheet->setCellValue('AE'.$initVal, $v['tgl_ktp']);
			$sheet->setCellValue('AF'.$initVal, $v['bahasa_asing']);
			$sheet->setCellValue('AG'.$initVal, $v['bahasa_daerah']);
			$sheet->setCellValue('AH'.$initVal, $v['prestasi']);
			$sheet->setCellValue('AI'.$initVal, $v['status_wali']);
			$sheet->setCellValue('AJ'.$initVal, $v['tgl_lahir_wali']);
			$sheet->setCellValue('AK'.$initVal, $v['alamat_kantor_wali']);
			$sheet->setCellValue('AL'.$initVal, $v['nama_kantor_wali']);
			$sheet->setCellValue('AM'.$initVal, $v['jabatan_wali']);
			$sheet->setCellValue('AN'.$initVal, $v['gol_kerja_wali']);
			$sheet->setCellValue('AO'.$initVal, $v['jns_kerja_wali']);
			$sheet->setCellValue('AP'.$initVal, $v['kel_kerja_wali']);
			$sheet->setCellValue('AQ'.$initVal, $v['no_hp_wali']);
			$sheet->setCellValue('AR'.$initVal, $v['agama_wali']);
			$sheet->setCellValue('AS'.$initVal, $v['nama_wali']);
			$sheet->setCellValue('AT'.$initVal, $v['status_ibu']);
			$sheet->setCellValue('AU'.$initVal, $v['tgl_lahir_ibu']);
			$sheet->setCellValue('AV'.$initVal, $v['alamat_kantor_ibu']);
			$sheet->setCellValue('AW'.$initVal, $v['nama_kantor_ibu']);
			$sheet->setCellValue('AX'.$initVal, $v['jabatan_ibu']);
			$sheet->setCellValue('AY'.$initVal, $v['gol_kerja_ibu']);
			$sheet->setCellValue('AZ'.$initVal, $v['jns_kerja_ibu']);
			$sheet->setCellValue('BA'.$initVal, $v['kel_kerja_ibu']);
			$sheet->setCellValue('BB'.$initVal, $v['no_hp_ibu']);
			$sheet->setCellValue('BC'.$initVal, $v['agama_ibu']);
			$sheet->setCellValue('BD'.$initVal, $v['nama_ibu']);
			$sheet->setCellValue('BE'.$initVal, $v['status_bapak']);
			$sheet->setCellValue('BF'.$initVal, $v['tgl_lahir_bapak']);
			$sheet->setCellValue('BG'.$initVal, $v['alamat_kantor_bapak']);
			$sheet->setCellValue('BH'.$initVal, $v['nama_kantor_bapak']);
			$sheet->setCellValue('BI'.$initVal, $v['jabatan_bapak']);
			$sheet->setCellValue('BJ'.$initVal, $v['gol_kerja_bapak']);
			$sheet->setCellValue('BK'.$initVal, $v['jns_kerja_bapak']);
			$sheet->setCellValue('BL'.$initVal, $v['kel_kerja_bapak']);
			$sheet->setCellValue('BM'.$initVal, $v['no_hp_bapak']);
			$sheet->setCellValue('BN'.$initVal, $v['agama_bapak']);
			$sheet->setCellValue('BO'.$initVal, $v['nama_bapak']);
			$sheet->setCellValue('BP'.$initVal, $v['ban']);
			$sheet->setCellValue('BQ'.$initVal, $v['nim']);
			$sheet->setCellValue('BR'.$initVal, $v['jenjang_pendidikan']);
			$sheet->setCellValue('BS'.$initVal, $v['nama_prodi']);
			$sheet->setCellValue('BT'.$initVal, $v['nama_pt']);
			$sheet->setCellValue('BU'.$initVal, $v['ipk']);
			$sheet->setCellValue('BV'.$initVal, $v['rata_rapor']);
			$sheet->setCellValue('BW'.$initVal, $v['dikum_akhir']);
			$sheet->setCellValue('BX'.$initVal, $v['jurusan']);
			$sheet->setCellValue('BY'.$initVal, $v['rata_un_sma']);
			$sheet->setCellValue('BZ'.$initVal, $v['thn_lulus_sma']);
			$sheet->setCellValue('CA'.$initVal, $v['sma_p']);
			$sheet->setCellValue('CB'.$initVal, $v['sma_k']);
			$sheet->setCellValue('CC'.$initVal, $v['nama_sma']);
			$sheet->setCellValue('CD'.$initVal, $v['rata_un_smp']);
			$sheet->setCellValue('CE'.$initVal, $v['thn_lulus_smp']);
			$sheet->setCellValue('CF'.$initVal, $v['smp_p']);
			$sheet->setCellValue('CG'.$initVal, $v['smp_k']);
			$sheet->setCellValue('CH'.$initVal, $v['nama_smp']);
			$sheet->setCellValue('CI'.$initVal, $v['rata_un_sd']);
			$sheet->setCellValue('CJ'.$initVal, $v['thn_lulus_sd']);
			$sheet->setCellValue('CK'.$initVal, $v['sd_p']);
			$sheet->setCellValue('CL'.$initVal, $v['sd_k']);
			$sheet->setCellValue('CM'.$initVal, $v['nama_sd']);
		}
		$writer = new Xlsx($s);
		$filename = 'REPORT-'.date('Ymdhis');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	function import()
	{
		$config['upload_path'] = './xlsx';
		$config['allowed_types'] = 'xlsx';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode(['msg' => 'Upload xlsx gagal', 'data' => $error]);
			return false;
		}
		else{
			$data = array('upload_data' => $this->upload->data());
		}

		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($data['upload_data']['full_path']);
		$spsdata = $spreadsheet->getActiveSheet()->toArray();
		foreach ($spsdata as $k => $v) {
			if($k > 0){
				$siswa['nik_siswa'] = $v[4];
				$siswa['nama_siswa'] = $v[5];
				$siswa['jk_siswa'] = $v[8];
				$siswa['no_hp_siswa'] = $v[14];
				$siswa['email_siswa'] = $v[15];
				$siswa['tinggi_siswa'] = $v[16];
				$siswa['berat_siswa'] = $v[17];
				$siswa['agama_siswa'] = $v[18];
				$siswa['suku_siswa'] = $v[19];
				$siswa['tempat_lahir'] = $v[20];
				$siswa['tanggal_lahir'] = $v[21];
				$siswa['golongan_darah'] = $v[22];
				$siswa['alamat_rumah'] = $v[23];

				$siswa_provinsi = $this->Main_model->find_prov($v[27]);
				$siswa_kabupaten_kota = $this->Main_model->find_kabupaten($siswa_provinsi->id, $v[26]);
				$siswa_kecamatan = $this->Main_model->find_kecamatan($siswa_kabupaten_kota->id, $v[25]);
				$siswa_kelurahan = $this->Main_model->find_kelurahan($siswa_kecamatan->id, $v[24]);

				$siswa['provinsi'] = $siswa_provinsi->id;
				$siswa['kabupaten_kota'] = $siswa_kabupaten_kota->id;
				$siswa['kecamatan'] = $siswa_kecamatan->id;
				$siswa['kelurahan'] = $siswa_kelurahan->id;

				$siswa['pekerjaan'] = $v[28];
				$siswa['status_kawin'] = $v[29];
				$siswa['tgl_ktp'] = $v[30];
				$siswa['bahasa_asing'] = $v[31];
				$siswa['bahasa_daerah'] = $v[32];
				$siswa['prestasi'] = $v[33];

				$siswa_asal_polda = $this->Main_model->find_polda($v[1]);
				$siswa_asal_polres = $this->Main_model->find_polres($siswa_asal_polda->id_polda, $v[2]);

				$siswa['asal_polda'] = $siswa_asal_polda->id_polda;
				$siswa['asal_polres'] = $siswa_asal_polres->id_polres;


				$pendidikan['ban'] = $v[67];
				$pendidikan['nim'] = $v[68];
				$pendidikan['jenjang_pendidikan'] = $v[69];
				$pendidikan['nama_prodi'] = $v[70];
				$pendidikan['nama_pt'] = $v[71];
				$pendidikan['ipk'] = $v[72];
				$pendidikan['rata_rapor'] = $v[73];
				$pendidikan['dikum_akhir'] = $v[74];
				$pendidikan['jurusan'] = $v[75];
				$pendidikan['rata_un_sma'] = $v[76];
				$pendidikan['thn_lulus_sma'] = $v[77];

				$pendidikan_provinsi_sma = $this->Main_model->find_prov($v[78]);
				$pendidikan['provinsi_sma'] = $pendidikan_provinsi_sma->id;
				$pendidikan_kab_kota_sma = $this->Main_model->find_kabupaten($pendidikan['provinsi_sma'], $v[79]);
				$pendidikan['kab_kota_sma'] = $pendidikan_kab_kota_sma->id;

				$pendidikan['nama_sma'] = $v[80];
				$pendidikan['rata_un_smp'] = $v[81];
				$pendidikan['thn_lulus_smp'] = $v[82];

				$pendidikan_provinsi_smp = $this->Main_model->find_prov($v[83]);
				$pendidikan['provinsi_smp'] = $pendidikan_provinsi_smp->id;
				$pendidikan_kab_kota_smp = $this->Main_model->find_kabupaten($pendidikan['provinsi_sma'], $v[84]);
				$pendidikan['kab_kota_smp'] = $pendidikan_kab_kota_smp->id;

				$pendidikan['nama_smp'] = $v[85];
				$pendidikan['rata_un_sd'] = $v[86];
				$pendidikan['thn_lulus_sd'] = $v[87];

				$pendidikan_provinsi_sd = $this->Main_model->find_prov($v[88]);
				$pendidikan['provinsi_sd'] = $pendidikan_provinsi_sd->id;
				$pendidikan_kab_kota_sd = $this->Main_model->find_kabupaten($pendidikan['provinsi_sd'], $v[89]);
				$pendidikan['kab_kota_sd'] = $pendidikan_kab_kota_sd->id;

				$pendidikan['nama_sd'] = $v[90];

				$seleksi['nosis_panjang'] = $v[3];
				$seleksi['jalur_seleksi'] = $v[6];
				$seleksi['diktuk_spn'] = $v[7];
				$seleksi['nilai_jasmani'] = $v[9];
				$seleksi['nilai_psi'] = $v[10];
				$seleksi['nilai_uji_akademik'] = $v[11];
				$seleksi['nilai_akhir'] = $v[13];

				// $seleksi['ranking'] = $v[];

				$wali['nama_wali'] = $v[44];
				$wali['agama_wali'] = $v[43];
				$wali['no_hp_wali'] = $v[42];
				$wali['kel_kerja_wali'] = $v[41];
				$wali['jns_kerja_wali'] = $v[40];
				$wali['gol_kerja_wali'] = $v[39];
				$wali['jabatan_wali'] = $v[38];
				$wali['nama_kantor_wali'] = $v[37];
				$wali['alamat_kantor_wali'] = $v[36];
				$wali['tgl_lahir_wali'] = $v[35];
				$wali['status_wali'] = $v[34];
				$wali['nama_ibu'] = $v[55];
				$wali['agama_ibu'] = $v[54];
				$wali['no_hp_ibu'] = $v[53];
				$wali['kel_kerja_ibu'] = $v[52];
				$wali['jns_kerja_ibu'] = $v[51];
				$wali['gol_kerja_ibu'] = $v[50];
				$wali['jabatan_ibu'] = $v[49];
				$wali['nama_kantor_ibu'] = $v[48];
				$wali['alamat_kantor_ibu'] = $v[47];
				$wali['tgl_lahir_ibu'] = $v[46];
				$wali['status_ibu'] = $v[45];
				$wali['nama_bapak'] = $v[66];
				$wali['agama_bapak'] = $v[65];
				$wali['no_hp_bapak'] = $v[64];
				$wali['kel_kerja_bapak'] = $v[63];
				$wali['jns_kerja_bapak'] = $v[62];
				$wali['gol_kerja_bapak'] = $v[61];
				$wali['jabatan_bapak'] = $v[60];
				$wali['nama_kantor_bapak'] = $v[59];
				$wali['alamat_kantor_bapak'] = $v[58];
				$wali['tgl_lahir_bapak'] = $v[57];
				$wali['status_bapak'] = $v[56];


				$siswa['pendidikan'] = $this->Main_model->insert_pendidikan($pendidikan);
				$siswa['wali'] = $this->Main_model->insert_wali($wali);
				$siswa['seleksi'] = $this->Main_model->insert_seleksi($seleksi);
				$trans = $this->Main_model->insert_siswa($siswa);
			}
		}

		if ($trans) {
			echo json_encode(['msg' => 'Operasi selesai', 'type' => 'success']);
		}else{
			echo json_encode(['msg' => 'Operasi gagal', 'type' => 'warning']);
		}
	}

	public function ijazah($data)
	{
		$siswa = $this->Siswa_model->detail_siswa($data);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $siswa['nosis_panjang'].'.pdf';
		$img = file_get_contents(base_url('assets/images/ijaza.jpg'));
		$type = 'jpg';
		$siswa['img'] = 'data:image/' . $type . ';base64,' . base64_encode($img);
		$this->pdf->load_view('page/siswa/ijazah', $siswa);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
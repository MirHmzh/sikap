<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('menu', 'presensi');
		$this->load->model('Siswa_model');
		$this->load->model('Presensi_model');
		$this->load->model('Nilai_model');
	}

	public function get_presensi()
	{
		$col[0] = 'pleton';
		$col[0] = 'tgl_presensi';
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
			'data' => $this->Presensi_model->get_presensi(),
		];
		echo json_encode($datas);
	}

	public function index()
	{
		$this->load->view('layout/base', ['content_view' => 'page/presensi/list']);
	}

	public function check($pleton = NULL, $tgl_checklist = NULL)
	{
		$master_nilai = $this->Presensi_model->get_jml_skor();
		if ($pleton && $tgl_checklist) {
			$presensi = $this->Presensi_model->find_presensi($pleton, $tgl_checklist);
			$mode = 'edit';
		}else{
			$presensi = [];
			$mode = 'create';
		}
		$this->load->view('layout/base', [
			'content_view' => 'page/presensi/check',
			'master_nilai' => $master_nilai,
			'data_presensi' => $presensi,
			'pleton' => $pleton,
			'tgl_checklist' => $tgl_checklist,
			'mode' => $mode
		]);
	}

	public function pleton_siswa()
	{
		$pleton = $this->input->post('pleton');
		$siswa = $this->Siswa_model->get_siswa_by_pleton($pleton);
		return $this->output->set_content_type('application/json')->set_output(json_encode($siswa));
	}

	public function pleton()
	{
		$pleton = $this->Siswa_model->get_pleton();
		$select2 = [];
		foreach ($pleton as $val) {
			$select2['results'][] = [
				'id' => $val->pleton,
				'text' => $val->pleton
			];
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($select2));
	}

	public function delete($pleton, $tgl_checklist)
	{
		$deletion = $this->Presensi_model->delete_presensi($pleton, $tgl_checklist);
		if ($deletion) {
			return $this->output->set_content_type('application/json')->set_output(json_encode([
				'msg' => 'Presensi terhapus'
			]));
		}else{
			return $this->output->set_content_type('application/json')->set_status_header(500)->set_output(json_encode([
				'msg' => 'Presensi gagal terhapus'
			]));
		}
	}

	public function save_check($pleton = NULL, $tgl_checklist = NULL)
	{
		if ($pleton && $tgl_checklist) {
			$delete_presensi = $this->Presensi_model->delete_presensi($pleton, $tgl_checklist);
		}
		$input_nilai = $this->input->post('nilai');
		$nilai = $this->Nilai_model->get_nilai_by_jml($input_nilai);

		$siswa = $this->input->post('id_siswa');
		$prestasi = $this->input->post('prestasi');
		$pelanggaran = $this->input->post('pelanggaran');
		$ranking = $this->input->post('ranking');

		$nilai_akhir_siswa = $nilai->konversi_nilai;
		$data_presensi = [];
		foreach ($siswa as $key_siswa => $val_siswa) {
			$data_presensi[] = [
				'id_siswa' => $key_siswa,
				'prestasi' => $prestasi[$key_siswa] ? $prestasi[$key_siswa] : 0,
				'pelanggaran' => $pelanggaran[$key_siswa] ? $pelanggaran[$key_siswa] : 0,
				'jml_skor' => $nilai->jml_skor,
				'ranking' => $ranking[$key_siswa],
				'nilai_akhir' => $nilai_akhir_siswa+(($prestasi[$key_siswa] ? $prestasi[$key_siswa] : 0)-($pelanggaran[$key_siswa] ? $pelanggaran[$key_siswa] : 0)),
				'nilai_info_1' => $nilai->nilai_info_1,
				'nilai_info_2' => $nilai->nilai_info_2,
				'nilai_info_3' => $nilai->nilai_info_3,
				'nilai_info_4' => $nilai->nilai_info_4,
				'nilai_info_5' => $nilai->nilai_info_5,
				'nilai_info_6' => $nilai->nilai_info_6,
				'nilai_info_7' => $nilai->nilai_info_7,
				'nilai_info_8' => $nilai->nilai_info_8,
				'nilai_info_9' => $nilai->nilai_info_9,
				'nilai_info_10' => $nilai->nilai_info_10,
				'nilai_info_11' => $nilai->nilai_info_11,
				'nilai_info_12' => $nilai->nilai_info_12,
				'nilai_info_13' => $nilai->nilai_info_13,
				'nilai_info_14' => $nilai->nilai_info_14,
				'nilai_info_15' => $nilai->nilai_info_15,
				'nilai_info_16' => $nilai->nilai_info_16,
				'nilai_info_17' => $nilai->nilai_info_17,
				'nilai_info_18' => $nilai->nilai_info_18,
				'nilai_info_19' => $nilai->nilai_info_19,
				'nilai_info_20' => $nilai->nilai_info_20,
				'nilai_info_21' => $nilai->nilai_info_21,
				'nilai_info_22' => $nilai->nilai_info_22,
				'nilai_info_23' => $nilai->nilai_info_23,
				'nilai_info_24' => $nilai->nilai_info_24,
				'nilai_info_25' => $nilai->nilai_info_25,
				'nilai_info_26' => $nilai->nilai_info_26,
				'nilai_info_27' => $nilai->nilai_info_27,
				'nilai_info_28' => $nilai->nilai_info_28,
				'nilai_info_29' => $nilai->nilai_info_29,
				'nilai_info_30' => $nilai->nilai_info_30,
				'nilai_info_31' => $nilai->nilai_info_31,
				'nilai_info_32' => $nilai->nilai_info_32,
				'nilai_info_33' => $nilai->nilai_info_33,
				'nilai_info_34' => $nilai->nilai_info_34,
				'nilai_info_35' => $nilai->nilai_info_35,
				'nilai_info_36' => $nilai->nilai_info_36,
				'nilai_info_37' => $nilai->nilai_info_37,
				'nilai_info_38' => $nilai->nilai_info_38,
				'nilai_info_39' => $nilai->nilai_info_39,
				'nilai_info_40' => $nilai->nilai_info_40
			];
		}
		$check = $this->db->insert_batch('tr_presensi', $data_presensi);
		if ($check) {
			return $this->output->set_content_type('application/json')->set_status_header(200)->set_output(json_encode([
				'msg' => 'Presensi sukses'
			]));
		}else{
			return $this->output->set_content_type('application/json')->set_status_header(500)->set_output(json_encode([
				'msg' => 'Presensi tidak sukses'
			]));
		}
	}

	public function export_daily($pleton, $tgl_checklist)
	{
		$s = new Spreadsheet();
		$sheet = $s->getActiveSheet();

		$center = array(
	        'alignment' => array(
	            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	        )
	    );

	    $sheet->mergeCells('A7:A10');
	    $sheet->getStyle("A7:A10")->applyFromArray($center);
	    $sheet->setCellValue('A7', 'NO');

	    $sheet->mergeCells('B7:B10');
	    $sheet->getStyle("B7:B10")->applyFromArray($center);
	    $sheet->setCellValue('B7', 'NAMA');

	    $sheet->mergeCells('C7:C10');
	    $sheet->getStyle("C7:C10")->applyFromArray($center);
	    $sheet->setCellValue('C7', 'NOSIS');

	    $sheet->mergeCells('D7:D10');
	    $sheet->getStyle("D7:D10")->applyFromArray($center);
	    $sheet->setCellValue('D7', 'Ranking');

	    $sheet->mergeCells('F7:AA7');
	    $sheet->getStyle("F7:AA7")->applyFromArray($center);
	    $sheet->setCellValue('F7', 'SKOR TIAP INDIKATOR YANG DIBERIKAN PENGASUH');

	    $sheet->mergeCells('F8:H9');
	    $sheet->getStyle("F8:H9")->applyFromArray($center);
	    $sheet->setCellValue('F8', 'MENTAL SPIRITUAL');
	    $sheet->setCellValue('F10', '1');
	    $sheet->setCellValue('G10', '2');
	    $sheet->setCellValue('H10', '3');
	    $sheet->getStyle('F10')->applyFromArray($center);
		$sheet->getStyle('G10')->applyFromArray($center);
		$sheet->getStyle('H10')->applyFromArray($center);

	    $sheet->mergeCells('I8:K9');
	    $sheet->getStyle("I8:K9")->applyFromArray($center);
	    $sheet->setCellValue('I8', 'MENTAL IDEOLOGI');
		$sheet->setCellValue('I10', '1');
	    $sheet->setCellValue('J10', '2');
	    $sheet->setCellValue('K10', '3');
	    $sheet->getStyle('I10')->applyFromArray($center);
		$sheet->getStyle('J10')->applyFromArray($center);
		$sheet->getStyle('K10')->applyFromArray($center);

	    $sheet->mergeCells('L8:O9');
	    $sheet->getStyle("L8:O9")->applyFromArray($center);
	    $sheet->setCellValue('L8', 'MENTAL KEJUANGAN');
	    $sheet->setCellValue('L10', '1');
	    $sheet->setCellValue('M10', '2');
	    $sheet->setCellValue('N10', '3');
	    $sheet->setCellValue('O10', '4');
	    $sheet->getStyle('L10')->applyFromArray($center);
		$sheet->getStyle('M10')->applyFromArray($center);
		$sheet->getStyle('N10')->applyFromArray($center);
		$sheet->getStyle('O10')->applyFromArray($center);

	    $sheet->mergeCells('P8:S9');
	    $sheet->getStyle("P8:S9")->applyFromArray($center);
	    $sheet->setCellValue('P8', 'WATAK PRIBADI');
	    $sheet->setCellValue('P10', '1');
	    $sheet->setCellValue('Q10', '2');
	    $sheet->setCellValue('R10', '3');
	    $sheet->setCellValue('S10', '4');
	    $sheet->getStyle('P10')->applyFromArray($center);
		$sheet->getStyle('Q10')->applyFromArray($center);
		$sheet->getStyle('R10')->applyFromArray($center);
		$sheet->getStyle('S10')->applyFromArray($center);

	    $sheet->mergeCells('T8:AA9');
	    $sheet->getStyle("T8:AA9")->applyFromArray($center);
	    $sheet->setCellValue('T8', 'MENTAL KEPEMIMPINAN');
	    $sheet->setCellValue('T10', '1');
	    $sheet->setCellValue('U10', '2');
	    $sheet->setCellValue('V10', '3');
	    $sheet->setCellValue('W10', '4');
	    $sheet->setCellValue('X10', '5');
	    $sheet->setCellValue('Y10', '6');
	    $sheet->setCellValue('Z10', '7');
	    $sheet->setCellValue('AA10', '8');
	    $sheet->getStyle('T10')->applyFromArray($center);
	    $sheet->getStyle('U10')->applyFromArray($center);
	    $sheet->getStyle('V10')->applyFromArray($center);
	    $sheet->getStyle('W10')->applyFromArray($center);
	    $sheet->getStyle('X10')->applyFromArray($center);
	    $sheet->getStyle('Y10')->applyFromArray($center);
	    $sheet->getStyle('Z10')->applyFromArray($center);
	    $sheet->getStyle('AA10')->applyFromArray($center);

	    $sheet->mergeCells('AB7:AB10');

	    $sheet->mergeCells('AC7:AC10');
	    $sheet->getStyle("AC7:AC10")->applyFromArray($center);
	    $sheet->setCellValue('AC7', 'Jum Skor');

	    $sheet->mergeCells('AD7:AD10');
	    $sheet->getStyle("AD7:AD10")->applyFromArray($center);
	    $sheet->setCellValue('AD7', 'Selisih');

	    $sheet->mergeCells('AE7:AF10');
	    $sheet->getStyle("AE7:AF10")->applyFromArray($center);
	    $sheet->setCellValue('AE7', 'SKOR RATA RATA');

	    $sheet->mergeCells('AG7:AH10');
	    $sheet->getStyle("AG7:AH10")->applyFromArray($center);
	    $sheet->setCellValue('AG7', 'NILAI KONVERSI');

	    $sheet->mergeCells('AI7:AJ9');
	    $sheet->getStyle("AI7:AJ9")->applyFromArray($center);
	    $sheet->setCellValue('AI7', 'PRESTASI/PELANGGARAN');
	    $sheet->getStyle('AI7')->getAlignment()->setWrapText(true);
	    $sheet->setCellValue('AI10', '+');
	    $sheet->setCellValue('AJ10', '-');
	    $sheet->getStyle('AI10')->applyFromArray($center);
		$sheet->getStyle('AJ10')->applyFromArray($center);

	    $sheet->mergeCells('AK7:AL10');
	    $sheet->getStyle("AK7:AL10")->applyFromArray($center);
	    $sheet->setCellValue('AK7', 'NILAI AKHIR');

	    $data = $this->Presensi_model->nilai_harian($pleton, $tgl_checklist);

	    $init = 10;
	    $inc = 0;
	    foreach ($data as $key => $val) {
	    	$init++; $inc++;
	    	$sheet->setCellValue('A'.$init, $inc);
	    	$sheet->setCellValue('B'.$init, $val['nama_siswa']);
	    	$sheet->setCellValue('C'.$init, $val['nosis_panjang']);
	    	$sheet->setCellValue('D'.$init, $val['ranking']);
	    	$sheet->setCellValue('F'.$init, $val['nilai_info_1']);
	    	$sheet->setCellValue('G'.$init, $val['nilai_info_2']);
	    	$sheet->setCellValue('H'.$init, $val['nilai_info_3']);
	    	$sheet->setCellValue('I'.$init, $val['nilai_info_4']);
	    	$sheet->setCellValue('J'.$init, $val['nilai_info_5']);
	    	$sheet->setCellValue('K'.$init, $val['nilai_info_6']);
	    	$sheet->setCellValue('L'.$init, $val['nilai_info_7']);
	    	$sheet->setCellValue('M'.$init, $val['nilai_info_8']);
	    	$sheet->setCellValue('N'.$init, $val['nilai_info_9']);
	    	$sheet->setCellValue('O'.$init, $val['nilai_info_10']);
	    	$sheet->setCellValue('P'.$init, $val['nilai_info_11']);
	    	$sheet->setCellValue('Q'.$init, $val['nilai_info_12']);
	    	$sheet->setCellValue('R'.$init, $val['nilai_info_13']);
	    	$sheet->setCellValue('S'.$init, $val['nilai_info_14']);
	    	$sheet->setCellValue('T'.$init, $val['nilai_info_15']);
	    	$sheet->setCellValue('U'.$init, $val['nilai_info_16']);
	    	$sheet->setCellValue('V'.$init, $val['nilai_info_17']);
	    	$sheet->setCellValue('W'.$init, $val['nilai_info_18']);
	    	$sheet->setCellValue('X'.$init, $val['nilai_info_19']);
	    	$sheet->setCellValue('Y'.$init, $val['nilai_info_20']);
	    	$sheet->setCellValue('Z'.$init, $val['nilai_info_21']);
	    	$sheet->setCellValue('AA'.$init, $val['nilai_info_22']);
	    	$sheet->setCellValue('AB'.$init, $val['jml_skor']);
	    	$sheet->setCellValue('AC'.$init, $val['jml_skor']);
	    	$sheet->setCellValue('AF'.$init, $val['rata_rata']);
	    	$sheet->setCellValue('AH'.$init, $val['konversi_nilai']);
	    	$sheet->setCellValue('AI'.$init, $val['prestasi']);
	    	$sheet->setCellValue('AJ'.$init, $val['pelanggaran']);
	    	$sheet->setCellValue('AL'.$init, (($val['prestasi']+$val['pelanggaran'])+$val['konversi_nilai']));
	    }

	    $writer = new Xlsx($s);
		$filename = 'NILAI_HARIAN-'.$tgl_checklist;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */
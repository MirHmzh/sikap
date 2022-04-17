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

	public function get_pleton()
	{
		$pleton = $this->Presensi_model->get_pleton();
		echo json_encode($pleton);
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

	public function cek()
	{
		$awal = DateTime::createFromFormat('Y-m-d', '2022-01-01');
		$date_present = DateTime::createFromFormat('Y-m-d', '2022-03-22');
		echo ceil(($date_present->getTimestamp() - $awal->getTimestamp()) / (60 * 60 * 24 * 7));
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

	    $sheet->mergeCells('E7:Z7');
	    $sheet->getStyle("E7:Z7")->applyFromArray($center);
	    $sheet->setCellValue('E7', 'SKOR TIAP INDIKATOR YANG DIBERIKAN PENGASUH');

	    $sheet->mergeCells('E8:G9');
	    $sheet->getStyle("E8:G9")->applyFromArray($center);
	    $sheet->setCellValue('E8', 'MENTAL SPIRITUAL');
	    $sheet->setCellValue('E10', '1');
	    $sheet->setCellValue('F10', '2');
	    $sheet->setCellValue('G10', '3');
	    $sheet->getStyle('E10')->applyFromArray($center);
		$sheet->getStyle('F10')->applyFromArray($center);
		$sheet->getStyle('G10')->applyFromArray($center);

	    $sheet->mergeCells('H8:J9');
	    $sheet->getStyle("H8:J9")->applyFromArray($center);
	    $sheet->setCellValue('H8', 'MENTAL IDEOLOGI');
		$sheet->setCellValue('H10', '1');
	    $sheet->setCellValue('I10', '2');
	    $sheet->setCellValue('J10', '3');
	    $sheet->getStyle('H10')->applyFromArray($center);
		$sheet->getStyle('I10')->applyFromArray($center);
		$sheet->getStyle('J10')->applyFromArray($center);

	    $sheet->mergeCells('K8:N9');
	    $sheet->getStyle("K8:N9")->applyFromArray($center);
	    $sheet->setCellValue('K8', 'MENTAL KEJUANGAN');
	    $sheet->setCellValue('K10', '1');
	    $sheet->setCellValue('L10', '2');
	    $sheet->setCellValue('M10', '3');
	    $sheet->setCellValue('N10', '4');
	    $sheet->getStyle('K10')->applyFromArray($center);
		$sheet->getStyle('L10')->applyFromArray($center);
		$sheet->getStyle('M10')->applyFromArray($center);
		$sheet->getStyle('N10')->applyFromArray($center);

	    $sheet->mergeCells('O8:R9');
	    $sheet->getStyle("O8:R9")->applyFromArray($center);
	    $sheet->setCellValue('O8', 'WATAK PRIBADI');
	    $sheet->setCellValue('O10', '1');
	    $sheet->setCellValue('P10', '2');
	    $sheet->setCellValue('Q10', '3');
	    $sheet->setCellValue('R10', '4');
	    $sheet->getStyle('O10')->applyFromArray($center);
		$sheet->getStyle('P10')->applyFromArray($center);
		$sheet->getStyle('Q10')->applyFromArray($center);
		$sheet->getStyle('R10')->applyFromArray($center);

	    $sheet->mergeCells('S8:Z9');
	    $sheet->getStyle("S8:Z9")->applyFromArray($center);
	    $sheet->setCellValue('S8', 'MENTAL KEPEMIMPINAN');
	    $sheet->setCellValue('S10', '1');
	    $sheet->setCellValue('T10', '2');
	    $sheet->setCellValue('U10', '3');
	    $sheet->setCellValue('V10', '4');
	    $sheet->setCellValue('W10', '5');
	    $sheet->setCellValue('X10', '6');
	    $sheet->setCellValue('Y10', '7');
	    $sheet->setCellValue('Z10', '8');
	    $sheet->getStyle('S10')->applyFromArray($center);
	    $sheet->getStyle('T10')->applyFromArray($center);
	    $sheet->getStyle('U10')->applyFromArray($center);
	    $sheet->getStyle('V10')->applyFromArray($center);
	    $sheet->getStyle('W10')->applyFromArray($center);
	    $sheet->getStyle('X10')->applyFromArray($center);
	    $sheet->getStyle('Y10')->applyFromArray($center);
	    $sheet->getStyle('Z10')->applyFromArray($center);

	    $sheet->mergeCells('AA7:AA10');

	    $sheet->mergeCells('AA7:AA10');
	    $sheet->getStyle("AA7:AA10")->applyFromArray($center);
	    $sheet->setCellValue('AA7', 'Jum Skor');

	    $sheet->mergeCells('AB7:AB10');
	    $sheet->getStyle("AB7:AB10")->applyFromArray($center);
	    $sheet->setCellValue('AB7', 'Selisih');

	    // $sheet->mergeCells('AE7:AF10');
	    // $sheet->getStyle("AE7:AF10")->applyFromArray($center);
	    // $sheet->setCellValue('AE7', 'SKOR RATA RATA');

	    $sheet->mergeCells('AC7:AD10');
	    $sheet->getStyle("AC7:AD10")->applyFromArray($center);
	    $sheet->setCellValue('AC7', 'NILAI KONVERSI');

	    $sheet->mergeCells('AE7:AF9');
	    $sheet->getStyle("AE7:AF9")->applyFromArray($center);
	    $sheet->setCellValue('AE7', 'PRESTASI/PELANGGARAN');
	    $sheet->getStyle('AE7')->getAlignment()->setWrapText(true);
	    $sheet->setCellValue('AE10', '+');
	    $sheet->setCellValue('AF10', '-');
	    $sheet->getStyle('AE10')->applyFromArray($center);
		$sheet->getStyle('AF10')->applyFromArray($center);

	    // $sheet->mergeCells('AK7:AL10');
	    // $sheet->getStyle("AK7:AL10")->applyFromArray($center);
	    // $sheet->setCellValue('AK7', 'NILAI AKHIR');

	    $data = $this->Presensi_model->nilai_harian($pleton, $tgl_checklist);

	    $init = 10;
	    $inc = 0;
	    foreach ($data as $key => $val) {
	    	$init++; $inc++;
	    	$sheet->setCellValue('A'.$init, $inc);
	    	$sheet->setCellValue('B'.$init, $val['nama_siswa']);
	    	$sheet->setCellValue('C'.$init, $val['nosis_panjang']);
	    	$sheet->setCellValue('D'.$init, $val['ranking']);
	    	$sheet->setCellValue('E'.$init, $val['nilai_info_1']);
	    	$sheet->setCellValue('F'.$init, $val['nilai_info_2']);
	    	$sheet->setCellValue('G'.$init, $val['nilai_info_3']);
	    	$sheet->setCellValue('H'.$init, $val['nilai_info_4']);
	    	$sheet->setCellValue('I'.$init, $val['nilai_info_5']);
	    	$sheet->setCellValue('J'.$init, $val['nilai_info_6']);
	    	$sheet->setCellValue('K'.$init, $val['nilai_info_7']);
	    	$sheet->setCellValue('L'.$init, $val['nilai_info_8']);
	    	$sheet->setCellValue('M'.$init, $val['nilai_info_9']);
	    	$sheet->setCellValue('N'.$init, $val['nilai_info_10']);
	    	$sheet->setCellValue('O'.$init, $val['nilai_info_11']);
	    	$sheet->setCellValue('P'.$init, $val['nilai_info_12']);
	    	$sheet->setCellValue('Q'.$init, $val['nilai_info_13']);
	    	$sheet->setCellValue('R'.$init, $val['nilai_info_14']);
	    	$sheet->setCellValue('S'.$init, $val['nilai_info_15']);
	    	$sheet->setCellValue('T'.$init, $val['nilai_info_16']);
	    	$sheet->setCellValue('U'.$init, $val['nilai_info_17']);
	    	$sheet->setCellValue('V'.$init, $val['nilai_info_18']);
	    	$sheet->setCellValue('W'.$init, $val['nilai_info_19']);
	    	$sheet->setCellValue('X'.$init, $val['nilai_info_20']);
	    	$sheet->setCellValue('Y'.$init, $val['nilai_info_21']);
	    	$sheet->setCellValue('Z'.$init, $val['nilai_info_22']);
	    	$sheet->setCellValue('AA'.$init, $val['jml_skor']);
	    	$sheet->setCellValue('AB'.$init, $val['jml_skor']);
	    	// $sheet->setCellValue('AF'.$init, $val['rata_rata']);
	    	$sheet->setCellValue('AD'.$init, $val['konversi_nilai']);
	    	$sheet->setCellValue('AE'.$init, $val['prestasi']);
	    	$sheet->setCellValue('AF'.$init, $val['pelanggaran']);
	    	// $sheet->setCellValue('AL'.$init, (($val['prestasi']+$val['pelanggaran'])+$val['konversi_nilai']));
	    }

	    $writer = new Xlsx($s);
		$filename = 'NILAI_HARIAN-'.$tgl_checklist;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function export_weekly($pleton, $week)
	{
		$start_date = date("Y-m-d", strtotime($week));
		$end_date = date("Y-m-d", strtotime($week.'+6 days'));

		$data_presensi = $this->Presensi_model->nilai_mingguan($pleton, $start_date, $end_date);

		$presensi = [];
		foreach ($data_presensi as $k => $v) {
			$presensi[$v['id_siswa']]['nama'] = $v['nama_siswa'];
			$presensi[$v['id_siswa']]['nosis'] = $v['nosis_panjang'];
			$day_presensi = DateTime::createFromFormat('Y-m-d', $v['tgl_checklist']);
			switch ($day_presensi->format('D')) {
				case 'Mon':
					$presensi[$v['id_siswa']]['nilai'][0] = $v['nilai_akhir'];
					break;
				case 'Tue':
					$presensi[$v['id_siswa']]['nilai'][1] = $v['nilai_akhir'];
					break;
				case 'Wed':
					$presensi[$v['id_siswa']]['nilai'][2] = $v['nilai_akhir'];
					break;
				case 'Thu':
					$presensi[$v['id_siswa']]['nilai'][3] = $v['nilai_akhir'];
					break;
				case 'Fri':
					$presensi[$v['id_siswa']]['nilai'][4] = $v['nilai_akhir'];
					break;
				case 'Sat':
					$presensi[$v['id_siswa']]['nilai'][5] = $v['nilai_akhir'];
					break;
				case 'Sun':
					$presensi[$v['id_siswa']]['nilai'][6] = $v['nilai_akhir'];
					break;

				default:
					# code...
					break;
			}
		}

		$s = new Spreadsheet();
		$sheet = $s->getActiveSheet();

		$center = array(
	        'alignment' => array(
	            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
	            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
	        )
	    );

	    $sheet->mergeCells('A1:D1');
	    $sheet->getStyle("A1:D1")->applyFromArray($center);
	    $sheet->setCellValue('A1', 'KEPOLISIAN NEGARA REPUBLIK INDONESIA');

	    $sheet->mergeCells('A2:D2');
	    $sheet->getStyle("A2:D2")->applyFromArray($center);
	    $sheet->setCellValue('A2', 'DAERAH JAWA TIMUR');

	    $sheet->mergeCells('A3:D3');
	    $sheet->getStyle("A3:D3")->applyFromArray($center);
	    $sheet->setCellValue('A3', 'SEKOLAH POLISI NEGARA');

	    $sheet->mergeCells('A7:N7');
	    $sheet->getStyle("A7:N7")->applyFromArray($center);
	    $sheet->setCellValue('A7', 'LEMBAR PENILAIAN MK MINGGUAN');

	    $sheet->mergeCells('A8:N8');
	    $sheet->getStyle("A8:N8")->applyFromArray($center);
	    $sheet->setCellValue('A8', 'SISWA DIKTUK POLRI T.A '.date('Y'));

	    $sheet->mergeCells('A11:B11');
	    $sheet->getStyle("A11:B11")->applyFromArray($center);
	    $sheet->setCellValue('A11', 'PELETON : '.$pleton);

	    $sheet->mergeCells('A16:A17');
	    $sheet->getStyle("A16:A17")->applyFromArray($center);
	    $sheet->setCellValue('A16', 'NO');

	    $sheet->mergeCells('B16:B17');
	    $sheet->getStyle("B16:B17")->applyFromArray($center);
	    $sheet->setCellValue('B16', 'NAMA');

	    $sheet->mergeCells('C16:C17');
	    $sheet->getStyle("C16:C17")->applyFromArray($center);
	    $sheet->setCellValue('C16', 'NOSIS');

	    $sheet->getStyle("D16")->applyFromArray($center);
	    $sheet->setCellValue('D16', 'NILAI');

	    $sheet->mergeCells('E16:K16');
	    $sheet->getStyle("E16:K16")->applyFromArray($center);
	    $sheet->setCellValue('E16', 'NILAI HARIAN');

	    $sheet->getStyle("E17")->applyFromArray($center);
	    $sheet->setCellValue('E17', 'SN');

	    $sheet->getStyle("F17")->applyFromArray($center);
	    $sheet->setCellValue('F17', 'SL');

	    $sheet->getStyle("G17")->applyFromArray($center);
	    $sheet->setCellValue('G17', 'RB');

	    $sheet->getStyle("H17")->applyFromArray($center);
	    $sheet->setCellValue('H17', 'KM');

	    $sheet->getStyle("I17")->applyFromArray($center);
	    $sheet->setCellValue('I17', 'JM');

	    $sheet->getStyle("J17")->applyFromArray($center);
	    $sheet->setCellValue('J17', 'SB');

	    $sheet->getStyle("K17")->applyFromArray($center);
	    $sheet->setCellValue('K17', 'MG');

	    $sheet->getStyle("L16")->applyFromArray($center);
	    $sheet->setCellValue('L16', 'NILAI');

	    $sheet->getStyle("M16")->applyFromArray($center);
	    $sheet->setCellValue('M16', 'RANK');

	    $sheet->getStyle("M17")->applyFromArray($center);
	    $sheet->setCellValue('M17', 'SATUAN');

	    $sheet->getStyle("N16")->applyFromArray($center);
	    $sheet->setCellValue('N16', 'KETERANGAN');

	    $init = 1;
	    $early = 18;
	    foreach ($presensi as $k => $v) {

	    	$sheet->getStyle("A$early")->applyFromArray($center);
	    	$sheet->setCellValue("A$early", $init);

	    	$sheet->getStyle("B$early")->applyFromArray($center);
	    	$sheet->setCellValue("B$early", $v['nama']);

	    	$sheet->getStyle("C$early")->applyFromArray($center);
	    	$sheet->setCellValue("C$early", $v['nosis']);

	    	$sheet->getStyle("E$early")->applyFromArray($center);
	    	$sheet->setCellValue("E$early", (isset($v['nilai'][0]) ? $v['nilai'][0] : ''));

	    	$sheet->getStyle("F$early")->applyFromArray($center);
	    	$sheet->setCellValue("F$early", (isset($v['nilai'][1]) ? $v['nilai'][1] : ''));

	    	$sheet->getStyle("G$early")->applyFromArray($center);
	    	$sheet->setCellValue("G$early", (isset($v['nilai'][2]) ? $v['nilai'][2] : ''));

	    	$sheet->getStyle("H$early")->applyFromArray($center);
	    	$sheet->setCellValue("H$early", (isset($v['nilai'][3]) ? $v['nilai'][3] : ''));

	    	$sheet->getStyle("I$early")->applyFromArray($center);
	    	$sheet->setCellValue("I$early", (isset($v['nilai'][4]) ? $v['nilai'][4] : ''));

	    	$sheet->getStyle("J$early")->applyFromArray($center);
	    	$sheet->setCellValue("J$early", (isset($v['nilai'][5]) ? $v['nilai'][5] : ''));

	    	$sheet->getStyle("K$early")->applyFromArray($center);
	    	$sheet->setCellValue("K$early", (isset($v['nilai'][6]) ? $v['nilai'][6] : ''));

	    	$nilai_c = 0; $nilai_sum = 0;
	    	foreach ($v['nilai'] as $key => $val) {
	    		$nilai_c++;
	    		$nilai_sum += $val;
	    	}

	    	$sheet->getStyle("L$early")->applyFromArray($center);
	    	$sheet->setCellValue("L$early", $nilai_sum/$nilai_c);
	    	$early++;
	    	$init++;
	    }

	    $writer = new Xlsx($s);
		$filename = 'NILAI_MINGGUAN-'.$week;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

	}

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */
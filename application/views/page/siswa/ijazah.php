<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	@page{
		margin: 0;
	}
	body{
		margin: 0;
		font-family: "Times New Roman", Times, serif;
	}
	#nama_siswa{
		position: absolute;
		top: 18.8em;
		left: 19.5em;
		font-size: 1em;
	}
	#pangkat{
		position: absolute;
		top: 20.7em;
		left: 19.5em;
		font-size: 1em;
	}
	#tempatlahir{
		position: absolute;
		top: 22.6em;
		left: 19.5em;
		font-size: 1em;
	}
	#tgllahir{
		position: absolute;
		top: 24.4em;
		left: 19.5em;
		font-size: 1em;
	}
	#nosis{
		position: absolute;
		top: 26.3em;
		left: 19.5em;
		font-size: 1em;
	}
	#bg_ijazah{
		position: absolute;
		margin: 0;
		width: 50em;
	}
</style>
<body>
	<img id="bg_ijazah" src="<?= $img ?>" alt="">
	<h4 id="nama_siswa"><?= strtoupper($nama_siswa) ?></h4>
	<h4 id="pangkat"><?= $nosis_panjang ?></h4>
	<?php
		$month = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
		$rawdate = strtotime($tanggal_lahir);
		$date = date('d', $rawdate);
		$mon = date('m', $rawdate);
		$year = date('Y', $rawdate);
	?>
	<h4 id="tempatlahir"><?= strtoupper($tempat_lahir." /") ?></h4>
	<h4 id="tgllahir"><?= $date." ".$month[$mon]." ".$year ?></h4>
	<h4 id="nosis"><?= $nosis_panjang ?></h4>
</body>
</html>
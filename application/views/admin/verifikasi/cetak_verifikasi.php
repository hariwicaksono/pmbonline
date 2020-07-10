<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Kartu</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"> -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style type="text/css">

	@page {

  	margin-top: 3cm;

	margin-bottom: 1.5cm;

	header: myHeader1;

	/*footer: myFooter;*/

	}
	
	td {
	    padding-top: .20em;
	    padding-bottom: .20em;
	}
	</style>
</head>

<body>
<htmlpageheader name="myHeader1" style="display:none">
	<table width="100%" style="border-bottom: 2px solid #000000; vertical-align: top; font-family:
		serif; font-size: 9pt; color: #111;"><tr>		
		<td width="20%" align="center">
		<div>
			<img src="<?=base_url('assets/images/').$site_logo;?>" width="55px" />
		</div></td>
		<td width="80%" style="text-align: left;">
			<h2><strong><?php echo $site_title;?></strong></h2>
			<h4>KARTU PESERTA UJIAN</h4>
			
		</td>
	</tr>
	</table>
</htmlpageheader>
	<div class="container">
			<table width="100%" style="text-align: left; vertical-align: top; font-family border-spacing: 5px:
			serif; font-size: 10pt; color: #111;">
			<tr>		
				<td width="20%">
					<p>Nama Lengkap</p>
					<p>Tanggal lahir</p>
					<p>Alamat</p>
					<p>Sekolah Asal</p>
					<p>Prodi Pilihan</p>
					<p>Lokasi Ujian</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>Staff/Petugas</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>Administrasi</p>
				</td>
				<td width="60%">
					<p>: <?=$data->nama_pendaftar ?></p>
					<p>: <?=$data->tgl_lahir ?></p>
					<p>: <?=$data->alamat ?></p>
					<p>: <?=$data->sekolah ?></p>
					<p>: <?=$data->jenjang ?> <?=$data->nama_prodi ?></p>
					<p>: <?php echo $site_title;?></p>
					<p>&nbsp;&nbsp;<?php echo $site_address;?></p>
					<p>&nbsp;</p>
					
				</td>
				<td width="20%" style="text-align: center;vertical-align: top;font-size: 10pt;"> 
					<img src="<?=base_url('photo/'.$data->foto.'') ?>" style="border:1px  solid #000000;" width="80px" />
					<p>&nbsp;</p>
					<strong>Pendaftar</strong><br>
					<br>&nbsp;
					<br>&nbsp;
					<br>&nbsp;
					<strong><?=$data->nama_pendaftar ?></strong>
				</td>
			</tr>
			</table>
		<p>&nbsp;</p>
		<div class="alert alert-info">
			<p>* Cetaklah Kertu ini dengan printer berwarna.<br>
				* Ketika Ujian ,Anda Perlu membawa kartu ujian asli hasil verifikasi,kartu identitas asli dan perlengkapan tulis ( Bollpoint, Pensil 2B, Penghapus, Rautan ,dll).</p>
		</div>
	</div>
	<p>------------------------------------------------------------Potong disini------------------------------------------------------------------------</p>
	

</body>
</html>
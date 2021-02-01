<!DOCTYPE html>
<html> 
<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Kartu</title>

    <style type="text/css">
	@page {
  	margin-top: 1.5cm;
	  margin-left: 1.5cm;
	margin-bottom: 1.5cm;
	}

	h1, h2, h3, h4, h5, h6, p {
   margin: 0;
   padding: 0;
}
	 
	td {
	    padding-top: .20em;
	    padding-bottom: .20em;
	}

	.table {
  	border-collapse: collapse;
	}

	.table td, th {
	border: 1px solid #999;
	padding: 0.5rem;
	}

	</style>
</head>

<body>
<htmlpageheader name="myHeader1">
	<table width="100%" style="border-bottom: 2px solid #000000; vertical-align: top; font-family:
		serif; font-size: 9pt; color: #111;"><tr>		
		<td width="20%" align="center">
		<div>
			<img src="<?=base_url('assets/images/').$site_logo;?>" width="80px" />
		</div></td>
		<td width="80%" style="text-align: left;">
			<h1><strong><?php echo $site_title;?></strong></h1>
			<h2>KARTU PESERTA UJIAN</h2>
			
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
				</td>
				<td width="80%">
					<p>: <?=$data->nama_pendaftar ?></p>	
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<p>Tanggal lahir</p>
				</td>
				<td width="80%">
					<p>: <?=$data->tgl_lahir ?></p>	
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<p>Alamat</p>
				</td>
				<td width="80%">
					<p>: <?=$data->alamat ?></p>	
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<p>Sekolah Asal</p>
				</td>
				<td width="80%">
					<p>: <?=$data->sekolah ?></p>	
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<p>Prodi Pilihan</p>
				</td>
				<td width="80%">
					<p>: <?=$data->jenjang ?> <?=$data->nama_prodi ?></p>	
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<p>Lokasi Ujian</p>
				</td>
				<td width="80%">
					<p>: <?php echo $site_title;?><br/><?php echo $site_address;?></p>	
				</td>
			</tr>
			<tr>

				<td width="20%" style="text-align: center;vertical-align: top;">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>Staff/Petugas</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>(.....................................................)</p>
					<p>&nbsp;</p>
				</td>

				<td width="20%" style="text-align:right">
				<img src="<?=base_url('photo/'.$data->foto.'') ?>" style="border:1px  solid #000000;" width="80px" />
				</td>

				<td width="60%" style="text-align: center;vertical-align: top;font-size: 11pt;"> 
					
					<p>&nbsp;</p>
					<strong>Pendaftar</strong><br>
					<br>&nbsp;
					<br>&nbsp;
					<br>&nbsp;
					<br>&nbsp;
					<strong><?=$data->nama_pendaftar ?></strong>
				</td>
			</tr>
			</table>

		<div style="border: 1px solid #222; padding: 10px 10px;margin-bottom: 10px;font-size: 10pt;">
			<p>* Cetaklah Kartu ini dengan printer berwarna.<br>
				* Ketika Ujian, Anda Perlu membawa kartu ujian asli hasil verifikasi, kartu identitas asli dan perlengkapan tulis (Bollpoint, Pensil 2B, Penghapus, Rautan, dll).</p>
		</div>
	</div>
	<p style="text-align: center">----------------------------------------Potong disini--------------------------------------------</p>
	

</body>
</html>
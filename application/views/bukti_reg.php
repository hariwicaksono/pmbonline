<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bukti Pendaftaran</title>

    <style type="text/css">
	@page {
  	margin-top: 1.5cm;
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
	padding: 0.2rem;
	}

	</style>
</head>

<body>
<htmlpageheader name="myHeader1">
	<table width="100%" style="border-bottom: 2px solid #000000; vertical-align: top; font-family:
		serif; font-size: 10pt; color: #111;margin-bottom: 10px"><tr>		
		<td width="20%" align="center">
		<div>
			<img src="<?=base_url('assets/images/').$row->site_logo;?>" width="80px" />
		</div></td>
		<td width="80%" style="text-align: left;">
			<h1><strong><?=$row->site_title;?></strong></h1>
			<p><?=$row->site_address;?> Telp. <?=$row->site_phone;?> email: <?=$row->site_email;?></p>
		</td>
	</tr>
	</table>
</htmlpageheader>

	<div class="container">
			<table width="100%" style="text-align: left; vertical-align: top; font-family border-spacing: 5px:
			serif; font-size: 15pt; color: #111;">
			<tr>		
				<td width="80%">
				<h3><strong>Bukti Pendaftaran Mahasiswa Baru</strong></h3>
				<h4>Tahun Akademik <?=$data->tahun_ajaran ?></h4>
				</td>
				<td width="20%">
					
				</td>
			</tr>
			</table>
			&nbsp;
		<table width="100%" style="vertical-align: top; font-family:
			serif; font-size: 12pt; color: #111;">
			<tr>		
				<td width="20%">
					<strong>Nama</strong>
				</td>
				<td width="80%">
					: <?=$data->nama_pendaftar ?>
				</td>
			</tr>
			
			<tr>		
				<td width="20%">
					<strong>NISN </strong>
				</td>
				<td width="80%">
					: <?=$data->nisn ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Agama </strong>
				</td>
				<td width="80%">
					: <?=$data->agama ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Jenis Kelamin </strong>
				</td>
				<td width="80%">
					: <?php if ($data->jkel == 'L'): ?>
						LAKI-LAKI
						<?php else: ?>
						PEREMPUAN
					<?php endif ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Tanggal Lahir </strong>
				</td>
				<td width="80%">
					: <?=date('d-m-Y', strtotime($data->tgl_lahir)); ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Alamat </strong>
				</td>
				<td width="80%">
					: <?=$data->alamat ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Telp/Hp </strong>
				</td>
				<td width="80%">
					: <?=$data->no_hp ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Email </strong>
				</td>
				<td width="80%">
					: <?=$data->email ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Asal Sekolah </strong>
				</td>
				<td width="80%">
					: <?=$data->sekolah ?> , <?=$data->kota ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Nilai UN </strong>
				</td>
				<td width="80%">
					: <?=$data->nilai_un ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Prodi Pilihan </strong>
				</td>
				<td width="80%">
					: <?=$data->jenjang ?> <?=$data->nama_prodi ?>
				</td>
			</tr>		
		</table>

		<p>&nbsp;</p>

		<h4 style="margin-bottom: 5px">Jadwal Test</h4>

		<table class="table" width="100%">
			<thead>
				<tr>
					<th>Tes</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Tempat</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($jadwal): ?>
				<?php foreach ($jadwal as $tes): ?>
					<tr>
				        <td><?=$tes->nama_tes?></td>
				        <td><?=date('d-m-Y', strtotime($tes->tgl_tes)); ?></td>
				       <td><?=$tes->mulai?> <strong>s/d</strong> <?=$tes->sampai?> </td>
				        <td>Kampus <?php echo $row->site_title;?></td>
				    </tr>
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="4">Tidak Ada Tes</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>

		<p>&nbsp;</p>

		<div style="font-size: 9pt">
			<p>* Dengan ini saya menyatakan bahwa data yang saya masukan adalah benar.<br>
				* Harap melakukan Verifikasi di Kampus <?php echo $row->site_title;?> sebelum tes berlangsung.<br>
				* Berkas yang harus dibawa saat verifikasi : </p>
			<ul>
				<li>Bukti Pendafatran</li>
				<li>Pass Poto 3x4 ( 4 Lembar )</li>
				<li>Foto Copy Ijazah Asli/Sementara</li>
				<li>Foto Copy SKHUN Asli/Sementara</li>
				<li>Membayar biaya pendaftaran Rp. <?=number_format($row->site_biaya);?></li>
			</ul>
		</div>

		<table width="100%" style="vertical-align: top; font-family:
			serif; font-size: 12pt; color: #111;">
		<tr>		
				<td width="68%" align="right">
					<img src="<?=base_url('photo/'.$data->foto.'') ?>" style="border:1px  solid #000000;" width="100px" />
				</td>
				<td width="32%" align="center">
				<strong>Pendaftar</strong><br>
				<br>&nbsp;
				<br>&nbsp;
				<br>&nbsp;
				<br>&nbsp;
				<strong><?=$data->nama_pendaftar ?></strong>
				</td>
			</tr>		
		</table>


	</div>
	

</body>
</html>
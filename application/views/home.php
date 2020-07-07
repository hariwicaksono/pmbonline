<?php echo $header;?>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <?php echo $navbar;?>					

    <section id="intro" class="intro-section">
        <div class="container">
		
        	<div class="page-header">
			<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				Penerimaan Mahasiswa Baru Tahun Akademik <?=$thak->tahun_ajaran ?>
			</div>
			</div>
			 <?php echo $this->session->flashdata('error_daftar'); ?>
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-8">
                  
                </div>
               
                <div class="col-md-4">
                	<h3></h3>
					<div class="panel panel-primary">
	                    <div class="panel-heading">
	                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Informasi Terbaru</h3>
	                    </div>
	                    <div class="panel-body">
	                        <ul id="gulung">
	                        <?php if ($informasi): ?>

	                        	 <?php foreach ($informasi as $info):
	                        		 $d=date('Y-m-d',strtotime($info->created_at));
	                        		 
	                        		 $date=date_create($d);
	                        		$n=date('Y-m-d');
	                        		 $now=date_create($n);
	                        		$diff=date_diff($date,$now);
		                       		
	                        		if ($diff->d < 1) {
	                        			$label='<label class="label label-success">Baru</label>';
	                        		}else{
	                        			$label='';
	                        		}
	                        	  ?>
	                        	 	<li class="news-item"><?=$label  ?><p><?=$info->info ?></p></li>
	                        	 <?php endforeach ?>

	                        <?php else: ?>
	                        	<li class="news-item"><p>Tidak Ada Informasi Terbaru</p></li>	
	                        <?php endif ?>
                 
	                        </ul>
	                    </div>
	                    <div class="panel-footer"></div>
               		</div>

                    <a class="btn btn-info page-scroll" href="#about">Prodi Pilihan</a>
					<a class="btn btn-danger page-scroll" href="#services"><i class="fa fa-fw fa-send-o"></i> Daftar Sekarang !</a> 
				</div><!-- /col-lg-4 -->
            </div>
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
					<div class="col-lg-6">
						
					</div>
					<div class="col-lg-6">
						
					</div>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="alur-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
                <h1>Alur Pendaftaran</h1>
                <img src="<?=base_url('assets/alur.png')  ?>" class="img-responsive img-thumbnail" alt="">
                </div>
            </div>
            <div class="row">
            <h3>Jadwal Tes</h3>
            	<div class="col-md-10 col-md-offset-1">
            		<table class="table table-bordered">
            			<thead>
            				<tr class="info">
            					<th style="text-align: center;">TES</th>
            					<th style="text-align: center;">Tanggal Tes</th>
            					<th style="text-align: center;">Waktu</th>
            					<th style="text-align: center;">Keterangan</th>
            				</tr>
            			</thead>
            			<tbody>
            			<?php if ($jadwal_tes): ?>
            					<?php foreach ($jadwal_tes as $tes): ?>
            						<tr>
								        <td><?=$tes->nama_tes?></td>
								        <td><?=$tes->tgl_tes?></td>
								       <td><?=$tes->mulai?> <strong>s/d</strong><?=$tes->sampai?> </td>
								        <td><?=$tes->ket?></td>
								    </tr>
								<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4">Tidak Ada Tes</td>
							</tr>
						<?php endif; ?>
            				
            			</tbody>
					</table>
            	</div>	
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <h1>Formulir Pendaftaran</h1>
                	<?php if ($cek_reg === 'Ditutup'): ?>

					      <div class="alert alert-danger">
			                <h3><i class="icon fa fa-4x fa-warning"></i><br><strong>Maaf, Pendaftaran Belum Dibuka atau Sudah Ditutup!</strong></h3>
			                <h2>Come Back Soon !<i class="fa fa-fw fa-frown-o"></i> </h2>
			              </div>

					<?php else: ?>
					<hr>
					<p>&nbsp;</p>
					<?=form_open_multipart('home/daftar','class="form-horizontal"') ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">NISN</label>
							<div class="col-sm-6">
								<input type="text" name="nisn" class="form-control" placeholder="NISN" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-2">
								<select class="form-control" name="agama" required>
									<option>Islam</option>
									<option>Kristen</option>
									<option>Katolik</option>
									<option>Hindu</option>
									<option>Budha</option>
								</select>
							</div>
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-4" style="text-align:left">
								<div class="radio" required>
									<label>
										<input type="radio" name="jenisKelamin" value="L" checked>
										Laki-laki
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="jenisKelamin" value="P">
										Perempuan
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-2">
								<input type="" class="form-control date-picker" name="tgl_lahir" placeholder="yyyy-mm-dd" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat Domisili</label>
							<div class="col-sm-6">
								<textarea name="alamat" class="form-control" placeholder="Alamat Domisili" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Telp/Hp</label>
							<div class="col-sm-4">
								<input type="" name="hp" class="form-control" placeholder="Telepon/Hp" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail</label>
							<div class="col-sm-4">
								<input type="email" name="email" class="form-control" placeholder="E-Mail">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Asal Sekolah</label>
							<div class="col-sm-3">
								<input type="text" name="sekolah" class="form-control" placeholder="contoh : SMAN 1 JAKARTA" required>
							</div>
							<label class="col-sm-1 control-label">Kab/Kota</label>
							<div class="col-sm-2">
								<input type="text" name="kota_sekolah" class="form-control" placeholder="contoh : JAKARTA" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nilai UNAS</label>
							<div class="col-sm-2">
								<input type="nilai" name="nilai_un" class="form-control" data-mask="99.99" placeholder="00.00" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Pilihan Prodi</label>
							<div class="col-sm-10" style="text-align:left">
								<?php foreach ($prodi as $prodi): ?>
								<div class="radio">
									<label>
										<input type="radio" name="prodi" value="<?=$prodi->kode_prodi ?>" required>
										<?=$prodi->jenjang ?> <?=$prodi->nama_prodi ?>
									</label>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10" style="text-align:left">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 200px;"></div>
									<div>
										<span class="btn btn-default btn-file">
											<span class="fileinput-new">Pilih gambar</span>
											<span class="fileinput-exists">Ganti</span>
											<input type="file" name="userfile" required>
										</span>
										<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group" style="text-align:left">
							<div class="col-sm-offset-2 col-sm-10">
								<hr>
								<button type="submit" class="btn btn-primary">Daftar !</button>
								<button type="reset" class="btn btn-danger">Batal !</button>
							</div>
						</div>
					<?=form_close()  ?>

					<?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <h1>Panitia Pendaftaran</h1>	
				<p>&nbsp;</p>
				<p>Untuk informasi lebih lanjut, hubungi Panitia Pendaftaran pada:</p>
				<p>&nbsp;</p>

                <div class="col-lg-8" id="map">	
					
                </div>
				 <div class="col-lg-4">	
				 <h3>Contact</h3>
					<p>&nbsp;</p>
				<p align="left"><br></p>
				<p align="left"><i class="fa fa-phone"></i><abbr title="Telepon">P</abbr>: </p>
				<p align="left"><i class="fa fa-envelope-o"></i><abbr title="Email">E</abbr>: </p>
				<p align="left"><i class="fa fa-clock-o"></i><abbr title="Jam Kantor">J</abbr>: </p>
				<p align="left"><i class="fa fa-home"></i><abbr title="Website">W</abbr>: <a href=""></a></p>
				<ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
				 </div>
            </div>
        </div>
    </section>

<?php echo $footer;?>
</body>
</html>

<?php echo $header;?>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<?php echo $navbar;?>	

	<div id="carousel" class="carousel slide mb-0" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/images/').$slide_1;?>" class="d-block" alt="<?php echo $slide_1_headline;?>">
      <div class="carousel-caption d-none d-md-block text-left">
	  	<h2 class="text-white"><?php echo $slide_1_headline;?></h2>
		<p><?php echo $slide_1_caption;?></p>
		<a class="btn btn-primary page-scroll" href="#prodi">Prodi Pilihan</a>
		<a class="btn btn-danger page-scroll" href="#daftar"><i class="fa fa-fw fa-send-o"></i> Daftar Sekarang</a> 
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/images/').$slide_2;?>" class="d-block" alt="<?php echo $slide_2_headline;?>">
      <div class="carousel-caption d-none d-md-block">
	  <h2 class="text-white"><?php echo $slide_2_headline;?></h2>
		<p><?php echo $slide_2_caption;?></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/images/').$slide_3;?>" class="d-block" alt="<?php echo $slide_3_headline;?>">
      <div class="carousel-caption d-none d-md-block text-left">
	  <h2 class="text-white"><?php echo $slide_3_headline;?></h2>
		<p><?php echo $slide_3_caption;?></p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="alert alert-<?php echo $site_theme;?> alert-dismissible fade show" role="alert">
<strong><i class="fa fa-graduation-cap" aria-hidden="true"></i> Info Gelombang</strong> Penerimaan Mahasiswa Baru Tahun Akademik <?=$thak->tahun_ajaran ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php echo $this->session->flashdata('error_daftar'); ?>

    <section id="intro" class="bg-white py-4">

        <div class="container">
		
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
			<div class="col-lg-12">
			<h1 class="mb-4 text-center">Informasi</h1>
			</div>
			<div class="col-lg-7">

			<h4 class="mb-3">Jadwal Pendaftaran</h4>
			<div class="table-responsive">
            		<table class="table table-striped">
            			<thead>
            				<tr class="info">
								<th>Gelombang</th>
								<th>Keterangan</th>
            				
            					<th>Waktu</th>
            					
            				</tr>
            			</thead>
            			<tbody>
            			<?php if ($jadwal_tes): ?>
            					<?php foreach ($jadwal_tes as $tes): ?>
            						<tr>
										<td><?=$tes->nama_tes?></td>
										<td><?=$tes->ket?></td>
								       
								       <td><?=$tes->mulai?> - <?=$tes->sampai?> </td>
								        
								    </tr>
								<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4">Tidak Ada Jadwal</td>
							</tr>
						<?php endif; ?>
            				
            			</tbody>
					</table>
				</div>

			</div>

                <div class="col-lg-5">
				<div class="panel card border-<?php echo $site_theme;?> text-left">
	            	<div class="panel-body card-body">
						<h4 class="mb-3 text-<?php echo $site_theme;?>"><i class="fa fa-bullhorn" aria-hidden="true"></i> Informasi Terbaru</h4>
	                        <ul id="gulung">
	                        <?php if ($informasi): ?>

	                        	 <?php foreach ($informasi as $info):
	                        		 $d=date('Y-m-d',strtotime($info->created_at));
	                        		 
	                        		 $date=date_create($d);
	                        		$n=date('Y-m-d');
	                        		 $now=date_create($n);
	                        		$diff=date_diff($date,$now);
		                       		
	                        		if ($diff->d < 1) {
	                        			$label='<span class="badge badge-info">New</span>';
	                        		}else{
	                        			$label='';
	                        		}
	                        	  ?>
	                        	 	<li class="news-item"><p><?=$info->info ?> <?=$label?></p></li>
	                        	 <?php endforeach ?>

	                        <?php else: ?>
	                        	<li class="news-item"><p>Tidak Ada Informasi Terbaru</p></li>	
	                        <?php endif ?>
                 
	                        </ul>
	                </div>
	               
            	</div>
                  
				</div>
                
            </div>
        </div>
    </section>

    <section id="prodi" class="bg-light py-4">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
					<h1 class="mb-4 text-center">Program Studi</h1>
					<div class="card-columns">
					<?php foreach ($prodi1 as $prodi1): ?>
						<div class="card">	
						<div class="card-body">
						<h5 class="card-title"><?=$prodi1->jenjang ?> <?=$prodi1->nama_prodi ?></h5>
					</div>
					</div>		
					<?php endforeach; ?>
					</div>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="bg-white py-4">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
                <h1 class="mb-4 text-center">Alur Pendaftaran</h1>
                <img src="<?=base_url('assets/images/alur-maba.png')  ?>" class="img-responsive img-thumbnail" alt="">

            	</div>	
            </div>
        </div>
	</section>

    <section id="daftar" class="bg-light py-4">
	
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <h1 class="mb-3">Formulir Pendaftaran</h1>
                	<?php if ($cek_reg === 'Ditutup'): ?>

					      <div class="alert alert-danger text-center">
			                <h3><i class="icon fa fa-3x fa-warning"></i><br><strong>Maaf, Pendaftaran Belum Dibuka</strong></h3>
			              </div>

					<?php else: ?>
					<hr/>
					<?=form_open_multipart('home/daftar','class=""') ?>
					<div class="form-group row">
							<label class="col-sm-2 col-form-label">Pilihan Prodi</label>
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
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">NISN</label>
							<div class="col-sm-10">
								<input type="text" name="nisn" class="form-control" placeholder="NISN" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="form-group row">
							
							<label class="col-sm-2 col-form-label">Agama</label>
							<div class="col-sm-4">
								<select class="form-control" name="agama" required>
									<option>Islam</option>
									<option>Kristen</option>
									<option>Katolik</option>
									<option>Hindu</option>
									<option>Budha</option>
								</select>
							</div>
							<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
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
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-4">
								<input type="" class="form-control date-picker" name="tgl_lahir" placeholder="yyyy-mm-dd" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Alamat Domisili</label>
							<div class="col-sm-10">
								<textarea name="alamat" class="form-control" placeholder="Alamat Domisili" required></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Telp/Hp</label>
							<div class="col-sm-4">
								<input type="" name="hp" class="form-control" placeholder="Telepon/Hp" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">E-Mail</label>
							<div class="col-sm-4">
								<input type="email" name="email" class="form-control" placeholder="E-Mail">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Asal Sekolah</label>
							<div class="col-sm-4">
								<input type="text" name="sekolah" class="form-control" placeholder="contoh : SMAN 1 JAKARTA" required>
							</div>
							<label class="col-sm-2 col-form-label">Kab/Kota</label>
							<div class="col-sm-4">
								<input type="text" name="kota_sekolah" class="form-control" placeholder="contoh : JAKARTA" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Nilai UN</label>
							<div class="col-sm-2">
								<input type="nilai" name="nilai_un" class="form-control" data-mask="99.99" placeholder="00.00" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Foto</label>
							<div class="col-sm-10" style="text-align:left">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 250px; height: 150px;"></div>
									<div>
										<span class="btn btn-default btn-file">
											<span class="fileinput-new btn btn-outline-primary">Pilih gambar</span>
											<span class="fileinput-exists btn btn-outline-primary">Ganti</span>
											<input type="file" name="userfile" required>
										</span>
										<a href="#" class="btn btn-outline-danger fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
							</div>
						</div>
						<hr/>
						<div class="form-group row" style="text-align:left">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-lg">DAFTAR</button>
								<button type="reset" class="btn btn-light btn-lg">Batal</button>
							</div>
						</div>
					<?=form_close()  ?>

					<?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-dark text-white py-5">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
			   <div class="col-md-12">
			<h1 class="text-white mb-3">Panitia Pendaftaran</h1>	
			
				<h5 class="text-white mb-3">Untuk informasi lebih lanjut, hubungi Panitia Pendaftaran pada:</h5>
			</div>

                <div class="col-lg-8" id="map">	
					<div class="table-responsive">
					<!-- Google Maps IFrame -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2030203.7233617385!2d105.70644273125!3d-6.362763799999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec1a804e8b85%3A0xd7bf80e1977cea07!2sUniversitas%20Indonesia!5e0!3m2!1sid!2sid!4v1594195056748!5m2!1sid!2sid" width="700" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					<!-- -->
					</div>
                </div>
				 <div class="col-lg-4">	
				 <h3 class="text-white">Kontak</h3>
				<p><i class="fa fa-phone"></i> Telp.: <?php echo $site_phone;?></p>
				<p><i class="fa fa-envelope-o"></i> Email: <?php echo $site_email;?></p>
				<p><i class="fa fa-home"></i> Web: <a class="text-light" href="http://<?php echo $site_website;?>"><?php echo $site_website;?></a></p>
				<ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a class="text-primary" href="<?php echo $site_facebook;?>"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-danger" href="<?php echo $site_instagram;?>"><i class="fa fa-instagram fa-2x"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-danger" href="<?php echo $site_youtube;?>"><i class="fa fa-youtube-play fa-2x"></i></a>
                    </li>
                    
                </ul>
				 </div>
            </div>
        </div>
    </section>

<?php echo $footer;?>
</body>
</html>

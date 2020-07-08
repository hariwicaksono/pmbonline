<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top navbar-fixed-top shadow">
<div class="container">

    <a class="navbar-brand page-scroll" href="#page-top"><?php echo $site_name;?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="page-scroll nav-link" href="#prodi">Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="page-scroll nav-link" href="#alur">Alur Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="page-scroll nav-link" href="#daftar">Formulir Pendaftaran</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="page-scroll nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li class="dropdown">
			          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-bullhorn"></i> Pengumuman<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          	<?php foreach ($prodi as $data_pro): ?>
			          		<li><a href="<?=base_url('home/pengumuman_maba/'.$data_pro->kode_prodi.'') ?>" target="_blank"><?=$data_pro->jenjang ?> <?=$data_pro->nama_prodi ?></a></li>
			          	<?php endforeach ?>
			          </ul>
			        </li> -->
                	<li class="nav-item"><a class="btn btn-outline-<?php echo $site_theme;?> btn-sm" href="<?php echo base_url('administrator') ?>"><i class="fa fa-sign-in"></i> Login Staff</a></li>
                </ul>
            </div>
   </div>  
    </nav>

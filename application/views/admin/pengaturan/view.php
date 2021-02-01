<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Pengaturan
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
       <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-gear"></i> Data Pengaturan</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <?php if($this->session->flashdata('msg')=='success'):?>
              <div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Pengaturan berhasil diubah</div>
              <?php else:?>

            <?php endif;?>

            <form class="form-horizontal" action="<?php echo base_url().'administrator/pengaturan/update'?>" method="post" enctype="multipart/form-data">
                <div class="col-md-12">

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Favicon</label>
                      <div class="col-sm-10">
                          <input type="file" name="site_favicon" class="form-control" id="site_favicon">
                          <p></p>
                          <img src="<?php echo base_url().'assets/images/'.$site_favicon;?>" class="thumbnail" width="32">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Logo</label>
                      <div class="col-sm-10">
                          <input type="file" name="site_logo" class="form-control" id="site_logo" >
                          <p></p>
                          <img src="<?php echo base_url().'assets/images/'.$site_logo;?>" class="thumbnail" width="200">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nama Situs</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_name" class="form-control" id="site_name" value="<?php echo $site_name;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nama Kampus</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_title" class="form-control" id="site_title" value="<?php echo $site_title;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_address" class="form-control" id="site_address" value="<?php echo $site_address;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Alur Pendaftaran</label>
                      <div class="col-sm-10">
                          <input type="file" name="site_alurpmb" class="form-control" id="site_alurpmb" >
                          <p></p>
                          <img src="<?php echo base_url().'assets/images/'.$site_alurpmb;?>" class="thumbnail" width="200">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Biaya Pendaftaran</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_biaya" class="form-control" id="site_biaya" value="<?php echo $site_biaya;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Facebook</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_facebook" class="form-control" id="site_facebook" value="<?php echo $site_facebook;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Instagram</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_instagram" class="form-control" id="site_instagram" value="<?php echo $site_instagram;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Youtube</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_youtube" class="form-control" id="site_youtube" value="<?php echo $site_youtube;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Telepon</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_phone" class="form-control" id="site_phone" value="<?php echo $site_phone;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_email" class="form-control" id="site_email" value="<?php echo $site_email;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Website</label>
                      <div class="col-sm-10">
                          <input type="text" name="site_website" class="form-control" id="site_website" value="<?php echo $site_website;?>">
                      </div>
                  </div>

                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Theme</label>
                    <div class="col-sm-10">
                    <select id="site_theme" class="form-control" name="site_theme" required>
                    <option value="">Pilih Tema</option>
                    <?php
                    $selected = ' selected="selected" ';
                    ?>
                    <option value="primary" <?php if($site_theme=="primary") echo $selected; ?> >Biru</option>
                    <option value="success" <?php if($site_theme=="success") echo $selected; ?> >Hijau</option>
                    <option value="warning" <?php if($site_theme=="warning") echo $selected; ?> >Kuning</option>
                    <option value="danger" <?php if($site_theme=="danger") echo $selected; ?> >Merah</option>
                  </select>

                    </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Google Maps</label>
                      <div class="col-sm-10">
                          <textarea name="site_google_maps" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $site_google_maps ?></textarea>
                      </div>
                  </div>

                  <div class="form-group">
                      <input type="hidden" name="site_id" value="<?php echo $site_id?>">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">UPDATE</button>
                      </div>
                  </div>
                      
                  </div>
            </form>
            
              
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Pengaturan Slideshow
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
       <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan Slideshow</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-gear"></i> Data Pengaturan Slideshow</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <?php if($this->session->flashdata('msg')=='success'):?>
              <div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Slideshow berhasil diubah</div>
              <?php else:?>

            <?php endif;?>

            <form class="form-horizontal" action="<?php echo base_url().'administrator/pengaturan/update_slideshow'?>" method="post" enctype="multipart/form-data">
                <div class="col-md-12">

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Slide 1</label>
                      <div class="col-sm-10">
                          <input type="file" name="slide_1" class="form-control" id="slide_1">
                          <p>Gambar harus beresolusi 1350 x 550 Pixels</p>
                          <img src="<?php echo base_url().'assets/images/'.$slide_1;?>" class="thumbnail" width="200">

                          <input type="text" name="slide_1_headline" class="form-control" id="slide_1_headline" value="<?php echo $slide_1_headline;?>">

                          <input type="text" name="slide_1_caption" class="form-control" id="slide_1_caption" value="<?php echo $slide_1_caption;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Slide 2</label>
                      <div class="col-sm-10">
                          <input type="file" name="slide_2" class="form-control" id="slide_2" >
                          <p>Gambar harus beresolusi 1350 x 550 Pixels</p>
                          <img src="<?php echo base_url().'assets/images/'.$slide_2;?>" class="thumbnail" width="200">

                          <input type="text" name="slide_2_headline" class="form-control" id="slide_2_headline" value="<?php echo $slide_2_headline;?>">

                          <input type="text" name="slide_2_caption" class="form-control" id="slide_2_caption" value="<?php echo $slide_2_caption;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Slide 3</label>
                      <div class="col-sm-10">
                          <input type="file" name="slide_3" class="form-control" id="slide_3" >
                          <p>Gambar harus beresolusi 1350 x 550 Pixels</p>
                          <img src="<?php echo base_url().'assets/images/'.$slide_3;?>" class="thumbnail" width="200">

                          <input type="text" name="slide_3_headline" class="form-control" id="slide_3_headline" value="<?php echo $slide_3_headline;?>">

                          <input type="text" name="slide_3_caption" class="form-control" id="slide_3_caption" value="<?php echo $slide_3_caption;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id?>">
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
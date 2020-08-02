
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $this->session->flashdata('greeting'); ?>

    
         <!-- Small boxes (Stat box) -->
      <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo $hitung_camaba;?></h3>
            <p class="info-box-text"><strong>Pendaftar</strong></p>
          </div>
          <div class="icon">
          <i class="fa fa-users"></i>
          </div>
          <a href="<?= base_url('administrator/pendaftaran')  ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $thak_aktif;?></h3>
            <p class="info-box-text"><strong>Tahun Akademik</strong></p>
          </div>
          <div class="icon">
          <i class="fa fa-calendar-check-o"></i>
          </div>
          <a href="<?= base_url('administrator/thak')  ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $hitung_prodi;?></h3>
            <p class="info-box-text"><strong>Prodi</strong></p>
          </div>
          <div class="icon">
          <i class="fa fa-graduation-cap"></i>
          </div>
          <a href="<?= base_url('administrator/prodi')  ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $hitung_pengumuman;?></h3>
            <p class="info-box-text"><strong>Pengumuman</strong></p>
          </div>
          <div class="icon">
          <i class="fa fa-bullhorn"></i>
          </div>
          <a href="<?= base_url('administrator/')  ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <!-- small box -->
          
        </div> 
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> Informasi Terbaru</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
             <div id="pesan-sukses"></div>
              <button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#modalNews"><i class="fa fa-fw fa-plus"></i> Tambah Pengumuman</button>
             
              <table class="table table-hover table-bordered table-responsive" width="100%">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="80%">Pengumuman</th>
                    <th width="15%"></th>
                  </tr>
                </thead>
                <tbody id="showdata">
                  
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modalNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <form id="form" action="javascript:void(0)">
                <!-- textarea -->
                <div class="form-group">
                  <textarea  class="form-control textarea" rows="3" name="info" id="info-data" placeholder="Masukan Informasi Terbaru ..."></textarea>
                  <input type="hidden" name="id" class="id-info">
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Close</button>
            <button type="button" class="btn btn-primary" id="btn-simpan-news"><i class="fa fa-fw fa-check"></i> Simpan</button>
            <button type="button" class="btn btn-primary" id="btn-update-news"><i class="fa fa-fw fa-check"></i> Ubah</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" charset="utf-8" >

    $(".btn-add").click(function () {
       $("#btn-simpan-news").show();
        $("#btn-update-news").hide();
        $(".modal-title").html('<span class="glyphicon glyphicon-list-alt"></span> Tambah Informasi Terbaru');
    })

    $("#btn-simpan-news").click(function () {
       $.ajax({
            url: '<?php echo base_url('administrator/main/add_info')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $("#form").serialize(),
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_info();
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modalNews").modal('hide'); 
              }else{
                alert('Masalah menambah Data');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
    })
    
    function show_info() {
      $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/main/show_info',
          success: function(data){
             $('#showdata').html(data);
          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
    }

    function edit(id) {
        $("#btn-simpan-news").hide();
        $("#btn-update-news").show();
        $(".modal-title").html('<span class="glyphicon glyphicon-list-alt"></span> Edit Informasi');
  
         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/main/get_info/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#info-data").val(data.info);
              $(".id-info").val(data.id_info);
              $("#modalNews").modal('show');
          },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
        }
      });
    }

     $("#btn-update-news").click(function () {
          $.ajax({
            url: '<?php echo base_url('administrator/main/update_info')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $("#form").serialize(), // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_info();
             if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modalNews").modal('hide'); // Close / Tutup Modal Dialog
              }else{
                alert("Masalah mengupdate Data")
              }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
      })

     function hapus(id) {
        var conf = confirm("Anda Yakin ingin menghapusnya ?");
        if (conf) {
           $.ajax({
            url: '<?php echo base_url('administrator/main/delete_info')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_info();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();  
                }else{
                  alert("Masalah menghapus Data")
                }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
        }
      }

      $('#modalNews').on('hidden.bs.modal', function (e) {
       $("#form")[0].reset();
      })

    $(document).ready(function() {

      show_info();
    })
  </script>
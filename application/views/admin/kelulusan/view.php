<?php $color=array('bg-teal','bg-info','bg-red','bg-success','bg-maroon','bg-navy','bg-purple','bg-orange');
 ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Data Kelulusan
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelulusan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bullhorn"></i> Kelulusan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="callout callout-success">
                <h4><i class="fa fa-warning"></i> Pilih Prodi</h4>
                <p>Pilih Data Kelulusan berdasarkan Prodi!</p>
              </div>    
              <?php foreach ($prodi as $value): ?>
                  <div class="col-md-3">
                  <div class="small-box <?php  echo $color[array_rand($color)]; ?>">
                    <div class="inner">
                      <h3><?=$value->jenjang ?></h3>

                      <h5><?=$value->nama_prodi ?></h5>
                    </div>
                    <a href="<?=base_url('administrator/kelulusan/prodi/'.$value->kode_prodi.'') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="modal fade" role="dialog" id="modal_add">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="mod-judul"></h4>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
            <div id="pesan-error">  
            </div>
              <div class="row">
                <form id="form" method="POST" action="javascript:void(0);">
                  <div class="form-group">
                  <label for="">Nama Jenjang</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" style="text-transform:uppercase" class="form-control" name="jenjang" id="jenjang">
                      <input type="hidden" id="key" name="key">
                    </div>
                    <!-- /.input group -->
                  </div>
                 <!--/form group -->
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" id="btn-add-jenjang">Simpan</button>
            <button type="button" class="btn btn-primary" id="btn-upd-jenjang">Update</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!--   <script type="text/javascript" charset="utf-8" >

      $("#add-jenjang").click(function () {
        $("#btn-add-jenjang").show();
        $("#btn-upd-jenjang").hide();
        $("#mod-judul").html("Tambah Jenjang");
      })

      $("#btn-add-jenjang").click(function () {
        var data =$("#form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/jenjang/add_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data,
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
             show_jenjang();
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_add").modal('hide'); 
              }else{
                alert('Masalah menghapus Data');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
      });

      function show_jenjang() {
          $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/jenjang/show_jenjang',
          dataType: 'json',
          success: function(data){
            //console.log(data);
            if (data.length > 0) {
               var html = '';
                var no=1;
                for(i=0; i<data.length; i++){
                  html +='<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].jenjang+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit('+data[i].kode_jenjang+')"><i class="fa fa-edit"></i> Edit</a>  '+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-xs"  onclick="hapus('+data[i].kode_jenjang+')"><i class="fa fa-trash-o"></i> Delete</a>'+
                        '</td>'+
                        '</tr>';
                  no++;
                }
                $('#showdata').html(html);
              }else{
                  $('#showdata').html(data.pesan);
              }
           

          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
      }

      function edit(id) {
        $("#btn-add-jenjang").hide();
        $("#btn-upd-jenjang").show();
        $("#mod-judul").html("Edit Jenjang");

         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/jenjang/get_jenjang/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#jenjang").val(data.jenjang);
              $("#key").val(data.kode_jenjang);
              $("#modal_add").modal('show');
          }
        });

      }

      $("#btn-upd-jenjang").click(function () {
        var data = $("form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/jenjang/edit_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
            //console.log(response);
             if (response.success==true){
                show_jenjang();
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_add").modal('hide'); // Close / Tutup Modal Dialog
              }else{
                alert("Masalah mengupdate Data")
              }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
      });

      function hapus(id) {
        var conf = confirm("Anda Yakin ingin menghapusnya ?");
        if (conf) {
           $.ajax({
            url: '<?php echo base_url('administrator/jenjang/delete_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_jenjang();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_add").modal('hide'); // Close / Tutup Modal Dialog
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

      $(document).ready(function () {
        show_jenjang();
      });

  </script> -->
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
            <div id="pesan-sukses">
            </div>
            
              <table class="table table-hover table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th></th>
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
        <div class="modal fade" role="dialog" id="modal_add" >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mod-judul"></h4>
              </div>
              <div class="modal-body" style="max-height: calc(100vh - 212px);overflow-y: auto;">
                <div class="container-fluid">
                <div id="pesan-error">  
                </div>
                  <div class="row">
                    <form id="form" class="form-horizontal" method="POST" action="javascript:void(0);">
                      <input type="hidden" id="key" name="key">

                      <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Favicon</label>
                          <div class="col-sm-10">
                              <input type="file" name="site_favicon" class="form-control" >
                              <p class="help-block">Favicon harus beresolusi 32 x 32 Pixels.</p>
                              <input type="hidden" class="form-control" name="old_site_favicon" id="site_favicon">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Logo Header</label>
                          <div class="col-sm-10">
                              <input type="file" name="site_logo_header" class="form-control" >
                              <p class="help-block">Logo harus beresolusi 248 x 54 Pixels.</p>
                              <input type="hidden" class="form-control" name="old_site_logo_header" id="site_logo_header">
                          </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nama Situs</label>
                      <div class="col-sm-10">             
                          <input type="text" class="form-control" name="site_name" id="site_name">
                          </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nama Kampus</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_title" id="site_title">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Alamat</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_address" id="site_address">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Telepon</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_phone" id="site_phone">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Email</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_email" id="site_email">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Website Utama</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_website" id="site_website">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Facebook</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_facebook" id="site_facebook">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Instagram</label>  
                      <div class="col-sm-10">     
                        <input type="text" class="form-control" name="site_instagram" id="site_instagram">
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Link Youtube</label>       
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="site_youtube" id="site_youtube">
                        </div>
                      </div>
           
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-upd-pengaturan"><i class="fa fa-fw fa-check"></i> Update</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <script type="text/javascript" charset="utf-8" >
 
      function show_pengaturan() {
          $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/pengaturan/show_pengaturan',
          dataType: 'json',
          success: function(data){
            //console.log(data);
            if (data.length > 0) {
               var html = '';
                var no=1;
                for(i=0; i<data.length; i++){
                  html +='<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].site_name+'</td>'+
                        '<td>'+data[i].site_title+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="edit('+data[i].site_id+')"><i class="fa fa-edit"></i> Edit</a>  '+
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
        $("#btn-upd-pengaturan").show();
        $("#mod-judul").html('<i class="fa fa-gear"></i> Edit Pengaturan');

         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/pengaturan/get_pengaturan/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#site_favicon").val(data.site_favicon);
              $("#site_logo_header").val(data.site_logo_header);
              $("#site_name").val(data.site_name);
              $("#site_title").val(data.site_title);
              $("#site_address").val(data.site_address);
              $("#site_phone").val(data.site_phone);
              $("#site_email").val(data.site_email);
              $("#site_website").val(data.site_website);
              $("#site_facebook").val(data.site_facebook);
              $("#site_instagram").val(data.site_instagram);
              $("#site_youtube").val(data.site_youtube);
              $("#key").val(data.site_id);
              $("#modal_add").modal('show');
          }
        });

      }

      $("#btn-upd-pengaturan").click(function () {
        var data = $("form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/pengaturan/edit_pengaturan')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
            //console.log(response);
             if (response.success==true){
                show_pengaturan();
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


      $(document).ready(function () {
        show_pengaturan();
      });

       $('#modal_add').on('hidden.bs.modal', function (e) {
       $("#form")[0].reset();
      })

  </script>
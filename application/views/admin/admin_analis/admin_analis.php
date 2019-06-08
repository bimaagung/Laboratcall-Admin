<script src="<?php echo base_url();?>assets/vendors/jquery.min.js"></script>
<div class="span9" id="content">

 <div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left">Daftar Analis</div>
    </div>

    <!-- <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#analis">analis</a></li>
      <li><a href="<?php echo base_url();?>index.php/admin/page_anggota/data_pti">Analis</a></li>
    </ul> -->

    <div class="tab-content">
     
      <div id="analis" class="tab-pane fade in active">
          <div class="block-content collapse in">
            <div class="span12">

            <!-- Konfirmasi -->
            <?php 
              $konfirmasi = $this->session->flashdata('konfirmasi');
              if(isset($konfirmasi))
              {
            ?>
              <div class="alert alert-success" id="alerthidden">
                <button class="close" data-dismiss="alert">&times;</button>
                <strong>Berhasil</strong>
                  <?php echo $konfirmasi; ?>
                </div>
            <?php
                }
            ?>
            <!-- // -->
            
              <div class="table-toolbar">
                <div class="btn-group">
                <a  href="<?php echo base_url(); ?>index.php/admin/page_analis/insert_analis" class="btn">Tambah Analis <i class="icon-plus"></i></a>
              </div>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data_analis">
              <thead>
                <tr align="center">
                <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Nama</th>
                  <th style="text-align:center; width:15%;">Jenis Kelamin</th>
                  <th style="text-align:center; width:20%;">TTL</th>
                  <th style="text-align:center;">Alamat</th>
                  <th style="text-align:center;">Opsi</th>
                </tr>
              </thead>
              <tbody id="view_data_analis">
              </tbody>
            </table>
          </div>
      </div>
    </div>

  </div>
</div>
<!-- /block -->
</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tampil data analis</h4>
      </div>
      <div class="modal-body">
        <table id="view_data_analis"  class="table table-striped table-bordered">
          <!-- View Tabel -->
        </table>
      </div>
      <div class="modal-footer">
        <!-- Button Modal -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal_delete" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Analis</h4>
      </div>
      <div class="modal-body" id="dialog_delete">
        
      </div>
      <div class="modal-footer" id="modal_button">
        <!-- Button Modal -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  var table;

  $(document).ready(function(){
        tampil_data_analis();   //pemanggilan fungsi tampil barang.

        table = $('#data_analis').dataTable();

        //fungsi tampil barang
        function tampil_data_analis(){

          $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>index.php/admin/page_analis/get_analis_ajax',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html += '<tr>'+
                '<td style="text-align:center; width:7%;">'+ (i+1) +'</td>'+
                '<td>'+data[i].nama+'</td>'+
                '<td style="text-align:center; width:12%;">'+data[i].jenis_kelamin+'</td>'+
                '<td style="text-align:center;">'+data[i].tmp_lahir+' ,'+data[i].tanggal_lahir+'</td>'+ 
                '<td style="text-align:center;">'+data[i].alamat+'</td>'+ 
                '<td style="text-align:center;">'+
                // '<a href="javascript:void(0);" class="btn view_anggota" data="'+data[i].id+'">View</a>'+' '+
                '<a href="<?php echo base_url();?>index.php/admin/page_analis/insert_analis/'+data[i].id+'">Edit</a>'+' '+
                '<span style="color:#C7C7C7">|</span>'+' '+                
                '<a href="javascript:void(0);" class="delete_analis" data="'+data[i].id+'">Hapus</a>'+
                '</td>'+
                '</tr>';
              }
              
              $('#view_data_analis').html(html);
            }
          });
}
});


$("#alerthidden").fadeTo(2000, 500).slideUp(500, function(){
    $("#alerthidden").slideUp(500);
});

$('#view_data_analis').on('click','.delete_analis',function(){
  var id=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url()?>index.php/admin/page_analis/get_analis_byid_ajax",
    dataType : "JSON",
    data : {id:id},
    success: function(data){
     $('#myModal_delete').modal('show');
     $.each(data,function(){
       
      html = 'Apakah anda yakin ingin menghapus '+data.nama+' ?';
      html_button =   
      '<a class="btn delete_anggota" data-dismiss="modal">Cencel</a>'+
      '<a href="<?php echo base_url();?>index.php/admin/page_analis/delete_analis/'+data.id+'" class="btn view_anggota">Delete</a>';
                     

    });

     $('#dialog_delete').html(html);
     $('#modal_button').html(html_button);
     
   }
 });
return false;
});

</script>
<script src="<?php echo base_url();?>assets/vendors/jquery.min.js"></script>
<div class="span9" id="content">
 <div class="row-fluid">
 
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left"></div>
    </div>
    
    <div class="block-content collapse in">
    
      <div class="span12">
        <div class="table-toolbar">
          <div class="btn-group">
           <a  href="<?php echo base_url(); ?>index.php/admin/page_fungsionaris/insert_fungsionaris" class="btn">Tambah Fungsionaris <i class="icon-plus"></i></a>
         </div>
       </div>
       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data_fungsionaris">
        <thead>
          <tr align="center">
            <th style="text-align:center;">NIM</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center; width:20%;">Tahun Masuk Riptek</th>
            <th style="text-align:center;">Bidang di Riptek</th>
            <th style="text-align:center;">Action</th>
          </tr>
        </thead>
        <tbody id="show_data_fungsionaris">
        </tbody>
      </table>
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
        <h4 class="modal-title">View fungsionaris</h4>
      </div>
      <div class="modal-body">
        <table id="view_data_fungsionaris"  class="table table-striped table-bordered">
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
        <h4 class="modal-title">Hapus fungsionaris</h4>
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
        tampil_data_barang();   //pemanggilan fungsi tampil barang.

        table = $('#data_fungsionaris').dataTable();

        //fungsi tampil barang
        function tampil_data_barang(){

          $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>index.php/admin/page_fungsionaris/get_fungsionaris_ajax',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html += '<tr>'+
                '<td>'+data[i].nim+'</td>'+ 
                // '<td style="text-align:center;">'+ (i+1) +'</td>'+
                '<td>'+data[i].nama+'</td>'+
                '<td style="text-align:center;">'+data[i].thn_masuk+'</td>'+
                '<td style="text-align:center;">'+data[i].posisiriptek+'</td>'+ 
                '<td style="text-align:center;">'+
                // '<a href="javascript:void(0);" class="btn view_fungsionaris" data="'+data[i].id+'">View</a>'+' '+
                '<a href="<?php echo base_url();?>index.php/admin/page_fungsionaris/insert_fungsionaris/'+data[i].id+'" class="btn" >Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn delete_fungsionaris" data="'+data[i].id+'">Hapus</a>'+' '+
                '</td>'+
                '</tr>';
              }
              $('#show_data_fungsionaris').html(html);
            }
          });
}
});



$('#show_data_fungsionaris').on('click','.view_fungsionaris',function(){
  var id=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url()?>index.php/admin/page_fungsionaris/get_fungsionaris_byid_ajax",
    dataType : "JSON",
    data : {id:id},
    success: function(data){
     $('#myModal').modal('show');
     $.each(data,function(){

      html = '<tr>'+
      '<td colspan="2" align="center">'+
      '<img width="290" src="" alt="">'+
      '</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Nama Lengkap'+'</td>'+
      '<td>'+data.nama+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'TTL'+'</td>'+
      '<td>'+data.ttl+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Status'+'</td>'+
      '<td>'+data.status+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Alamat'+'</td>'+
      '<td>'+data.alamat+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Tahun Masuk Riptek'+'</td>'+
      '<td>'+data.thn_masuk+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Motto'+'</td>'+
      '<td>'+data.motto+'</td>'+
      '</tr>'+
      '<tr>'+
      '<td>'+'Pesan'+'</td>'+
      '<td>'+
      data.pesan
      +'</td>'+
      '</tr>';
    });

     $('#view_data_fungsionaris').html(html);
     
   }
 });
return false;
});

$('#show_data_fungsionaris').on('click','.delete_fungsionaris',function(){
  var id=$(this).attr('data');
  $.ajax({
    type : "GET",
    url  : "<?php echo base_url()?>index.php/admin/page_fungsionaris/get_fungsionaris_byid_ajax",
    dataType : "JSON",
    data : {id:id},
    success: function(data){
     $('#myModal_delete').modal('show');
     $.each(data,function(){
       
      html = 'Apakah anda yakin ingin menghapus '+data.nama+' ?';
      html_button =   '<a href="javascript:void(0);" class="btn view_fungsionaris" onclick="delete_fungsionaris('+data.id+')" data-dismiss="modal">Delete</a>'+
                      '<a class="btn delete_fungsionaris" data-dismiss="modal">Cencel</a>';

    });

     $('#dialog_delete').html(html);
     $('#modal_button').html(html_button);
     
   }
 });
return false;
});

function delete_fungsionaris(id)
{
        $.ajax({
          url : "<?php echo base_url();?>index.php/admin/page_fungsionaris/delete_fungsionaris_byid_ajax/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          { 

                //Reload Website
                location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert('Error deleting data');
              }
            });

}

function reload_table()
{
    table.ajax.reload(null,false); 
}


  </script>
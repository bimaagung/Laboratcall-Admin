
<script src="<?php echo base_url();?>assets/vendors/jquery.min.js"></script>


<div class="span9" id="content">

 <div class="row-fluid">
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left">List User Admin</div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <div class="table-toolbar">
          <div class="btn-group">
           <button  data-toggle="modal" data-target="#myModal" class="btn btn-success">Add User <i class="icon-plus icon-white"></i></button>
         </div>
       </div>
       <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table">
        <thead>
          <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Last Login</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <!-- Hasil data -->
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
        <h4 class="modal-title">ADD USER</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="control-group">
            <label class="control-label" style="margin-left:-10%;">Nama Lengkap</label>
            <div class="controls">
              <input style="margin-left:-10%;" type="text" class="span12" required >
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="select01" style="margin-left:-19.5%;">Gender</label>
            <div class="controls">
            <select id="select01" class="chzn-select span2" style="margin-left:-10%;" required>
                <option>L</option>
                <option>P</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" style="margin-left:-16%;">Username</label>
            <div class="controls">
              <input style="margin-left:-10%;" type="text" class="span12" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label"  style="margin-left:-16.5%;">Password</label>
            <div class="controls">
              <input style="margin-left:-10%;" type="password" class="span12" required>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label"  style="margin-left:-21.5%;">Email</label>
            <div class="controls">
              <input style="margin-left:-10%;" type="email" class="span12" required>
            </div>
          </div>

        </div>       
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" onclick="window.location='<?php base_url();?>admin_user/add_user_admin'" class="btn btn-info" data-dismiss="modal">Update</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>

    </div>
  </div>

</div>
</div>

<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url()?>index.php/admin/admin_user/get_user_admin_ajax",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

});

</script>
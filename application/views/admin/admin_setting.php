<script src="<?php echo base_url();?>assets/vendors/jquery.min.js"></script>
<div class="span9" id="content">
  <!-- morris stacked chart -->
  <div class="row-fluid">


   <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Setting Admin</div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
        <form  method="post" action="<?php echo base_url();?>index.php/admin/setting_admin/update_admin" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
            <legend>Update Admin</legend>
              <div class="control-group">
                <label class="control-label" for="typeahead">Nama Lengkap</label>
                <div class="controls">
                  <input type="text" class="span6" id="nama" name="nama" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="select01">Gender</label>
                <div class="controls">
                  <select class="chzn-select span2" id="gender" name="gender" required>
                    <option>Gender</option>
                    <option>L</option>
                    <option>P</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="typeahead">Username</label>
                <div class="controls">
                  <input type="text" class="span6" id="username" name="username">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="typeahead">Email</label>
                <div class="controls">
                  <input type="email" class="span6" id="email" name="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="typeahead">Password</label>
                <div class="controls">
                  <input type="password" class="span6" id="password" name="password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="typeahead">Retype Password</label>
                <div class="controls">
                  <input type="password" class="span6" id="retypepassword" name="password_retype">
                </div>
              </div>
              
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
    <!-- /block -->
  </div>
</div>

<script>

$(document).ready(function(){
  setting_admin();

  function setting_admin(){

    $.ajax({
      type : 'ajax',
      url  : '<?php echo base_url()?>index.php/admin/setting_admin/get_admin_byid_ajax',
      async : false,
      dataType : 'json',
      success: function(data){
      $.each(data,function(){
        $('#nama').val(data.nama),
        $('#gender').val(data.gender);
        $('#username').val(data.username);
        $('#email').val(data.email);
        $('#password').val(data.password);
        $('#retypepassword').val(data.password);
          });
        }
      });
    }
  
  });

    


</script>

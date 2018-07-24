<?php
  $peringatan = $this->session->flashdata('peringatan');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url();?>assets/assets_plus/styles.css" rel="stylesheet" media="screen">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body id="login">
      <div class="container">
        <h2 class="form-signin-heading text-center"  style="color:#D3D3D3; font-size:24px;">Register Admin SILARI</h2>
        <?php echo form_open('admin/login_admin/save_admin','class="form-signin"'); ?>
          <img style="margin:0% 8% 8% 32%;" width="100" class="img-circle" src="https://www.blackpool.ac.uk/sites/default/files/styles/max_325x325/public/default_images/Expert-tutor-placeholder.jpg?itok=jQ4nyTIm">
          <?php 
            if(isset($peringatan))
            {
          ?>
              <div class="alert alert-error">
              <button class="close" data-dismiss="alert">&times;</button>
              <strong>Error!</strong>
                <?php echo $peringatan; ?>
              </div>
            <?php
              }
            ?>
          <input type="text" class="input-block-level" placeholder="Nama Lengkap" name="nama" required>
          <select id="select01" class="chzn-select span2" name="gender" required>
            <option>Gender . . .</option>
            <option>L</option>
            <option>P</option>
          </select>
          <input type="text" class="input-block-level" name="username" placeholder="Username">
          <input type="email" class="input-block-level" name="email" placeholder="Email address">
          <input type="password" class="input-block-level" name="password" placeholder="Password">
          <input type="password" class="input-block-level" name="password_retype" placeholder="Retype Password">
          

          <button class="btn btn-large btn-default btn-block" type="submit">Register</button>
        </form>


      </div> <!-- /container -->
      <script src="<?php echo base_url();?>assets/vendors/jquery-1.9.1.min.js"></script>
      <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
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
    <?php echo $script_captcha; // javascript recaptcha ?>
  </head>
  <body id="login">
    <div class="container">
      <h2 class="form-signin-heading text-center" style="color:#D3D3D3;">Admin SILARI</h2>
      <?php echo form_open('admin/login_admin/validation_admin','class="form-signin"'); ?>
        <img style="margin:5% 8% 8% 28%;" width="120" class="img-circle" src="https://www.blackpool.ac.uk/sites/default/files/styles/max_325x325/public/default_images/Expert-tutor-placeholder.jpg?itok=jQ4nyTIm">
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
       <div class="form-group">
                <?php echo form_input('username', $username, 'class="form-control form-control-xs" required type="text" style="width:94%" placeholder="username"'); ?>
            </div>
            <div class="form-group">
                <?php echo form_password('password', $password, 'class="form-control" required type="password" style="width:94%" placeholder="password"'); ?>
            </div>
            <div class="form-group">
                <?php echo $captcha // tampilkan recaptcha ?>
            </div>
            <br>
            <div class="form-group">
                <?php echo form_submit('login', 'login', 'class="btn btn-lg btn-block"'); ?>
            </div>
      </form>
    
    </div> <!-- /container -->
    <div class="text-center">
        <a href="<?php echo base_url();?>index.php/admin/login_admin/register_admin">Create Account</a>
    </div>
    <script src="<?php echo base_url();?>assets/vendors/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
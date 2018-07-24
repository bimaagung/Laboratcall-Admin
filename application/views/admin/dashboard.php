<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/assets_plus/styles.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/assets_plus/styles.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/assets_plus/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin [ SILARI ] <span style="font-size:16px;">Sistem Alumni Riptek</span></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
                                    <?php $user = $this->session->flashdata('username');
                                            echo $user;
                                    ?>
                                <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url();?>index.php/admin/setting_admin">Pengaturan</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url();?>index.php/admin/login_admin/logout_admin">Keluar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
       <div class="container-fluid">
            <div class="row-fluid">
                    <?php $this->load->view('admin/menu_admin.php') ?>
                <!--/span-->
                    <?php $this->load->view($main_content); ?>

            </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Bima Agung</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="<?php echo base_url();?>assets/vendors/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url();?>assets/assets_plus/scripts.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets_plus/DT_bootstrap.js"></script>

        <link href="<?php echo base_url();?>assets/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>assets/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="<?php echo base_url();?>assets/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="<?php echo base_url();?>assets/vendors/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendors/bootstrap-datepicker.js"></script>

        <script src="<?php echo base_url();?>assets/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}

    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />
    
    <style>
    #pimg img, #pimg1 img{
        width:200px;
    }
    
        
    </style>
   
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>MIN</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AD</b>MIN</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                    
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
           
            <li>
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            
            <?php if ( $role == 4 ) : ?>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ticket"></i> <span>Passports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>passports/list_lost_passports"><i class="fa fa-circle-o"></i> List Lost Passports</a></li>
                <li><a href="<?php echo base_url() ?>passports/list_extending_passports"><i class="fa fa-circle-o"></i> List Renew Passports</a></li>
                
                <li><a href="<?php echo base_url() ?>passports/list_manual_passports"><i class="fa fa-circle-o"></i> List Manual Extensions</a></li>
                
              </ul>
            </li>



            
            
            <?php else : ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus"></i> <span>Add Passports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>passports/add_lost_passport"><i class="fa fa-circle-o"></i>  Lost Passport</a></li>
                <li><a href="<?php echo base_url() ?>passports/add_extending_passport"><i class="fa fa-circle-o"></i> Renew Passport</a></li>
                <li><a href="<?php echo base_url() ?>passports/add_manual_passport"><i class="fa fa-circle-o"></i> Manual Extension </a></li>
                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ticket"></i> <span>Passports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>passports/list_lost_passports"><i class="fa fa-circle-o"></i> List Lost Passports</a></li>
                <li><a href="<?php echo base_url() ?>passports/list_extending_passports"><i class="fa fa-circle-o"></i> List Renew Passports</a></li>
                
                <li><a href="<?php echo base_url() ?>passports/list_manual_passports"><i class="fa fa-circle-o"></i> List Manual Extensions</a></li>
                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-id-card-o"></i>
                <span>Passport Options</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li>
              <a href="<?php echo base_url(); ?>passports/shift_to_embassy">
                <i class="fa fa-adjust"></i>
                <span>Shift To Embassy </span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url(); ?>passports/receive_to_embassy">
                <i class="fa fa-adjust"></i>
                <span>Receive To Embassy</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url(); ?>passports/delivery">
                <i class="fa fa-adjust"></i>
                <span>Delivery</span>
              </a>
            </li>
            </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                
                <span>Professions</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>passports/professions"><i class="fa fa-circle-o"></i> All </a></li>
                <?php
            if($role == ROLE_ADMIN)
            {
            ?>
                <li><a href="<?php echo base_url() ?>passports/professions?action=add_new"><i class="fa fa-circle-o"></i> Add New</a></li>
            <?php } ?>
                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-ticket" aria-hidden="true"></i>
                
                <span>Others</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>passports/list_others"><i class="fa fa-circle-o"></i> All </a></li>
        
                <li><a href="<?php echo base_url() ?>passports/add_other"><i class="fa fa-circle-o"></i> Add New</a></li>
                
              </ul>
            </li>
            
            <?php endif; ?>
           
            <?php
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Branches</span>
                
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                
              </a>
              
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>userListing"><i class="fa fa-circle-o"></i> All Branches </a></li>
                <li><a href="<?php echo base_url() ?>addNew"><i class="fa fa-circle-o"></i> Add New </a></li>
                
              </ul>
              
              
            </li>
            <?php
            }
            ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
                
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                
              </a>
              
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url(); ?>passports/reports">
                    <i class="fa fa-circle-o"></i>
                    <span>All Reports</span>
                  </a>
                </li>
              
                <li>
                  <a href="<?php echo base_url(); ?>passports/shift_to_embassy?type=reports">
                    <i class="fa fa-circle-o"></i>
                    <span>Sfift To Embassy Reports</span>
                  </a>
                </li>
                
                <li>
                  <a href="<?php echo base_url(); ?>passports/receive_to_embassy?type=reports">
                    <i class="fa fa-circle-o"></i>
                    <span>Receive To Embassy Reports</span>
                  </a>
                </li>
                
                <li>
                  <a href="<?php echo base_url(); ?>passports/delivery?type=reports">
                    <i class="fa fa-circle-o"></i>
                    <span> Delivery Reports</span>
                  </a>
                </li>         
              </ul>
            </li>
            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
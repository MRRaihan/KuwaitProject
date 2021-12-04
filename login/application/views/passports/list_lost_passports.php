<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Lost Passports
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    
    
    
    
    
    
    <section class="content">
        
        
        <!---------- Message ---------->
        
        <div class="row">
       <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
                
    </div>
    </div>
        <!--------- End Message ----->
        
        
        <div class="row">
          <form action="" method="get" id="searchList">
             <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="cpr" value="<?php echo isset($_GET['cpr']) ? $_GET['cpr'] : ''; ?>" class="form-control" placeholder="Search by CPR">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
            </form>
            
            <form action="" method="get" id="searchList">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="bd_mobile" value="<?php echo isset($_GET['bd_mobile']) ? $_GET['bd_mobile'] : ''; ?>" class="form-control" placeholder="Search by Mobile Number">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
          </form>
          
          
          
            <form action="" method="get" id="searchList">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
                
                
           <div class="form-group" id="prv">
           <select class="form-control" id="profession" name="profession" required="required">
          <option value=""> Select Profession </option>
          <?php
          $is_data = array();
          $p = isset($_GET['profession']) ? $_GET['profession'] : '';
          foreach(  $this->passport_model->get_professions() as $profession ) : ?>
          <option value="<?php echo $profession->name; ?>" <?php if ( $p == $profession->name ){ echo 'selected'; $is_data[] = 'yes'; } ?>><?php echo $profession->name; ?></option>
         <?php endforeach; ?>
         <option value="other" <?php if ( empty($is_data) && !empty($p) ) { echo 'selected'; } ?> > Other </option>
            </select>
           </div>
  
   <?php if ( empty($is_data) && !empty($p) ) : ?>
    <div class="form-group" id="padded">
   <input name="profession" type="text" class="form-control" placeholder="Enter Profession" id="profession" value="<?php echo $p; ?>">
     </div>
   <?php endif; ?>
              
              
              
            </div>
            
            
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
          </form>
           
          
        </div>
        
        
        <?php if($role !== '4' ){ ?>
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>passports/add_lost_passport"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <?php } ?>
        
        
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lost Passports</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>CPR</th>
                        <th>Mobile Number</th>
                        <th>EMS</th>
                        <th>Total Fee</th>
                        
                       <!-- <th>Passport Photocopy</th>
                        -->
                        <th class="text-center">Actions</th>
                    </tr>
                    
                    
                <?php
                  if($role == ROLE_ADMIN || $role == 5 || $role == 2 || $role == 4  ){
                  
                  if(  isset($_GET['branch_id'])  && is_numeric( $_GET['branch_id'] ) ){
                      $passports = $this->passport_model->get_lost_passports($_GET['branch_id']);
                      $count = $this->passport_model->get_lost_passports_count($_GET['branch_id']);
                  } else {
                     $passports = $this->passport_model->get_lost_passports(); 
                     $count = $this->passport_model->get_lost_passports_count();
                  }
                 
                 }
                  else {
                    $passports = $this->passport_model->get_lost_passports($user_id);
                    $count = $this->passport_model->get_lost_passports_count($user_id);
                    
                  }
                  
                    
                    if(!empty( $passports ))
                    {
                        foreach($passports as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->full_name ?></td>
                        <td><?php echo $record->cpr ?></td>
                        <td><?php echo $record->bhr_mobile ?></td>
                        <td><?php echo $record->ems ?></td>
                        <?php 
                        $v = ( $record->salary == 1) ? 4 : 4; 
                        $e = ( $record->salary == 1) ? 13 : 41.50;
                        $total = $v + $e
                        ?>
                        <td><?php echo $total; ?></td>
                        
                      <!--  <td>
                            <?php if ( !empty($record->passport_photocopy) ) : ?>
                            <a href="<?php echo $record->passport_photocopy; ?>" target="_blank" class="btn btn-sm btn-danger"> View Photo </a>
                            <?php endif; ?>
                            </td>
                        -->
                        
                        <td class="text-center">
                            
                            
                            <a target="_blank" href="<?php echo base_url(); ?>passports/view_passport?type=lost&id=<?php echo $record->id; ?>" class="btn btn-sm btn-primary" href="" title="View"><i class="fa fa-eye"></i> View </a>
                            
                            
                            <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>passports/print_passport?type=lost&id=<?php echo $record->id; ?>" title="View"><i class="fa fa-file-pdf-o"></i> Print Recpt </a>
                            
                            <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>passports/print_passport?type=lost&id=<?php echo $record->id; ?>&bar_code" title="View"><i class="fa fa-eye"></i> Print Sticker </a>
                            
                            
                            <a target="_blank" href="<?php echo base_url(); ?>passports/view_passport?type=lost-agreement&id=<?php echo $record->id; ?>" class="btn btn-sm btn-primary" href="" title="View"><i class="fa fa-eye"></i>  Agreement </a>
                            
                            
                            <?php if ( $role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == 5 ) : ?>
                            <a class="btn btn-sm btn-info" href="<?php echo base_url(); ?>passports/edit_lost_passport?id=<?php echo $record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <?php endif; ?>
                            
                            
                            <?php if ( $role == ROLE_ADMIN ) : ?>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" title="Delete" class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url(); ?>passports/delete_passport/lost/<?php echo $record->id; ?>?redirect=list_lost_passports"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
                    <nav>
                    <?php 
                    $current = isset ($_GET['page']) ? $_GET['page'] : 1;
                    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $url_parts = parse_url($url);
                    $constructed_url = $url_parts['scheme'] . '://' . $url_parts['host'] . (isset($url_parts['path'])?$url_parts['path']:'');
                    echo str_replace('///', '', rl_get_pagination_links( $current, ceil($count / 20), $constructed_url )); ?>
                  </nav>
                  
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

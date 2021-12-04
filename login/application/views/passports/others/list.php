<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Others
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    
    
    
    
    
    
    <section class="content">
        
        <?php
       if($role == ROLE_ADMIN ){
       $passports = $this->passport_model->get_others(); 
       $count = $this->passport_model->get_others_count();
       } else {
       $passports = $this->passport_model->get_others($user_id);
       $count = $this->passport_model->get_others_count($user_id);
         }
        ?>
        
        
        
        <div class="row">
            
         <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                 <h3> <?php echo $count; ?> </h3>
                  <p>Total Passports </p>
                </div>
                <div class="icon">
                  <i class="fa fa-ticket"></i>
                </div>
                
                
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                <?php 
                if($role == ROLE_ADMIN ){
                echo $this->passport_model->get_others_fees();
                } else {
                echo $this->passport_model->get_others_fees($user_id);
                }
                ?>
               
                  </h3>
                  <p>Total Fees</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
               
              </div>
            </div><!-- ./col -->
         
           
          </div>
        
        
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
            
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
             <input id="from_date" type="text" name="from_date" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''; ?>" class="form-control datepicker" placeholder="From Date" autocomplete="off">
            </div>
        
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
              <input id="to_date" type="text" name="to_date" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''; ?>" class="form-control datepicker" placeholder="To Date" autocomplete="off">
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
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>passports/add_other"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <?php } ?>
        
        
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Others</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>CPR</th>
                        <th>Mobile Number</th>
                        <th>Remarks</th>
                        <th>EMS</th>
                        <th>Total Fee</th>
                        
                       <!-- <th>Passport Photocopy</th>
                        -->
                        <th class="text-center">Actions</th>
                    </tr>
                    
                    
                <?php
                    
                    if(!empty( $passports ))
                    {
                        foreach($passports as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->full_name ?></td>
                        <td><?php echo $record->cpr ?></td>
                        <td><?php echo $record->bhr_mobile ?></td>
                        <td><?php echo $record->remarks ?></td>
                        <td><?php echo $record->ems ?></td>
                        <td><?php echo $record->fee; ?></td>
                        
                        <td class="text-center">
                            
                            
                            <a target="_blank" href="<?php echo base_url(); ?>passports/view_other?id=<?php echo $record->id; ?>" class="btn btn-sm btn-primary" href="" title="View"><i class="fa fa-eye"></i> View </a>
                            
                            
                            <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>passports/view_other?type=print&id=<?php echo $record->id; ?>" title="View"><i class="fa fa-file-pdf-o"></i> Print Recpt </a>
                            
                            <a target="_blank" class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>passports/view_other?type=print&id=<?php echo $record->id; ?>&bar_code" title="View"><i class="fa fa-eye"></i> Print Sticker </a>
                            
                            
                            <?php if ( $role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == 5 ) : ?>
                            <a class="btn btn-sm btn-info" href="<?php echo base_url(); ?>passports/edit_other?id=<?php echo $record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <?php endif; ?>
                            
                            
                            <?php if ( $role == ROLE_ADMIN ) : ?>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" title="Delete" class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url(); ?>passports/delete_other?id=<?php echo $record->id; ?>&redirect=list_others"><i class="fa fa-trash"></i></a>
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


<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "yyyy-mm-dd"
        });
    });
</script>
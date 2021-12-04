<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Professions
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
        
        
     
        
        <?php if ( $role == ROLE_ADMIN || $role == 5 ) : ?>
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="?action=add_new"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Professions </h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    
                    
                <?php
                    $passports = $this->passport_model->get_professions();
                    
                    if(!empty( $passports ))
                    {
                        foreach($passports as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->name ?></td>
                        <td class="text-center">
                            
                            <?php if ( $role == ROLE_ADMIN || $role == ROLE_MANAGER || $role == 5 ) : ?>
                            <a class="btn btn-sm btn-info" href="<?php echo base_url(); ?>passports/professions?action=edit&id=<?php echo $record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <?php endif; ?>
                            
                            
                            <?php if ( $role == ROLE_ADMIN ) : ?>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" title="Delete" class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url(); ?>passports/professions?action=delete&id=<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                
            
                
                
                
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

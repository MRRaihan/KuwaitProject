<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php 
$id = $_GET['id'];
$record = $this->passport_model->get_profession($id);
?>

<div class="content-wrapper">
    
    
 
  
   
   <section class="content">
    
    
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
   
  <div class="box box-primary">  
  
  
  <div class="box-header">
  <h3 class="box-title">Edit Profession </h3>
    </div>
    
  <div class="box-body">
      
      
  <form action="<?php echo base_url(); ?>passports/professions?action=update" method="post" id="basic-form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
      
  <div class="row">
      
  <div class="col-md-12"><div class="form-group">
    <label for="name"> Profession Name </label>
    <input name="name" class="form-control required" placeholder="Enter Profession" id="name" autocomplete="off" required value="<?php echo $record->name; ?>" >
  </div>
  </div>
  
   <div class="col-md-12">
   <div class="form-group">
  <button type="submit" class="btn btn-primary"> Submit </button>
   </div>
    </div>
  
  
  
  
  
  </div>
   </form>
   
   
  </div>
  </div>
        
        
   
   </section>
   
   
</div>
<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" />


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
      
      
      <div class="prints">
            
            
        <a target="_blank" class="btn btn-success" href="<?php echo base_url(); ?>passports/print_passport?type=lost&id=<?php echo $passport->id; ?>" title="Print"><i class="fa fa-file-pdf-o"></i> Print Recpt </a>
                            
        <a class="btn btn-danger" target="_blank" href="<?php echo base_url(); ?>passports/print_passport?type=lost&id=<?php echo $passport->id; ?>&bar_code" title="Print"><i class="fa fa-eye"></i> Print Sticker </a>
        
      </div>
      
      
  <div class="box box-primary"> 
  
  
  <div class="box-header">
  <h3 class="box-title">Edit Other</h3>
    </div>
                    
  
  <div class="box-body"> 
  <form action="<?php echo base_url(); ?>passports/update_other" method="post" id="basic-form" enctype="multipart/form-data">
      
  <input name="id" type="hidden" value="<?php echo $id; ?>" />
  
  
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="full_name"> Full Name </label>
    <input name="full_name" class="form-control" placeholder="Enter Full Name" id="full_name" autocomplete="off" value="<?php echo $passport->full_name; ?>" required>
  </div>
  </div>
  
  
  <div class="col-md-6">
     <div class="form-group">
    <label for="cpr"> CPR </label>
    <input name="cpr" class="form-control" placeholder="Enter CPR" id="cpr" autocomplete="off" value="<?php echo $passport->cpr; ?>" required>
  </div>
  
  
  </div>
  </div>
  
  <div class="row">
      
      
  <div class="col-md-6">
      
      
  <div class="form-group" id="prv">
    <label for="profession"> Profession  </label>
    
     <select class="form-control" id="profession" name="profession">
        <?php
        $is_data = array();
        foreach(  $this->passport_model->get_professions() as $profession ) : ?>
        <option value="<?php echo $profession->name; ?>"  <?php if ( $passport->profession == $profession->name ){ echo 'selected'; $is_data[] = 'yes'; } ?> ><?php echo $profession->name; ?></option>
      <?php endforeach; ?>
      <option value="other" <?php if ( empty($is_data) ) { echo 'selected'; } ?> > Other </option>
      </select>
  </div>
  
   <?php if ( empty($is_data) ) : ?>
   <div class="form-group" id="padded">
    <input name="profession" type="text" class="form-control" placeholder="Enter Profession" id="profession" value="<?php echo $passport->profession; ?>">
  </div>
   <?php endif; ?>
   
   
   <div class="form-group">
  <label for="photocopy1"> Profession File </label>
  <input name="photocopy1" class="form-control" id="photocopy1" type="file">
  </div>
  
  <div class="form-group" id="pimg1">
      
  <?php if ( !empty($passport->p_copy) ) : ?>
  <img src="<?php echo $passport->p_copy; ?>">
  <br> 
  <button class="btn btn-danger" id="remove_image1">  Remove Image </button>
  <?php endif; ?>
  
      
  </div>
  <input type="hidden" name="p_copy" id="pst1" value="<?php echo $passport->p_copy; ?>">
   
   
   
  
  </div>
  <div class="col-md-6">
     <div class="form-group">
    <label for="ps_number"> Passport Number </label>
    <input name="ps_number" class="form-control" id="ps_number" type="text" value="<?php echo $passport->ps_number; ?>">
  </div>
  
  <div class="form-group">
    <label for="remarks"> Remarks </label>
    <input name="remarks" type="text" class="form-control" placeholder="Enter Remarks" id="remarks" value="<?php echo $passport->remarks; ?>">
  </div>
  
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="photocopy"> Passport Photo Copy </label>
    <input name="photocopy" class="form-control" id="photocopy" type="file">
  </div>
  
  <div class="form-group" id="pimg">
  <?php if ( !empty($passport->passport_photocopy) ) : ?>
  <img src="<?php echo $passport->passport_photocopy; ?>">
  <br> 
  <button class="btn btn-danger" id="remove_image">  Remove Image </button>
  <?php endif; ?>
      
  </div>
  <input type="hidden" name="passport_photocopy" id="pst" value="<?php echo $passport->passport_photocopy; ?>" />
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="mailing_address"> Mailing Address </label>
   <textarea class="form-control" rows="4" cols="50" name="mailing_address" autocomplete="off" placeholder="Enter Mailing Address"><?php echo $passport->mailing_address; ?></textarea>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="bhr_mobile"> BHR Mobile Number </label>
    <input name="bhr_mobile" type="number" class="form-control" placeholder="Enter BHR Mobile Number " id="bhr_mobile" value="<?php echo $passport->bhr_mobile; ?>">
  </div>
  </div>
  <div class="col-md-6"><div class="form-group">
    <label for="permanent_address"> Bangladesh Permanent Address </label>
   <textarea class="form-control" rows="4" cols="50" name="permanent_address" autocomplete="off" placeholder="Enter Bangladesh Permanent Address"><?php echo $passport->permanent_address; ?></textarea>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="bd_mobile"> Bangladesh Mobile Number </label>
    <input name="bd_mobile" type="number" class="form-control" placeholder="Enter Bangladesh Mobile Number " id="bd_mobile" value="<?php echo $passport->bd_mobile; ?>">
  </div>
  </div>
  <div class="col-md-6"><div class="form-group">
    <label for="special_skill"> Special Skill </label>
    <input name="special_skill" type="text" class="form-control" placeholder="Enter Special Skill " id="special_skill" value="<?php echo $passport->special_skill; ?>">
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="residence"> Residence CPR / Mobile No  </label>
    <input name="residence" type="text" class="form-control" placeholder="Enter Residence CPR / Mobile No " id="residence" value="<?php echo $passport->residence; ?>">
  </div>
  </div>
  <div class="col-md-6"><div class="form-group">
    <label for="delivery_date"> Delivery Date  </label>
    <input class="form-control datepicker" name="delivery_date" type="text" class="form-control" placeholder="Enter Deliver Date" id="delivery_date" value="<?php echo $passport->delivery_date; ?>" autocomplete="off">
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
      <label for="delivery_branch">Delivery Branch</label>
      <select class="form-control" id="salary" name="delivery_branch">
        <?php foreach(  $this->user_model->branch_list() as $branch ) : ?>
        <option value="<?php echo $branch->userId; ?>" <?php if ( $passport->delivery_branch == $branch->userId ){ echo 'selected'; } ?>><?php echo $branch->name; ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>
  
   <div class="col-md-6">
   <div class="form-group">
      <label for="entry_person">Fee</label>
       <input class="form-control" name="fee" type="number" class="form-control" placeholder="Fee" id="fee" value="<?php echo $passport->fee; ?>">
    </div>
    </div>
  
  
  </div>
  

  
  <button type="submit" class="btn btn-primary"> Submit </button>
</form>
        
  </div>
  </div>
        
   
   </section>
   
   
</div>


<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
    });
</script>

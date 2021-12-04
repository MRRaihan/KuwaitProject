<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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
            
            
        <a target="_blank" class="btn btn-success" href="<?php echo base_url(); ?>passports/print_passport?type=manual&id=<?php echo $passport->id; ?>" title="Print"><i class="fa fa-file-pdf-o"></i> Print Recpt </a>
                            
        <a target="_blank" class="btn btn-danger" href="<?php echo base_url(); ?>passports/print_passport?type=manual&id=<?php echo $passport->id; ?>&bar_code" title="Print"><i class="fa fa-eye"></i> Print Sticker </a>
        
      </div>
      
  <div class="box box-primary"> 
  <div class="box-header">
  <h3 class="box-title">Edit Manual Extent On Passport</h3>
    </div>
    
  <div class="box-body"> 
  
  
  <form action="<?php echo base_url(); ?>passports/update_manual_passport" method="post" id="basic-form" enctype="multipart/form-data">
      
  <input name="id" type="hidden" value="<?php echo $id; ?>" />
  
  
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="full_name"> Full Name </label>
    <input name="full_name" class="form-control" placeholder="Enter Full Name" id="full_name" autocomplete="off" value="<?php echo $passport->full_name; ?>" required>
  </div>
  </div>
  
  <div class="col-md-6"><div class="form-group">
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
  
  <div class="col-md-6"><div class="form-group">
    <label for="ps_number"> Passport Number </label>
    <input name="ps_number" class="form-control" id="ps_number" type="text" value="<?php echo $passport->ps_number; ?>">
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="bd_mobile"> Mobile Number </label>
    <input name="bd_mobile" type="number" class="form-control" placeholder="Enter Mobile Number " id="bd_mobile" value="<?php echo $passport->bd_mobile; ?>">
  </div>
  
   <div class="form-group">
    <label for="bhr_mobile"> BHR Mobile Number </label>
    <input name="bhr_mobile" type="number" class="form-control" placeholder="Enter BHR Mobile Number " id="bhr_mobile" value="<?php echo $passport->bhr_mobile; ?>">
  </div>
  
  
  </div>
  
  <div class="col-md-6"><div class="form-group">
    <label for="mailing_address"> Address </label>
   <textarea class="form-control" rows="4" cols="50" name="mailing_address" autocomplete="off" placeholder="Enter Address"><?php echo $passport->mailing_address; ?></textarea>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="extended_to"> Post Office ID </label>
    <input class="form-control" name="post_office" type="text" class="form-control" placeholder="Enter Post Office ID" id="post_office" autocomplete="off" value="<?php echo $passport->post_office; ?>">
  </div>
  </div>
  
  <div class="col-md-6"><div class="form-group">
    <label for="expiry_date"> Passport Expiry Date  </label>
    <input class="form-control datepicker" name="expiry_date" type="text" class="form-control" placeholder="Enter Deliver Date" id="expiry_date" value="<?php echo $passport->expiry_date; ?>" autocomplete="off">
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="extended_to"> Passport Extending ID </label>
    <input class="form-control datepicker" name="extended_to" type="text" class="form-control" placeholder="Enter Extended To" id="extended_to" value="<?php echo $passport->extended_to; ?>" autocomplete="off">
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
  
  
  <div class="col-md-6"><div class="form-group">
      <label for="salary">Salary</label>
      <select class="form-control" id="salary" name="salary">
        <option value="1" <?php if ( $passport->salary == 1 ) { echo 'selected'; } ?>>Less Than BD 250</option>
        <option value="2" <?php if ( $passport->salary == 2 ) { echo 'selected'; } ?>>Equal or Greater Than BD 250</option>
      </select>
    </div>
    </div>
  </div>
  
  
  <div class="row">
   <div class="col-md-6">
   <div class="form-group">
      <label for="entry_person">Entry Person</label>
       <input class="form-control" name="entry_person" type="text" class="form-control" placeholder="Entry Person Name" id="entry_person" value="<?php echo $passport->entry_person; ?>">
    </div>
    </div>
  

    </div>
  
  <button type="submit" class="btn btn-primary"> Submit </button>
</form>
        
  </div>
  </div> 
        
   
   </section>
   
   
</div>

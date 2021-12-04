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
   
  <div class="box box-primary">  
  
  
  <div class="box-header">
  <h3 class="box-title">Add Renewal Passport</h3>
    </div>
    
  <div class="box-body">
      
      
  <form action="<?php echo base_url(); ?>passports/create_extending_passport" method="post" id="basic-form" enctype="multipart/form-data">
      
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="full_name"> Full Name </label>
    <input name="full_name" class="form-control required" placeholder="Enter Full Name" id="full_name" autocomplete="off" required>
  </div>
  </div>
  
  <div class="col-md-6"><div class="form-group">
    <label for="cpr"> CPR </label>
    <input name="cpr" class="form-control" placeholder="Enter CPR" id="cpr" autocomplete="off" required>
  </div>
  </div>
  </div>
  
  
  <div class="row">
  <div class="col-md-6">
      
      
  <div class="form-group" id="prv">
      <label for="profession"> Profession  </label>
     <select class="form-control" id="profession" name="profession">
        <?php foreach(  $this->passport_model->get_professions() as $profession ) : ?>
        <option value="<?php echo $profession->name; ?>"><?php echo $profession->name; ?></option>
      <?php endforeach; ?>
      <option value="other"> Other </option>
      </select>
    
  </div>
  
  
  <div class="form-group">
  <label for="photocopy1"> Profession File </label>
  <input name="photocopy1" class="form-control" id="photocopy1" type="file">
  </div>
  <div class="form-group" id="pimg1">
  </div>
  <input type="hidden" name="p_copy" id="pst1" value="">
  
  
  
  
  </div>
  
  <div class="col-md-6"><div class="form-group">
    <label for="ps_number"> Passport No  </label>
    <input name="ps_number" type="text" class="form-control" placeholder="Enter Passport Number" id="ps_number">
  </div>
  </div>
  </div>
  
  
  
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="photocopy"> Passport Photo Copy </label>
    <input name="photocopy" class="form-control" id="photocopy" type="file">
  </div>
  <div class="form-group" id="pimg">
  </div>
  <input type="hidden" name="passport_photocopy" id="pst" value="">
  </div>
 
  <div class="col-md-6">
  <div class="form-group">
    <label for="bhr_mobile"> BHR Mobile Number </label>
    <input name="bhr_mobile" type="number" class="form-control" placeholder="Enter BHR Mobile Number " id="bhr_mobile">
  </div>
  </div>
  
  </div>
  
  
  <div class="row">
   <div class="col-md-6"><div class="form-group">
    <label for="bd_mobile">Bangladesh  Mobile Number </label>
    <input name="bd_mobile" type="number" class="form-control" placeholder="Enter Mobile Number " id="bd_mobile">
  </div>
  </div>
  
  
   <div class="col-md-6"><div class="form-group">
    <label for="mailing_address">Mailing Address </label>
   <textarea class="form-control" rows="4" cols="50" name="mailing_address" autocomplete="off" placeholder="Enter Address"></textarea>
  </div>
  </div>
  </div>
  
  
  <div class="row">
      
  <div class="col-md-6">
  <div class="form-group">
    <label for="permanent_address"> Bangladesh Permanent Address </label>
   <textarea class="form-control" rows="4" cols="50" name="permanent_address" autocomplete="off" placeholder="Enter Bangladesh Permanent Address"></textarea>
  </div>
  </div>
 
  <div class="col-md-6">
  <div class="form-group">
    <label for="special_skill"> Special Skill </label>
    <input name="special_skill" type="text" class="form-control" placeholder="Enter Special Skill " id="special_skill">
  </div>
  </div>
      
      
  </div>
  
  
  
  <div class="row">
  <div class="col-md-6"><div class="form-group">
    <label for="expiry_date"> Passport Expiry Date  </label>
    <input class="form-control datepicker" name="expiry_date" type="text" class="form-control" placeholder="Enter Deliver Date" id="expiry_date" autocomplete="off">
  </div>
  </div>
  
  
  <div class="col-md-6"><div class="form-group">
    <label for="extended_to"> Passport Extended To </label>
    <input class="form-control datepicker" name="extended_to" type="text" class="form-control" placeholder="Enter Extended To" id="extended_to" autocomplete="off">
  </div>
  </div>
  
  </div>
  
  
  <div class="row">
      
  <div class="col-md-6"><div class="form-group">
    <label for="delivery_date"> Delivery Date  </label>
    <input class="form-control datepicker" name="delivery_date" type="text" class="form-control" placeholder="Enter Deliver Date" id="delivery_date" value="" autocomplete="off">
  </div>
  </div>
  
  
   <div class="col-md-6"><div class="form-group">
      <label for="delivery_branch">Delivery Branch</label>
      <select class="form-control" id="salary" name="delivery_branch">
        <?php foreach(  $this->user_model->branch_list() as $branch ) : ?>
        <option value="<?php echo $branch->userId; ?>" <?php if ( $current_branch_id == $branch->userId ){ echo 'selected'; } ?>><?php echo $branch->name; ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>
  
  </div>
  
  
  <div class="row">
      
   <div class="col-md-6">
  <div class="form-group">
    <label for="residence"> Residence CPR / Mobile No  </label>
    <input name="residence" type="text" class="form-control" placeholder="Enter Residence CPR / Mobile No " id="residence">
  </div>
  </div> 
      
  <div class="col-md-6"><div class="form-group">
      <label for="salary">Salary</label>
      <select class="form-control" id="salary" name="salary">
        <option value="1">Less Than BD 250</option>
        <option value="2">Equal or Greater Than BD 250</option>
      </select>
    </div>
  </div>
  </div>
  
  <div class="row">
   <div class="col-md-6">
   <div class="form-group">
      <label for="entry_person">Entry Person</label>
       <input class="form-control" name="entry_person" type="text" class="form-control" placeholder="Entry Person Name" id="entry_person">
    </div>
    </div>
  

    </div>
  
  <button type="submit" class="btn btn-primary"> Submit </button>
</form>
  </div>
  </div>
        
        
   
   </section>
   
   
</div>
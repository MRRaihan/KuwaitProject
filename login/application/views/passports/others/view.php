<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> VERSATILO LONDON - View Passport</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
<style>
.recpt{
    top: 50%;
    left: 50%;
    transform: translate(-50% , -49%);
    position: absolute;
    width: 1000px;
} 
  .recpt h1, h2, h3, h4, h5, h6{
      text-align: center;
      margin-top:2px;
      margin-bottom:2px;
  }
  .border{
      width:100%;
      border-bottom:1px solid;
  }
  .padding{
      padding-top:10px;
  }
  
  p.inline {display: inline-block;}
  .bar_code { margin-left: -8px;
}
  
  .bar_text{
    
  }
  </style>
  
<style type="text/css" media="print">
   .recpt{
    top: 30%! important;
    width: 330px;
   }
   
   .btn{
       display:none;
   }
   
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
  </head>
  <body>
      
      
      
    <button style="color: #fff;background-color: #337ab7; border-color: #2e6da4;float:right;padding:20px;cursor:pointer" onclick="window.print()" class="btn btn-primary">  Print</button> 
      
     <div class="recpt">
     
     
      <section class="main">



<?php 
$type = isset($_GET['type']) ? $_GET['type'] :  '';
$passport = $this->passport_model->get_other($_GET['id']);
$office = $this->user_model->getUserInfo($passport->user_id);
?>
    
    <?php if ( $type == 'print') : ?>
    
   <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center </h3>
    
    <div class="padding"></div>
    
    Date : <?php
    $mdate = strtotime($passport->date);
    echo date('d-m-y', $mdate); ?> &nbsp; &nbsp; &nbsp; Receipt :  <span class="psn"> <?php echo sprintf('%05d', $passport->id); ?></span> <div class="padding"></div>
    
    User : <?php echo 2000 + $passport->id; ?>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pay Mode : Cash <div class="padding"></div>
    
    Office : <?php echo $office->name; ?> <div class="padding"></div>
    
    EMS : <?php echo $passport->ems; ?><div class="padding"></div>
    
    Name : <?php echo $passport->full_name; ?><div class="padding"></div>
     
    Passport Number : <span class="psn"> <?php echo $passport->ps_number; ?></span><div class="padding"></div>
     
    <div class="border"></div>
    
    <div class="padding"></div>
    
    Profession : <?php echo $passport->profession; ?> <div class="padding"></div>
    
    Mobile : <?php echo $passport->bhr_mobile; ?> <div class="padding"></div>
    
    CPR : <?php echo $passport->cpr; ?> <div class="padding"></div>
    
    Remarks : <?php echo $passport->remarks; ?> <div class="padding"></div>
    
    Delivery Date : <?php echo $passport->delivery_date; ?><div class="padding"></div>
    
    
    Delivery Branch : <?php echo $this->user_model->getUserInfo($passport->delivery_branch)->name; ?><div class="padding"></div>
    
    <div class="border"></div>
    
    <div class="padding"></div>
    
    <b> Net Amount :  <span style="float:right"> <?php echo number_format((float)$passport->fee, 2, '.', ''); ?> </span> </b>
    
    
    </section>
    
    <style>
    .recpt{
        width:330px;
    }
    .btn{
        display:none;
    }
    </style>
    <?php if ( isset($_GET['bar_code']) ) : ?>
    
    <style>
    .main{
        display:none;
    }
    .recpt{
    top: 20%! important;
   }
        
    </style>
    
    <?php else : ?>
    
    <style>
    .bar2{
        display:none;
    }
    </style>
    
    
    <?php endif; ?>
    
    
    <div class="padding"></div>
    <img src="<?php echo base_url(); ?>passports/bar_code/VL<?php echo date('mY'); ?><?php echo sprintf('%05d', $passport->id); ?>BH" class="bar_code" />
     <b class="bar_text"> VL<?php echo date('mY'); ?>BH<?php echo sprintf('%05d', $passport->id); ?> , AMT : <?php echo number_format((float)$passport->fee, 2, '.', ''); ?>
     </b>
     <br/>
     <b class="bar_text bar2">
     Name : <?php echo $passport->full_name; ?> <br/>  Passport No : <?php echo $passport->ps_number; ?> <br/>  CPR : <?php echo $passport->cpr; ?> <br/>  Mobile : <?php echo $passport->bhr_mobile; ?> 
     </b>
     
     
     <script type="text/javascript">
      window.onload = function() { window.print(); }
     </script>
     
     
    <?php else : /// Main   ?>
   
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center </h3>
    
    <div class="padding"></div>
    
    EMS : <?php echo $passport->ems; ?><div class="padding"></div>
    
    Full Name : <?php echo $passport->full_name; ?><div class="padding"></div>
     
    Passport Number : <?php echo $passport->ps_number; ?><div class="padding"></div> 
    
    Entry Date : <?php echo $passport->date; ?><div class="padding"></div>  
    
    
    
    Profession : <?php echo $passport->profession; ?> <div class="padding"></div>
    
    <?php if ( !empty($passport->p_copy) ) : ?>
    Profession File : <a style="color:red;font-weight:bold" href="<?php echo $passport->p_copy; ?>" target="_blank"> View </a> <div class="padding"></div>
    <?php endif; ?>
    
    
    
    <?php if ( !empty($passport->passport_photocopy) ) : ?>
    Passport Photocopy : <a style="color:red;font-weight:bold" href="<?php echo $passport->passport_photocopy; ?>" target="_blank"> View </a> <div class="padding"></div>
    <?php endif; ?>
    
    
    Bangladesh Mobile : <?php echo $passport->bd_mobile; ?> 
    <div class="padding"></div>
    
    BHR Mobile : <?php echo $passport->bhr_mobile; ?> 
    <div class="padding"></div>
    
    CPR : <?php echo $passport->cpr; ?> <div class="padding"></div>
    
   Remarks : <?php echo $passport->remarks; ?> <div class="padding"></div>
    
   Mailing Address :  <?php echo $passport->mailing_address; ?><div class="padding"></div>
   
    Bangladesh Permanent Address : <?php echo $passport->permanent_address; ?><div class="padding"></div>
    
    Special Skill : <?php echo $passport->special_skill; ?><div class="padding"></div>
  
    Residence CPR / Mobile No : <?php echo $passport->residence; ?><div class="padding"></div>
    
    Delivery Date : <?php echo $passport->delivery_date; ?><div class="padding"></div>
    
    
    Delivery Branch : <?php echo $this->user_model->getUserInfo($passport->delivery_branch)->name; ?><div class="padding"></div>
    
    <div class="border"></div>
    
    <div class="padding"></div>
    
    <b> Net Amount :  <span style="float:right"> <?php echo number_format((float)$passport->fee, 2, '.', ''); ?> </span> </b>
   
    
    <?php endif; ?>
    
    
    </section> 
   
    
    
   
   
   </div>
      
  </body>
  </html>
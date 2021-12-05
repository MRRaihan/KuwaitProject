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
    width: 400px;
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
$type = $_GET['type'];
if( $type ==  'lost' ) :
$passport = $this->passport_model->get_lost_passport($_GET['id']);
$office = $this->user_model->getUserInfo($passport->user_id);
?>
    
   
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Lost Passport </h3>
    
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
    
   Mailing Address :  <?php echo $passport->mailing_address; ?><div class="padding"></div>
   
    Bangladesh Permanent Address : <?php echo $passport->permanent_address; ?><div class="padding"></div>
    
    Special Skill : <?php echo $passport->special_skill; ?><div class="padding"></div>
  
    Residence CPR / Mobile No : <?php echo $passport->residence; ?><div class="padding"></div>
  
    Entry Person : <?php echo $passport->entry_person; ?><div class="padding"></div>
    
    Delivery Date : <?php echo $passport->delivery_date; ?><div class="padding"></div>
    
    
    Delivery Branch : <?php echo $this->user_model->getUserInfo($passport->delivery_branch)->name; ?><div class="padding"></div>
    
    <div class="border"></div>
    
    <div class="padding"></div>
    
    <?php 
     $v = ( $passport->salary == 1) ? 4 : 4; 
     $e = ( $passport->salary == 1) ? 13 : 41.50;
     $total = $v + $e
     ?>
    
    
    Versatilo Fee : <span style="float:right"> <?php echo number_format((float)$v, 2, '.', ''); ?> </span>
    
    <div class="padding"></div>
    
    Embassy Fee : <span style="float:right"> <?php echo number_format((float)$e, 2, '.', ''); ?> </span>
    <div class="padding"></div>
    
    <div class="border"></div> 
    
    <div class="padding"></div>
    
    <b> Net Amount :  <span style="float:right"> <?php echo number_format((float)$total, 2, '.', ''); ?> </span> </b>
   
<?php elseif( $type ==  'extend' ) :
$passport = $this->passport_model->get_extending_passport($_GET['id']);
$office = $this->user_model->getUserInfo($passport->user_id);
?>
    
    
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Renewal Passport </h3>
    
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
    
   Mailing Address :  <?php echo $passport->mailing_address; ?><div class="padding"></div>
   
    Bangladesh Permanent Address : <?php echo $passport->permanent_address; ?><div class="padding"></div>
    
    Special Skill : <?php echo $passport->special_skill; ?><div class="padding"></div>
  
    Residence CPR / Mobile No : <?php echo $passport->residence; ?><div class="padding"></div>
  
    
    Passport Expiry Date : <?php echo $passport->expiry_date; ?><div class="padding"></div>
    
    
    Passport Extended To : <?php echo $passport->extended_to; ?> <div class="padding"></div>
    
    Entry Person : <?php echo $passport->entry_person; ?><div class="padding"></div>
    
    Delivery Date : <?php echo $passport->delivery_date; ?><div class="padding"></div>
    
    
    Delivery Branch : <?php echo $this->user_model->getUserInfo($passport->delivery_branch)->name; ?><div class="padding"></div>
    
    <div class="border"></div>
    
    <div class="padding"></div>
    
     <?php 
     $v = ( $passport->salary == 1) ? 4 : 4; 
     $e = ( $passport->salary == 1) ? 13 : 41.50;
     $total = $v + $e
     ?>
    
    
    Versatilo Fee : <span style="float:right"> <?php echo number_format((float)$v, 2, '.', ''); ?> </span>
    
    <div class="padding"></div>
    
    Embassy Fee : <span style="float:right"> <?php echo number_format((float)$e, 2, '.', ''); ?> </span>
    <div class="padding"></div>
    
    <div class="border"></div> 
    
    <div class="padding"></div>
    
    <b> Net Amount :  <span style="float:right"> <?php echo number_format((float)$total, 2, '.', ''); ?> </span> </b>
    
<?php elseif( $type ==  'manual' ) :
$passport = $this->passport_model->get_manual_passport($_GET['id']);
$office = $this->user_model->getUserInfo($passport->user_id);
?>
    
    
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Manual Extension </h3>
    
    <div class="padding"></div>
    
    
    EMS : <?php echo $passport->ems; ?><div class="padding"></div>
    
    Name : <?php echo $passport->full_name; ?><div class="padding"></div>
     
    Passport Number : <?php echo $passport->ps_number; ?><div class="padding"></div> 
    
    Entry Date : <?php echo $passport->date; ?><div class="padding"></div>
    
    Profession : <?php echo $passport->profession; ?> <div class="padding"></div>
    
    <?php if ( !empty($passport->p_copy) ) : ?>
    Profession File : <a style="color:red;font-weight:bold" href="<?php echo $passport->p_copy; ?>" target="_blank"> View </a> <div class="padding"></div>
    <?php endif; ?>
    
     Mobile : <?php echo $passport->bd_mobile; ?> 
    <div class="padding"></div>
    
    
    CPR : <?php echo $passport->cpr; ?> <div class="padding"></div>
    
    Address :  <?php echo $passport->mailing_address; ?><div class="padding"></div>
    
    POST Office ID : <?php echo $passport->post_office; ?><div class="padding"></div>
   
    Passport Expiry Date : <?php echo $passport->expiry_date; ?><div class="padding"></div>
    
   Passport Extended To : <?php echo $passport->extended_to; ?> <div class="padding"></div>
 
   Entry Person : <?php echo $passport->entry_person; ?><div class="padding"></div>
 
    Delivery Date : <?php echo $passport->delivery_date; ?><div class="padding"></div>
    
    Delivery Branch : <?php echo $this->user_model->getUserInfo($passport->delivery_branch)->name; ?><div class="padding"></div>
    
    
    <div class="border"></div>
    
    <div class="padding"></div>
    
    <?php 
     $v = ( $passport->salary == 1) ? 1 : 1; 
     $e = ( $passport->salary == 1) ? 1.5 : 1.5;
     $total = $v + $e
     ?>
    
    
    Versatilo Fee : <span style="float:right"> <?php echo number_format((float)$v, 2, '.', ''); ?> </span>
    
    <div class="padding"></div>
    
    Embassy Fee : <span style="float:right"> <?php echo number_format((float)$e, 2, '.', ''); ?> </span>
    <div class="padding"></div>
    
    <div class="border"></div> 
    
    <div class="padding"></div>
    
    <b> Net Amount :  <span style="float:right"> <?php echo number_format((float)$total, 2, '.', ''); ?> </span> </b>
    
    
    <?php endif; ?>
    
    
    
    
    <?php //////////////// Agreement /////////// ?>
    
    
    
<?php
if( $type ==  'lost-agreement' ) :
$passport = $this->passport_model->get_lost_passport($_GET['id']);
?>
    
    
      
    <h2> <u>অঙ্গীকারনামা</u>  </h2>
    
    
    
    
<div class="padding"></div>
<div class="padding"></div><div class="padding"></div>[ স্বরাষ্ট্র মন্ত্রণালয়ের পত্র নং-৪৪,০০,০০০০,০৩৮,০২,০০১,১১-১৬৩ তারিখঃ ২০ জানুয়ারী, ২০১৬ অনুযায়ী।নং-বিডিবি
]
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    
   নং-বিডিবি/এমএরপি /হারানো-12083


<span style="float:right"> <?php echo date('d M Y'); ?> </span>
    
    <div class="padding"></div>
    <div class="padding"></div>
    
     <div class="padding"></div><div class="padding"></div>
    
    <div class="padding"></div><div class="padding"></div>
     
    
    আমি <?php echo $passport->full_name; ?> পূর্বের পাসপোর্ট নাং-<?php echo $passport->ps_number; ?> ,আমি বাহ্রাইনে আগমনের পর আমার পূর্বের মেশিন রিডেবল পাসপোর্ট মালিক ফেরত দেয়নি ।  
    
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
  
    
     আমি <?php echo $passport->full_name; ?> এই মর্মে দূতাবাসের নিকট অঙ্গীকার করছি উপরোক্ত তথ্য সঠিক এবং কোন ভুল তথ্য দিয়ে থাকলে আইনত দন্ডনীয় হবে।
    
    
    
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    <div class="padding"></div>
    
    
<span style="float:right">
আপনার একান্ত অনুগত
<br><br> নাম : <?php echo $passport->full_name; ?>
<br><br>মোবাইল : <?php echo $passport->bd_mobile; ?>
          
</span>
    
    
<style>
.recpt {
    top: 40%;
    left: 50%;
    transform: translate(-50% , -49%);
    position: absolute;
    width: 752px;
}
</style>





<script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>



<?php endif; ?>
    
    
    
    </section> 
   
    
    
   
   
   </div>
      
  </body>
  </html>
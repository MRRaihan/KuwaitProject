<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> VERSATILO LONDON - Print - <?php time(); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
<style>
body{ font-weight:bold; }
.recpt{
    top: 50%;
    left: 50%;
    transform: translate(-50% , -49%);
    position: absolute;
    width: 330px;
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
  .psn{
      font-size:20px;
  }
  </style>
  
<style type="text/css" media="print">
   body{ font-weight:bold; }
   .recpt{
    top: 30%! important;
   }
   
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
  </head>
  <body onload="window.print();">
      
     <div class="recpt">
     
     
      <section class="main">
<?php 
$type = $_GET['type'];
if( $type ==  'lost' ) :
$passport = $this->passport_model->get_lost_passport($_GET['id']);
$office = $this->user_model->getUserInfo($passport->user_id);
$p_type = 'LP';
?>
    
   
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Lost Passport </h3>
    
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
$p_type = 'EP';
?>
    
    
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Renewal Passport </h3>
    
    <div class="padding"></div>
    
    Date : <?php
    $mdate = strtotime($passport->date);
    echo date('d-m-y', $mdate); ?> &nbsp; &nbsp; &nbsp; Receipt : 
     <span class="psn"><?php echo sprintf('%05d', $passport->id); ?></span> <div class="padding"></div>
    
    User : <?php echo 9000 + $passport->id; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pay Mode : Cash <div class="padding"></div>
    
    Office : <?php echo $office->name; ?> <div class="padding"></div>
    
    EMS : <?php echo $passport->ems; ?><div class="padding"></div>
    
    Name : <?php echo $passport->full_name; ?><div class="padding"></div>
     
    Passport Number : <span class="psn"> <?php echo $passport->ps_number; ?></span><div class="padding"></div>
     
    <div class="border"></div>
    
    <div class="padding"></div>
    
    Profession : <?php echo $passport->profession; ?> <div class="padding"></div>
    
    Mobile : <?php echo $passport->bhr_mobile; ?> <div class="padding"></div>
    
    CPR : <?php echo $passport->cpr; ?> <div class="padding"></div>
    
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
$p_type = 'MP';
?>
    
    
    <h2> VERSATILO LONDON W.L.L </h2>
    
    <h3> Happy Center <br/> Manual Extension </h3>
    
    <div class="padding"></div>
    
     Date : <?php
    $mdate = strtotime($passport->date);
    echo date('d-m-y', $mdate); ?> &nbsp; &nbsp; &nbsp; Receipt : 
     <span class="psn"><?php echo sprintf('%05d', $passport->id); ?></span> <div class="padding"></div>
    
    User : <?php echo 8000 + $passport->id; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pay Mode : Cash <div class="padding"></div>
    
    Office : <?php echo $office->name; ?> <div class="padding"></div>
    
    EMS : <?php echo $passport->ems; ?><div class="padding"></div>
    
    Name : <?php echo $passport->full_name; ?><div class="padding"></div>
    
    Passport Number : <span class="psn"> <span class="psn"> <?php echo $passport->ps_number; ?></span></span><div class="padding"></div>
     
    <div class="border"></div>
    
    <div class="padding"></div>
    
    Profession : <?php echo $passport->profession; ?> <div class="padding"></div>
    
    Mobile : <?php echo $passport->bhr_mobile; ?> <div class="padding"></div>
    
    CPR : <?php echo $passport->cpr; ?> <div class="padding"></div>
    
    Post Office ID : <?php echo $passport->post_office; ?><div class="padding"></div>
    
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
    
    </section> 
    
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
    
        <?php                                
        if ($passport->r_id == 0) {
            $p_type ='VL'; 
        }
        ?>
    <div class="padding"></div>
    <img src="<?php echo base_url(); ?>passports/bar_code/<?php echo $p_type; ?><?php echo date('mY'); ?><?php echo sprintf('%05d', $passport->id); ?>BH" class="bar_code" />
     <b class="bar_text"> <?php echo $p_type; ?><?php echo date('mY'); ?>BH<?php echo sprintf('%05d', $passport->id); ?> , AMT : <?php echo number_format((float)$total, 2, '.', ''); ?>
     </b>
     <br/>
     <b class="bar_text bar2">
     Name : <?php echo $passport->full_name; ?> <br/>  Passport No : <?php echo $passport->ps_number; ?> <br/>  CPR : <?php echo $passport->cpr; ?> <br/>  Mobile : <?php echo $passport->bhr_mobile; ?> 
     </b>
    
   
   
   </div>
      
  </body>
  </html>
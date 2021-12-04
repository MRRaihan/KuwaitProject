<?php
$type = isset( $_GET['type'] ) ? $_GET['type'] : '';
$uid = '';
if($role == ROLE_ADMIN || $role == 4 || $role == 5 || $role == 2){
$uid = isset($_GET['branch_id']) ? $_GET['branch_id'] : '';
} else {
$uid = $user_id;
}
?>
<!doctype html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> Report Table </title>
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/report.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main-report.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/util.css">
    <style type="text/css" media="print">
    @page{
      
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    
     @page { 
        size: landscape;
    }
    .pull-right, .viewp{
        display:none;
    }
    </style>
    
   </head>
   <body>


   
    
    <br/>
    <br/>
    

    
    

<div class="container">
    
    
    <div class="pull-right"> <button onclick="window.print()" class="btn btn-primary"> <span class="glyphicon glyphicon-print"></span> Print</button> </div>
    
    <center><h4> VERSATILO LONDON W.L.L </h4> <br/> </center>
    
    <?php if ( $type == 'shift_to_embassy' ) : ?>
    
    <?php
    $from = strtotime($_GET['from_date'].' 00:00:00');
    $to =   strtotime($_GET['to_date'].' 23:59:59');
    $args = array(
        'type' => 'lost',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_shifted',
       // 'count' => 1
        );
    $lost = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'extend',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_shifted',
       // 'count' => 1
        );
    $extend = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'manual',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_shifted',
       // 'count' => 1
        );
    $manual = $this->passport_model->get_passports($args);
    $sum = 0;
    $vs = 0;
    $em = 0;
    $sl = 0;
    ?>
    <div class="mid">
     
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    <h4 class="text-center mb-3">Shift To Embassy Reports 
                    <br/><br/>
                    From : <b><?php echo $_GET['from_date']; ?></b>
                    - 
                    To : <b><?php echo $_GET['to_date']; ?></b>
                    </h4>
                    
                     <br/> <br/>

                   <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col"> SL </th>
                            <th scope="col">Passport Type </th>
                            <th scope="col">Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Passport NO.</th>
                            <th scope="col">BH NO.</th>                     
                            <th scope="col">BARCODE.</th>
                            <th scope="col">EMS</th>
                            <th scope="col">Versatilo Fee</th>
                            <th scope="col">Embassy Fee</th>
                            <th scope="col" class="text-right">Total Fee</th>
                            <th scope="col" class="text-right viewp"> View </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach (  $lost as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Lost Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>  
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'LP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=lost&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                         <?php foreach (  $extend as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Renewal Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td> 
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'EP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=extend&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                            
                        <?php foreach (  $manual as $record ) :
                         $v = ( $record->salary == 1) ? 1 : 1; 
                         $e = ( $record->salary == 1) ? 1.5 : 1.5;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Manual Extension </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td> 
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'MP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=manual&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                        <tr>
                        <td colspan="8"></td>
                        <td class="text-right"> <b>Total : <?php echo $vs; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $em; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $sum; ?></b></td>
                        </tr>
                            
                          
                
                           
                        </tbody>
                    </table>
                    
                <b> Lost Passports : <b style="color:red"> <?php echo count($lost); ?> </b>,
                Renewal Passports : <b style="color:red"> <?php echo count($extend); ?> </b> ,
                Manual Extension :  <b style="color:red"> <?php echo count($manual); ?> </b>
                
                --
                
                Total Passports :  <b style="color:red"> <?php echo count($lost) + count($extend) + count($manual); ?> </b>
                
                </b>
                    
                    
                </div>
            </div>
            <br>
            </div>
       
    <?php endif; ?>
    
    <?php if ( $type == 'receive_to_embassy' ) : ?>
    
    <?php
    $from = strtotime($_GET['from_date'].' 00:00:00');
    $to =   strtotime($_GET['to_date'].' 23:59:59');
    $args = array(
        'type' => 'lost',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_received',
       // 'count' => 1
        );
    $lost = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'extend',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_received',
       // 'count' => 1
        );
    $extend = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'manual',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_received',
       // 'count' => 1
        );
    $manual = $this->passport_model->get_passports($args);
    $sum = 0;
    $vs = 0;
    $em = 0;
    $sl = 0;
    ?>
    <div class="mid">
     
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    <h4 class="text-center mb-3">Receive To Embassy Reports 
                    <br/><br/>
                    From : <b><?php echo $_GET['from_date']; ?></b>
                    - 
                    To : <b><?php echo $_GET['to_date']; ?></b>
                    </h4>
                    
                     <br/> <br/>

                   <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <th scope="col"> SL </th>
                            <th scope="col">Passport Type </th>
                            <th scope="col">Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Passport NO.</th>
                            <th scope="col">BH NO.</th>                     
                            <th scope="col">BARCODE.</th>
                            <th scope="col">EMS</th>
                            <th scope="col">Versatilo Fee</th>
                            <th scope="col">Embassy Fee</th>
                            <th scope="col" class="text-right">Total Fee</th>
                            <th scope="col" class="text-right viewp"> View </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach (  $lost as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Lost Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'LP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td> 
                                
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=lost&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                         <?php foreach (  $extend as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Renewal Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                 <td> <?php echo $record->bhr_mobile; ?>  </td>
                                 <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'EP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                 <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=extend&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                            
                        <?php foreach (  $manual as $record ) :
                         $v = ( $record->salary == 1) ? 1 : 1; 
                         $e = ( $record->salary == 1) ? 1.5 : 1.5;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Manual Extension </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'MP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                 <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=manual&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                        <tr>
                        <td colspan="8"></td>
                        <td class="text-right"> <b>Total : <?php echo $vs; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $em; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $sum; ?></b></td>
                        </tr>
                            
                          
                
                           
                        </tbody>
                    </table>
                    
                <b> Lost Passports : <b style="color:red"> <?php echo count($lost); ?> </b>,
                Renewal Passports : <b style="color:red"> <?php echo count($extend); ?> </b> ,
                Manual Extension :  <b style="color:red"> <?php echo count($manual); ?> </b>
                
                --
                
                Total Passports :  <b style="color:red"> <?php echo count($lost) + count($extend) + count($manual); ?> </b>
                
                </b>
                </div>
            </div>
            <br>
            </div>
       
    <?php endif; ?>
    
     <?php if ( $type == 'delivery_reports' ) : ?>
    
    <?php
    $from = strtotime($_GET['from_date'].' 00:00:00');
    $to =   strtotime($_GET['to_date'].' 23:59:59');
    $args = array(
        'type' => 'lost',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_delivered',
       // 'count' => 1
        );
    $lost = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'extend',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_delivered',
       // 'count' => 1
        );
    $extend = $this->passport_model->get_passports($args);
    
    $args = array(
        'type' => 'manual',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'is_delivered',
       // 'count' => 1
        );
    $manual = $this->passport_model->get_passports($args);
    $sum = 0;
    $vs = 0;
    $em = 0;
    $sl = 0;
    ?>
    <div class="mid">
     
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    <h4 class="text-center mb-3">Delivery Reports 
                    <br/><br/>
                    From : <b><?php echo $_GET['from_date']; ?></b>
                    - 
                    To : <b><?php echo $_GET['to_date']; ?></b>
                    </h4>
                    
                     <br/> <br/>

                   <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col"> SL </th>
                            <th scope="col">Passport Type </th>
                            <th scope="col">Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Passport NO.</th>
                            <th scope="col">BH NO.</th>                     
                            <th scope="col">BARCODE.</th>
                            <th scope="col">EMS</th>
                            <th scope="col">Versatilo Fee</th>
                            <th scope="col">Embassy Fee</th>
                            <th scope="col" class="text-right">Total Fee</th>
                            <th scope="col" class="text-right viewp"> View </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach (  $lost as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Lost Passport</td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'LP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=lost&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                         <?php foreach (  $extend as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Renewal Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                 <td> <?php echo $record->bhr_mobile; ?>  </td>
                                 <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'EP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=extend&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                            
                        <?php foreach (  $manual as $record ) :
                         $v = ( $record->salary == 1) ? 1 : 1; 
                         $e = ( $record->salary == 1) ? 1.5 : 1.5;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Manual Extension </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                 <td> <?php echo $record->bhr_mobile; ?>  </td> 
                                 <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'MP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td> 
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=manual&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                        <tr>
                        <td colspan="8"></td>
                        <td class="text-right"> <b>Total : <?php echo $vs; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $em; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $sum; ?></b></td>
                        </tr>
                            
                          
                
                           
                        </tbody>
                    </table>
                    
                <b> Lost Passports : <b style="color:red"> <?php echo count($lost); ?> </b>,
                Renewal Passports : <b style="color:red"> <?php echo count($extend); ?> </b> ,
                Manual Extension :  <b style="color:red"> <?php echo count($manual); ?> </b>
                
                --
                
                Total Passports :  <b style="color:red"> <?php echo count($lost) + count($extend) + count($manual); ?> </b>
                
                </b>
                </div>
            </div>
            <br>
            </div>
       
    <?php endif; ?>
    
    <?php //////////////////////// All Passport Rerports ///////////////// ?>
    
    
    <?php if ( $type == 'all' ) : ?>
    
    <?php
    $from = $_GET['from_date'];
    $from = date("Y-m-d", strtotime($from));
    $from = "$from 00:00:00";

	$to = $_GET['to_date'];
    $to = date("Y-m-d", strtotime($to));
    $to = "$to 23:59:59";
    
    
    $args = array(
        'type' => 'lost',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'date'
        );
    $lost = $this->passport_model->get_passports($args);
    $l = count($lost);
    
    $args = array(
        'type' => 'extend',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'date'
        );
    $extend = $this->passport_model->get_passports($args);
    $ex = count($extend);
    
    $args = array(
        'type' => 'manual',
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'date'
        );
    $manual = $this->passport_model->get_passports($args);
    $m = count($manual);
    
    $sum = 0;
    $vs = 0;
    $em = 0;
    $sl = 0;
    ?>
    <div class="mid">
     
                 <div class="row">
                   <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">

                    <h4 class="text-center mb-3">Passports Report 
                    <br/><br/>
                    
                    <?php if ( is_numeric($uid) && !empty( $this->user_model->getUserInfo($uid) ) ) :
                    $office = $this->user_model->getUserInfo($uid);
                    ?>
                    
                    <b style="font-size:17px"> Branch : <?php echo $office->name; ?> </b>
                    
                    <br/><br/>
                    <?php endif; ?>
                    
                    
                    From : <b><?php echo $_GET['from_date']; ?></b>
                    - 
                    To : <b><?php echo $_GET['to_date']; ?></b>
                    </h4>
                    
                     <br/> <br/>

                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col"> SL </th>
                            <th scope="col">Passport Type </th>
                            <th scope="col">Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Passport NO.</th>
                            <th scope="col">BH NO.</th>                     
                            <th scope="col">BARCODE.</th>
                            <th scope="col">EMS</th>
                            <th scope="col">Versatilo Fee</th>
                            <th scope="col">Embassy Fee</th>
                            <th scope="col" class="text-right">Total Fee</th>
                            <th scope="col" class="text-right viewp"> View </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach (  $lost as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Lost Passport</td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>
                                <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'LP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=lost&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                         <?php foreach (  $extend as $record ) :
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Renewal Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                
                                <td> <?php echo $record->ps_number; ?>  </td>
                                 <td> <?php echo $record->bhr_mobile; ?>  </td> 
                                 <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'EP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                <td> <?php echo $record->ems; ?> </td>
                                
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=extend&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                            
                        <?php foreach (  $manual as $record ) :
                         $v = ( $record->salary == 1) ? 1 : 1; 
                         $e = ( $record->salary == 1) ? 1.5 : 1.5;
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> Manual Extension </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                 <td> <?php echo $record->bhr_mobile; ?>  </td>
                                 <td>
                                <?php                                
                                if ($record->r_id == 1) {
                                    echo 'MP'; 
                                }else {
                                     echo 'VL'; 
                                }
                                ?>
                                <?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH
                                </td>
                                 <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=manual&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
                            </tr>
                            <?php endforeach; ?>
                        <tr>
                        <td colspan="8"></td>
                        <td class="text-right"> <b>Total : <?php echo $vs; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $em; ?></b> </td>
                        <td class="text-right"> <b>Total : <?php echo $sum; ?></b></td>
                        </tr>
                            
                          
                
                           
                        </tbody>
                    </table>
                    
                <b> Lost Passports : <b style="color:red"> <?php echo $l; ?> </b>,
                Renewal Passports : <b style="color:red"> <?php echo $ex; ?> </b> ,
                Manual Extension :  <b style="color:red"> <?php echo $m; ?> </b>
                
                --
                
                Total Passports :  <b style="color:red"> <?php echo $l + $ex + $m; ?> </b>
                
                </b>
             
                    
                    
                </div>
            </div>
            <br>
            </div>
       
    <?php endif; ?>
    
  <?php //////////////////////// All Passport Rerports ///////////////// ?>
  
  
  <?php if ( in_array( $type, array('all_lost', 'all_manual', 'all_extend') ) ){
      include('table_type.php');
  }
  ?>
  
    
</div>


</body>
</html>

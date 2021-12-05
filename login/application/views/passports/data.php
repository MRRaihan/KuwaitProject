<?php

$type = isset($_GET['type']) ? $_GET['type'] : '';
$args = array(
'type' => $type,
);
$passports = $this->passport_model->get_passports($args);


if ( empty( $_GET['cpr'] ) || empty( $_GET['bd_mobile'] )  ){
    echo '<div class="alert alert-danger" role="alert">Please Enter both cpr and mobile number</div>';
    exit;
}


if ( !empty ( $passports ) ){
    
foreach( $passports as $record){
                       
                       echo '<div class="alert alert-success" role="alert"> Passport Status <br/> ';
                       
                       $shifted = $record->is_shifted;
                       $received = $record->is_received;
                       $delivered = $record->is_delivered;
                       
                       if ( $shifted == 0 && $received == 0 && $delivered == 0 ){
                           echo ' <a class="btn btn-sm btn-danger" href="javascript:void(0);" title="Pending Shift"><i class="fa fa-clock-o"></i> Pending Shift </a>';
                       }
                       
                       if ( $shifted > 0 && $received == 0 && $delivered == 0 ){
                           echo ' <a class="btn btn-sm btn-success" href="javascript:void(0);" title="Shifted"><i class="fa fa-check"></i> Shifted </a>';
                       }
                       
                       if ( $shifted > 0 && $received >0 && $delivered == 0 ){
                           echo ' <a class="btn btn-sm btn-success" href="javascript:void(0);" title="Received"><i class="fa fa-check"></i> Received </a>';
                       }
                       
                       if ( $shifted > 0 && $received >0 && $delivered > 0 ){
                           echo ' <a class="btn btn-sm btn-success" href="javascript:void(0);" title="Delivered"><i class="fa fa-check"></i> Delivered </a>';
                       }
                       
                       echo '</div>';
                         
}

}else {
    echo '<div class="alert alert-danger" role="alert"> No Passport Found </div>';
}
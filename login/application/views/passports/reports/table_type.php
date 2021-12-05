 <?php
    $from = $_GET['from_date'];
    $from = date("Y-m-d", strtotime($from));
    $from = "$from 00:00:00";

	$to = $_GET['to_date'];
    $to = date("Y-m-d", strtotime($to));
    $to = "$to 23:59:59";
    
    $all_type = str_replace('all_', '', $type);
 

    $args = array(
        'type' => $all_type,
        'user_id' => $uid,
        'time_between' => 1,
        'time_from' => $from,
        'time_to' => $to,
        'time_field' => 'date'
        );
    $lost = $this->passport_model->get_passports($args);
    $l = count($lost);
    
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
                            <th scope="col" class="text-right viewp">View</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach (  $lost as $record ) :
                         if ( $all_type == 'manual' ){
                         $v = ( $record->salary == 1) ? 1 : 1; 
                         $e = ( $record->salary == 1) ? 1.5 : 1.5;
                         } else {
                         $v = ( $record->salary == 1) ? 4 : 4; 
                         $e = ( $record->salary == 1) ? 13 : 41.50;
                         }
                         
                         $total = $v + $e;
                         $sum+= $total;
                         $vs+= $v;
                         $em+= $e;
                         $sl++;
                        ?>
                            <tr>
                                <td> <?php echo $sl; ?></td>
                                <td> <?php 
                                if ( $all_type == 'extend'){
                                    echo 'Renewal';
                                } else { echo ucfirst($all_type); } ?> Passport </td>
                                <td> <?php echo $record->full_name; ?>  </td>
                                <td> <?php echo $record->cpr; ?>  </td>
                                <td> <?php echo $record->ps_number; ?>  </td>
                                <td> <?php echo $record->bhr_mobile; ?>  </td>
                                <td> VL<?php echo date('mY'); ?><?php echo sprintf('%05d', $record->id); ?>BH </td>
                                <td> <?php echo $record->ems; ?> </td>
                                <td class="text-right"> <?php echo $v; ?>  </td>
                                <td class="text-right"> <?php echo $e; ?>  </td>
                                <td class="text-right"> <?php echo $total; ?>  </td>
                                <td class="text-right viewp"> <a href="http://versatilo.london/login/passports/view_passport?type=<?php echo $all_type; ?>&id=<?php echo $record->id; ?>" target="_blank">View</a>  </td>
                               
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
                    
                
                Total Passports :  <b style="color:red"> <?php echo $l; ?> </b>
                
                </b>
             
                    
                    
                </div>
            </div>
            <br>
            </div>

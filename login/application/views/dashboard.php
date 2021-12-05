<?php 
$main = $this->passport_model;
if($role == ROLE_ADMIN || $role == 4 || $role == 5 || $role == 2 ){
$b_id = '';
} else {
$b_id = $current_branch_id;
}
$type = isset($_GET['type']) ? $_GET['type'] : '';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        
        
        
        <div class="row">
          <form action="" method="get" id="searchList">
             <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="cpr" value="<?php echo isset($_GET['cpr']) ? $_GET['cpr'] : ''; ?>" class="form-control" placeholder="Search by CPR">
            </div>
           
           <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="bd_mobile" value="<?php echo isset($_GET['bd_mobile']) ? $_GET['bd_mobile'] : ''; ?>" class="form-control" placeholder="Search by Mobile Number">
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
                
            <select name="type" class="form-control" required>
            <option value=""> Select Passport Type </option>
            <option value="lost" <?php if ( $type == 'lost') { echo 'selected'; } ?>> Lost Passport </option>
            <option value="extend" <?php if ( $type == 'extend') { echo 'selected'; } ?>> Renewal Passport </option>
            <option value="manual" <?php if ( $type == 'manual') { echo 'selected'; } ?>> Manual Passport </option>
            </select>
             
            </div>
            
            
            <div class="col-lg-3 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
          </form>
        </div>
        
        
        <?php if ( isset( $_GET['cpr'] ) || isset( $_GET['cpr'] ) ) : ?>
        
        <?php $args = array(
               'type' => $type,
                );
        $passports = $this->passport_model->get_passports($args);
        if ( !empty (  $passports ) ){ ?>
        
        <div class="box box-white" style="padding:20px">
                <table class="table table-hover">
                    <tr>
                    
                        <th>Name</th>
                        <th>CPR</th>
                        <th>Mobile Number</th>
                        <th>Passport Type</th>
                        <th class="text-center">Status</th>
                    </tr>
                    
                <?php foreach($passports as $record) : ?>
                    <tr>
                      
                        <td><?php echo $record->full_name ?></td>
                        <td><?php echo $record->cpr ?></td>
                        <td><?php echo $record->bd_mobile ?></td>
                        
                        <td>
                        <?php 
                        if ( $type == 'lost')   { echo 'Lost Passport'; }
                        elseif ( $type == 'extend') { echo 'Renewal Passport'; }
                        elseif ( $type == 'manual') { echo 'Manual Passport'; }
                        ?>
                        </td>
                        
                        <td class="text-center">
                     
                       <?php 
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
                         
                        ?>   
                          
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  </table>  
            
        </div>
        
        
        <?php } endif; ?>
        
        
        
        <div class="row">
            
         <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                 <h3> <?php echo $main->get_extending_passports_count($b_id) + $main->get_lost_passports_count($b_id) + $main->get_manual_passports_count($b_id); ?> </h3>
                  <p>Total Passports </p>
                </div>
                <div class="icon">
                  <i class="fa fa-ticket"></i>
                </div>
                
                
                <a href="<?php echo base_url(); ?>passports/reports" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                
                
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                <?php 
                
                $sum = 0;
                $lost = 0;
                
                $args = array(
               'type' => 'lost',
               'user_id' => $b_id
                );
                $passports = $this->passport_model->get_passports($args);
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 4 : 4; 
                $e = ( $record->salary == 1) ? 13 : 41.50;
                $total = $v + $e;
                $sum+= $total;
                $lost+= $total;
                }
                }
                
                $args = array(
               'type' => 'extend',
               'user_id' => $b_id
                );
                $passports = $this->passport_model->get_passports($args);
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 4 : 4; 
                $e = ( $record->salary == 1) ? 13 : 41.50;
                $total = $v + $e;
                $sum+= $total;
                }
                }
                $args = array(
               'type' => 'manual',
               'user_id' => $b_id
                );
                $passports = $this->passport_model->get_passports($args);
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 1 : 1; 
                $e = ( $record->salary == 1) ? 1.5 : 1.5;
                $total = $v + $e;
                $sum+= $total;
                }
                }
                
                
                ?>
                
                <?php echo $sum; ?>
                
                  </h3>
                  <p>Total Fees</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>passports/reports" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo count($this->user_model->branch_list()); ?></h3>
                  <p>Total Branches</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                
                <a href="<?php echo base_url(); ?>passports/reports" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
               
              </div>
            </div><!-- ./col -->
           
          </div>
          
          
          
          
    </section>
</div>
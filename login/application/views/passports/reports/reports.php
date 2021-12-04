<?php 
$main = $this->passport_model;
if($role == ROLE_ADMIN || $role == 4 || $role == 5 || $role == 2){
$b_id = isset($_GET['branch_id']) ? $_GET['branch_id'] : '';
} else {
$b_id = $current_branch_id;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file" aria-hidden="true"></i> Reports
      </h1>
    </section>
    
    <section class="content">
   
    <style>
    .small-box {
    height: 200px;
    }
    </style>
   
   
    <div class="row">
         
        <h4 class="container"> Date Wise Reports  </h4>
        <form action="<?php echo base_url(); ?>passports/reports_table" method="get" id="searchList">
            
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
             <input id="from_date" type="text" name="from_date" value="" class="form-control datepicker" placeholder="From Date" autocomplete="off" required>
            </div>
        
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
              <input id="to_date" type="text" name="to_date" value="" class="form-control datepicker" placeholder="To Date" autocomplete="off" required>
            </div>
          
          <?php if($role == ROLE_ADMIN || $role == 4 || $role == 5 || $role == 2) : ?>  
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
         <select class="form-control" id="salary" name="branch_id">
         <option value="">-- All Branch --</option>
        <?php foreach(  $this->user_model->branch_list() as $branch ) : 
        $bid = isset($_GET['branch_id']) ? $_GET['branch_id'] : '';
        ?>
       <option value="<?php echo $branch->userId; ?>" <?php if ( $bid == $branch->userId ){ echo 'selected'; } ?>><?php echo $branch->name; ?></option>
       <?php endforeach; ?>
         </select>
          </div>
            <?php endif; ?>
            
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
                
            <select name="type" class="form-control" required>
            <option value="all"> All </option>
            <option value="all_lost"> Lost Passport </option>
            <option value="all_extend"> Renewal Passport </option>
            <option value="all_manual"> Manual Passport </option>
            </select>
             
            </div>
            
    
       <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
              <button formtarget="_blank" type="submit" class="btn btn-md btn-primary btn-block searchList pull-right">View Reports</button> 
            </div>
         
         </form>
          
        </div>
        
   
   
   
   
    <?php if($role == ROLE_ADMIN || $role == 4 || $role == 5 || $role == 2 ){ ?>
     <div class="row">
     <form action="" method="get" id="searchList">
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="branch_id"> Branch </label>
     <select class="form-control" id="salary" name="branch_id">
         <option value="">-- All Branch --</option>
        <?php foreach(  $this->user_model->branch_list() as $branch ) : 
        $bid = isset($_GET['branch_id']) ? $_GET['branch_id'] : '';
        ?>
        <option value="<?php echo $branch->userId; ?>" <?php if ( $bid == $branch->userId ){ echo 'selected'; } ?>><?php echo $branch->name; ?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
    <div style="padding-top:24px"></div> <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
    </form>
   </div>
   <?php } ?>
   
 
        
        
        
        <div class="row">
            
        
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                 <h3> <?php echo $main->get_extending_passports_count($b_id) + $main->get_lost_passports_count($b_id) + $main->get_manual_passports_count($b_id); ?> </h3>
                  <p>Total Passports </p>
                </div>
                <div class="icon">
                  <i class="fa fa-ticket"></i>
                </div>
                
                
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                
                
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                <?php 
                
                $sum = 0;
                $lost = 0;
                $ext = 0;
                $man = 0;
                
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
                $ext+= $total;
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
                $man+= $total;
                }
                }
                
                
                ?>
                
                <?php echo $sum; ?>
                  </h3>
                  
                 <p>Total Fees ( Versatilo + Embassy )</p>
                  
               
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
        
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
    
                <?php echo $lost; ?>
                  </h3>
                  
                <p> Lost Passport Total Fees ( Versatilo + Embassy ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
    
                <?php echo $ext; ?>
                  </h3>
                  
                <p> Renewal Passport Total Fees ( Versatilo + Embassy ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
           
          </div>
          
          
           <div class="row">
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
    
                <?php echo $man; ?>
                  </h3>
                  
                <p> Manual Extension Total Fees ( Versatilo + Embassy ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>
                <?php 
                
                $sum = 0;
                $lost = 0;
                $ext = 0;
                $man = 0;
                $passports = $this->passport_model->get_lost_passports( $b_id ); 
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 4 : 4; 
                $e = ( $record->salary == 1) ? 13 : 41.50;
                $total = $v + $e;
                $sum+= $v;
                $lost+= $v;
                }
                }
                $passports = $this->passport_model->get_extending_passports( $b_id ); 
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 4 : 4; 
                $e = ( $record->salary == 1) ? 13 : 41.50;
                $total = $v + $e;
                $sum+= $v;
                $ext+= $v;
                }
                }
                $passports = $this->passport_model->get_manual_passports( $b_id); 
                if(!empty( $passports )){
                foreach($passports as $record){
                $v = ( $record->salary == 1) ? 1 : 1; 
                $e = ( $record->salary == 1) ? 1.5 : 1.5;
                $total = $v + $e;
                $sum+= $v;
                $man+= $v;
                }
                }
                
                
                ?>
                
                <?php echo $sum; ?>
                  </h3>
                  
                 <p>Total Fees ( Versatilo ) </p>
                  
             
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>
    
                <?php echo $lost; ?>
                  </h3>
                  
                <p> Lost Passport Total Fees ( Versatilo ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>
    
                <?php echo $ext; ?>
                  </h3>
                  
                <p> Renewal Passport Total Fees ( Versatilo ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
           
          </div>
          
           <div class="row">
       
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>
    
                <?php echo $man; ?>
                  </h3>
                  
                <p> Manual Extension Total Fees ( Versatilo ) </p>
                  
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            
           
          </div>
          
          
    </section>
</div>
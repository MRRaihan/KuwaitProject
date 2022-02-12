<?php
$type = isset($_GET['type']) ? $_GET['type'] : 'lost';
$uid = '';
if ( $role !== ROLE_ADMIN && $role !== '5' && $role !== '2' ) {
$uid = $user_id;
}
$remarks = array(
  "Call Received",
  "Not Received",
  "Call Busy",
  "Phone Off",
  "Others",
);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Delivery
      </h1>
    </section>
    
 
    
    <section class="content">
        
         <?php if ( $type == 'reports' ) : ?>
    
    
         <div class="row">
          <form action="<?php echo base_url(); ?>passports/reports_table" method="get" id="searchList">
             <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
             <input id="from_date" type="text" name="from_date" value="" class="form-control datepicker" placeholder="From Date" autocomplete="off" required>
            </div>
        
            <input type="hidden" name="type" value="delivery_reports" / >
           
           
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
              <input id="to_date" type="text" name="to_date" value="" class="form-control datepicker" placeholder="To Date" autocomplete="off" required>
            </div>
            
             <?php if($role == ROLE_ADMIN || $role == 4 || $role == 5) : ?>  
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
         <select class="form-control" id="salary" name="branch_id">
         <option value="">-- Select Branch --</option>
        <?php foreach(  $this->user_model->branch_list() as $branch ) : 
        $bid = isset($_GET['branch_id']) ? $_GET['branch_id'] : '';
        ?>
       <option value="<?php echo $branch->userId; ?>" <?php if ( $bid == $branch->userId ){ echo 'selected'; } ?>><?php echo $branch->name; ?></option>
       <?php endforeach; ?>
         </select>
          </div>
            <?php endif; ?>
            
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
              <button formtarget="_blank" type="submit" class="btn btn-md btn-primary btn-block searchList pull-right">View Reports</button> 
            </div>
          </form>
        </div>
    
    
    
    <?php else : ?>
        
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
        
        
        <div class="row">
          <form action="" method="get" id="searchList">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="cpr" value="<?php echo isset($_GET['cpr']) ? $_GET['cpr'] : ''; ?>" class="form-control" placeholder="Search by CPR">
            </div>
        
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
              <input id="searchText" type="text" name="bd_mobile" value="<?php echo isset($_GET['bd_mobile']) ? $_GET['bd_mobile'] : ''; ?>" class="form-control" placeholder="Search by Mobile Number">
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-group">
             <input id="date" type="text" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>" class="form-control datepicker" placeholder="Select Date" autocomplete="off">
            </div>
            
            
             <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 form-group">
                
            <select name="type" class="form-control" required>
            <option value=""> Select Passport Type </option>
            <option value="lost" <?php if ( $type == 'lost') { echo 'selected'; } ?>> Lost Passport </option>
            <option value="extend" <?php if ( $type == 'extend') { echo 'selected'; } ?>> Renewal Passport </option>
            <option value="manual" <?php if ( $type == 'manual') { echo 'selected'; } ?>> Manual Passport </option>
            </select>
             
            </div>
            
            <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6 form-group">
              <button type="submit" class="btn btn-md btn-primary btn-block searchList pull-right"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
          </form>
        </div>
        
        
     
        
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Passports</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>CPR</th>
                        <th>Mobile Number</th>
                        <th>Passport Type</th>
                        <th>Embassy Passport SL.</th>
                        <th class="text-center">Actions</th>
                        <th>Remarks</th>
                    </tr>
                    
                    
        <?php
    $date = isset($_GET['date']) ? $_GET['date'] : '';
    $date = date("Y-m-d", strtotime($date));
    $from = "$date 00:00:00";
    $to = "$date 23:59:59";
                 $args = array(
                'type' => $type,
                'user_id' => $uid,
                'received' => 1,
                );
    if( isset($_GET['date']) && !empty($_GET['date']) ){
        $args['time_between'] = 1;
        $args['time_from'] = $from;
        $args['time_to'] = $to;
        $args['time_field'] = 'date';
    }
    
                $passports = $this->passport_model->get_passports($args);
                if(!empty( $passports )){
                foreach($passports as $record){
                 ?>
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
                        <td><?php echo $record->embassy_passport_sl ?></td>

                        <td class="text-center">
                           <?php if ( $record->is_delivered > 0 ) : ?>
                           
                            <a class="btn btn-sm btn-success" href="javascript:void(0);" title="Already Delivered"><i class="fa fa-check"></i> Already Delivered </a>
                            <?php if ( $role == ROLE_ADMIN || $role == ROLE_MANAGER ) { ?>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>passports/delivery_passport/<?php echo $type; ?>/undo/?id=<?php echo $record->id; ?>" title="Undo"><i class="fa fa-trash"></i> Undo </a>
                            <?php } ?>
                            
                            
                        <?php else : ?>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>_passport/<?php echo $type; ?>/?id=<?php echo $record->id; ?>" title="Delivered"><i class="fa fa-file"></i> Mark as Delivered </a>
                           <?php endif; ?>
                        </td>
                        <td>
                          <?php if ( $record->remarks != null){
                            ?>
                            <span class="label label-pill
                              <?php 
                                if($record->remarks == 0){
                                  echo 'label-success';
                                } 
                                if($record->remarks == 1){
                                  echo 'label-danger';
                                } 
                                if($record->remarks == 2){
                                  echo 'label-warning';
                                } 
                                if($record->remarks == 3){
                                  echo 'label-warning';
                                }

                                
                              ?>">

                              <?php 
                                if($record->remarks === '0' || $record->remarks === '1' || $record->remarks === '2' || $record->remarks === '3'){
                                  echo $remarks[$record->remarks];
                                }else{
                                  echo $record->remarks;
                                }
                              ?>

                            </span>&nbsp;&nbsp;&nbsp;&nbsp;


                          <?php
                          }
                          ?>
                            <!-- <form action="<?php echo base_url(); ?>remarks" method="post"> -->
                                <!-- <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $record->remarks; ?>">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $record->id; ?>">
                                <input type="hidden" class="form-control" id="type" name="type" value="<?php echo $type; ?>">
                            </form> -->

                                <input type="hidden" class="form-control p_id" value="<?php echo $record->id; ?>">
                                <input type="hidden" class="form-control option" value="<?php echo $type; ?>">

                            <div class="other-div" style="display: none">

                                <label>
                                <input id="remarks_other" class="remarks_other form-control" name="remarks_other">
                                </label>
                            </div>

                            <select class="remarks mySelect" name="remarks" id="mySelect" onChange="defualtRemarks('<?php echo $type; ?>','<?php echo $record->id; ?>',this)">
                                <option value="-1">Choose Remark</option>

                                <?php

                                  $is_input = false;
                                  if($record->remarks == '0' || $record->remarks == '1' || $record->remarks == '2' || $record->remarks == '3'){
                                    $is_input = true;
                                  } 

                                  foreach ($remarks as $key => $remark){
                                ?>
                                  <option value="<?php echo $key;  ?>" <?php if($record->remarks === '0' || $record->remarks === '1' || $record->remarks === '2' || $record->remarks === '3'){ 
                                    if($record->remarks != null && $record->remarks == $key){
                                      echo "selected";
                                    }
                                  }  ?>
                                    ><?php echo $remark ?></option>
                                <?php 
                                  }
                                ?>
                            </select>

                        </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php // echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
        
        <?php endif; ?>
        
        
    </section>
</div>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('input').keyup(function(event) {
    //         if (event.which === 13)
    //         {
    //             event.preventDefault();
    //             $('form').submit();
    //         }
    //     });
    // });


    function defualtRemarks(option,id,select) {
       var mySelect = $(select).val();
        // console.log(mySelect);
        if (mySelect == '4') {
            $(select).parent().find('.other-div').attr('style', 'display:block;');
        }else{
            $(select).parent().find('.other-div').attr('style', 'display:none;');
        }
        var url = "<?php echo base_url(); ?>remarks";
        
        var data = "option="+option+"&id="+id+"&remarks="+mySelect;

        // console.log(data)

        if (mySelect != 4) {
            $.ajax({
                method: 'POST',
                url: url,
                data: data,
                // headers: {
                //     'X-CSRF-TOKEN': "{{ csrf_token() }}",
                // },
                success: function(data) {
                    if (data.type == 'success') {
                        // Swal.fire(
                        //     'Remarks !', 'Remarks Added Successfully. ' + data.message, 'success'
                        // )

                        console.log('monir-data:'+data);
                        setTimeout(function() {
                            location.reload(data.url);
                        }, 800); //
                    } else {
                        // Swal.fire(
                        //     'Wrong !',
                        //     'Something going wrong. ' + data.message,
                        //     'warning'
                        // )
                    }
                },
            })
        }


    }

    $('.remarks_other').keypress(function(e) {
        
            if (e.keyCode == 13) {

                e.preventDefault();

                var id = $(this).parent().parent().parent().find('.p_id').val();
                var option = $(this).parent().parent().parent().find('.option').val();
                var mySelect = $(this).val();

                console.log(id)
                console.log('---'+option+'----')
                console.log(mySelect)
        
              var url = "<?php echo base_url(); ?>remarks";
              var data = "option="+option+"&id="+id+"&remarks="+mySelect;


              $.ajax({
                method: 'POST',
                url: url,
                data: data,
                // headers: {
                //     'X-CSRF-TOKEN': "{{ csrf_token() }}",
                // },
                success: function(data) {
                    if (data.type == 'success') {
                        // Swal.fire(
                        //     'Remarks !', 'Remarks Added Successfully. ' + data.message, 'success'
                        // )

                        console.log('monir-data:'+data);
                        setTimeout(function() {
                            location.reload(data.url);
                        }, 800); //
                    } else {
                        // Swal.fire(
                        //     'Wrong !',
                        //     'Something going wrong. ' + data.message,
                        //     'warning'
                        // )
                    }
                },
            })
        }
    });


</script>
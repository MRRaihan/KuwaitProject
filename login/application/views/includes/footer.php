<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
    });
</script>


 <footer class="main-footer">
        
    </footer>
   
    
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
            
        
    $(document).ready(function() {
        
     $("#basic-form").validate();
        
    $("#photocopy").change(function(){
        
    var file_data = $('#photocopy').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: '<?php echo base_url(); ?>ajax.php', 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        beforeSend:function(){
        $('#pimg').html('Uploading Image......');
        },
          
        success: function(data){
            if ( data ){
               var image = '<?php echo base_url(); ?>uploads/'+ data;
               $('#pst').val(image);
               $('#pimg').html('<img src="'+ image +'" /> <br/> <button class="btn btn-danger" id="remove_image">  Remove Image </button>');
            } else {
            
              alert('Failed to upload file');
            
            }
        }
        });
     
        });
        
            
      $( document.body).on('click', '#remove_image', function(e) {
      e.preventDefault();
        $('#pst').val('');
        $('#pimg').html('');
      });   
      
      
      
     
    ////////// Professsion ////////////
    $("#photocopy1").change(function(){
        
    var file_data = $('#photocopy1').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: '<?php echo base_url(); ?>ajax.php', 
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        beforeSend:function(){
        $('#pimg1').html('Uploading Image......');
        },
          
        success: function(data){
            if ( data ){
               var image = '<?php echo base_url(); ?>uploads/'+ data;
               $('#pst1').val(image);
               $('#pimg1').html('<img src="'+ image +'" /> <br/> <button class="btn btn-danger" id="remove_image1">  Remove Image </button>');
            } else {
            
              alert('Failed to upload file');
            
            }
        }
        });
     
        });
      
      
      $( document.body).on('click', '#remove_image1', function(e) {
      e.preventDefault();
        $('#pst1').val('');
        $('#pimg1').html('');
      }); 
      
      
      
      
      $('#profession').on('change', function() {
      
      var v = $(this).find(":selected").val();
      
      if ( v == 'other' ){
     
      $('#prv').append('<div class="form-group" id="padded"><input name="profession" type="text" class="form-control" placeholder="Enter Profession" id="profession"></div>');
          
      } else {
          
      $('#padded').remove();
          
      }
       
       
      });
            
    
            
        });
            
    </script>
  </body>
</html>
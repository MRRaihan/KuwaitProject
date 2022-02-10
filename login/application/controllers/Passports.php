<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Passports extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('passport_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index(){
      redirect('/dashboard');
    }
    
    public function add_lost_passport(){
       $this->global['pageTitle'] = 'Add New Lost Passport';
       $this->loadViews("passports/lost_add_new", $this->global, NULL , NULL);
    }
    
     public function  create_lost_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          
          if ( empty($data) ){
              redirect('dashboard');
          }
        
          $data['user_id'] = $this->vendorId; 
          $data['ems'] = 'EP'.time().'BH';
          $data['r_id'] = 1;
          $result = $this->passport_model->insert_lost_passport( $data );
          
          if ( $result > 0 ){
              $this->session->set_flashdata('success', 'Data added successfully');
              
          } else {
              $this->session->set_flashdata('error', 'Failed to insert Data');
          }
          
          redirect('passports/add_lost_passport');
    }
    
    public function edit_lost_passport(){
       $this->global['pageTitle'] = 'Edit Lost Passport';
       $data['user_id'] = $this->vendorId;
       $data['id'] = $_GET['id'];
       $data['passport'] = $this->passport_model->get_lost_passport($data['id']);
       if ( empty($data['passport'])  ){
           $this->loadThis();
       } 
       elseif ( !empty( $data['passport'] )  && (  $this->global ['role'] !== ROLE_ADMIN ) && $this->global ['role'] !== '5' && $this->global ['role'] !== '2' && ( $data['passport']->user_id !== $data['user_id'] ) ){
           $this->loadThis();
       }
       else {
          $this->loadViews("passports/edit_lost_passport", $this->global, $data , NULL);
       }
       
    }
    
    public function  update_lost_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          if ( empty($data) || empty($this->passport_model->get_lost_passport($data['id']) ) ){
              redirect('dashboard');
          }
        
          //$data['user_id'] = $this->vendorId; 
          
          $result = $this->passport_model->edit_lost_passport( $data , $data['id']);
          
          if ( $result == TRUE ){
             $this->session->set_flashdata('success', 'Data updated successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to update Data');
          }
          
          redirect('passports/edit_lost_passport?id='.$data['id']);
    }
    
    
    public function list_lost_passports(){
       $this->global['pageTitle'] = 'Lost Passports';
       $data['user_id'] = $this->vendorId; 
       $this->loadViews("passports/list_lost_passports", $this->global, $data , NULL);
    }
    
    ///////////////// Extending Passport //////////////////
    
    public function add_extending_passport(){
       $this->global['pageTitle'] = 'Add Extending Passport';
       $this->loadViews("passports/add_extending_passport", $this->global, NULL , NULL);
    }
    
     public function  create_extending_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          
          if ( empty($data) ){
              redirect('dashboard');
          }
        
          $data['user_id'] = $this->vendorId; 
          $data['ems'] = 'EP'.time().'BH';
          $data['r_id'] = 1;
          $result = $this->passport_model->insert_extending_passport( $data );
          
          if ( $result > 0 ){
              $this->session->set_flashdata('success', 'Data added successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to insert Data');
          }
          
          redirect('passports/add_extending_passport');
    }
    
    
    public function edit_extending_passport(){
       $this->global['pageTitle'] = 'Edit Extending Passport';
       $data['user_id'] = $this->vendorId;
       $data['id'] = $_GET['id'];
       $data['passport'] = $this->passport_model->get_extending_passport($data['id']);
       if ( empty($data['passport'])  ){
           $this->loadThis();
       } 
       elseif ( !empty( $data['passport'] )  && (  $this->global ['role'] !== ROLE_ADMIN ) && $this->global ['role'] !== '5' && $this->global ['role'] !== '2' && ( $data['passport']->user_id !== $data['user_id'] ) ){
           $this->loadThis();
       }
       else {
          $this->loadViews("passports/edit_extending_passport", $this->global, $data , NULL);
       }
       
    }
    
    public function  update_extending_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          if ( empty($data) || empty($this->passport_model->get_extending_passport($data['id']) ) ){
              redirect('dashboard');
          }
        
          //$data['user_id'] = $this->vendorId; 
          
          $result = $this->passport_model->edit_extending_passport( $data , $data['id']);
          
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Data updated successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to update Data');
          }
          
          redirect('passports/edit_extending_passport?id='.$data['id']);
    }
    
    public function list_extending_passports(){
       $this->global['pageTitle'] = 'Extending Passports';
       $data['user_id'] = $this->vendorId; 
       $this->loadViews("passports/list_extending_passports", $this->global, $data , NULL);
    }
    ///////////////// manual Passport //////////////////
    
    public function add_manual_passport(){
       $this->global['pageTitle'] = 'Add Manual Passport';
       $this->loadViews("passports/add_manual_passport", $this->global, NULL , NULL);
    }
    
     public function  create_manual_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          
          if ( empty($data) ){
              redirect('dashboard');
          }
        
          $data['user_id'] = $this->vendorId; 
          $data['ems'] = 'EP'.time().'BH';
          $data['r_id'] = 1;
          $result = $this->passport_model->insert_manual_passport( $data );
          
          if ( $result > 0 ){
              $this->session->set_flashdata('success', 'Data added successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to insert Data');
          }
          
          redirect('passports/add_manual_passport');
    }
    
    
    public function edit_manual_passport(){
       $this->global['pageTitle'] = 'Edit Manual Passport';
       $data['user_id'] = $this->vendorId;
       $data['id'] = $_GET['id'];
       $data['passport'] = $this->passport_model->get_manual_passport($data['id']);
       if ( empty($data['passport'])  ){
           $this->loadThis();
       } 
       elseif ( !empty( $data['passport'] )  && (  $this->global ['role'] !== ROLE_ADMIN ) && $this->global ['role'] !== '5' && $this->global ['role'] !== '2' && ( $data['passport']->user_id !== $data['user_id'] ) ){
           $this->loadThis();
       }
       else {
          $this->loadViews("passports/edit_manual_passport", $this->global, $data , NULL);
       }
       
    }
    
    public function  update_manual_passport(){
         
          $data = isset($_POST) ? $_POST : array();
          if ( empty($data) || empty($this->passport_model->get_manual_passport($data['id']) ) ){
              redirect('dashboard');
          }
        
          //$data['user_id'] = $this->vendorId; 
          
          $result = $this->passport_model->edit_manual_passport( $data , $data['id']);
          
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Data updated successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to update Data');
          }
          
          redirect('passports/edit_manual_passport?id='.$data['id']);
    }
    
    public function list_manual_passports(){
       $this->global['pageTitle'] = 'Manual Extent On Passports';
       $data['user_id'] = $this->vendorId; 
       $this->loadViews("passports/list_manual_passports", $this->global, $data , NULL);
    }
    
     public function print_passport(){
       $data = $this->global;
       
       $this->load->view("passports/print", $data);
    }
    
    public function view_passport(){
       $data = $this->global;
       
       $this->load->view("passports/view_passport", $data);
    }
    
    
    /////////////// Bar Codes /////////////////
    
    public function bar_code($text){
		$this->set_barcode($text);
	}
	
	private function set_barcode($code){
		//generate barcode
		require_once( APPPATH . '/libraries/Zend.php');
		$this->load->library('zend');
		//load in folder Zend
        $this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code39', 'image', array('text'=>$code, 'drawText' => false, 'barHeight' => 50 ), array() );
	}
    
    //////////////////////////// Reports ////////////////////
    
    
    public function reports(){
      $this->global['pageTitle'] = 'Passport Reports';
      $data['user_id'] = $this->vendorId; 
      $this->loadViews("passports/reports/reports", $this->global, $data , NULL);
    }
    
    public function reports_table(){
       $data['user_id'] = $this->vendorId; 
       $data['role'] = $this->global ['role'];
       $this->load->view("passports/reports/table", $data );
    }
    
    
    ///////////////// Options ///////////////////
    
    
    public function shift_to_embassy(){
      $this->global['pageTitle'] = 'Shift To Embassy';
      $data['user_id'] = $this->vendorId; 
      $this->loadViews("passports/options/shift_to_embassy", $this->global, $data , NULL);
    }
    public function receive_to_embassy(){
      $this->global['pageTitle'] = 'Receive To Embassy';
      $data['user_id'] = $this->vendorId; 
      $this->loadViews("passports/options/receive_to_embassy", $this->global, $data , NULL);
    }
    public function delivery(){
      $this->global['pageTitle'] = 'Delivery';
      $data['user_id'] = $this->vendorId; 
      $this->loadViews("passports/options/delivery", $this->global, $data , NULL);
    }
    
    
    public function shift_passport( $type, $undo = '' ){
        
          $user_id = $this->vendorId; 
          $data = isset($_GET) ? $_GET : array();
          if ( empty($data) || empty($type) ){
          redirect('dashboard');
          }
          
          if ( $undo == 'undo' ){
              
          $result = FALSE;
          if ( $type == 'lost') {
          $result = $this->passport_model->edit_lost_passport( array( 'is_shifted' => 0 ) , $data['id']);
          }
          elseif ( $type == 'extend') {
              $result = $this->passport_model->edit_extending_passport( array( 'is_shifted' => 0 ) , $data['id']);
          }
          
          elseif ( $type == 'manual') { 
            $result = $this->passport_model->edit_manual_passport( array( 'is_shifted' => 0 ) , $data['id']);
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Unshifted successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Unshift');
          }
          
              
          } else {
          
          $result = FALSE;
          if ( $type == 'lost') {
              
            
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
        
          foreach( $ids as $id ){
          $result = $this->passport_model->edit_lost_passport( array( 'is_shifted' => time() ) , $id);
          }
          
          
          
          }
          elseif ( $type == 'extend') {
              
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
          foreach( $ids as $id ){
              $result = $this->passport_model->edit_extending_passport( array( 'is_shifted' => time() ) , $id);
          }
          
          }
          
          elseif ( $type == 'manual') { 
        
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
          foreach( $ids as $id ){
            $result = $this->passport_model->edit_manual_passport( array( 'is_shifted' => time() ) , $id);
          }
          
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Shifted successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Shift');
          }
          
          }
          
          redirect('passports/shift_to_embassy?type='.$type);
        }
        
public function receive_passport( $type, $undo = '' ){
        
          $user_id = $this->vendorId; 
          $data = isset($_GET) ? $_GET : array();
          if ( empty($data) || empty($type) ){
          redirect('dashboard');
          }
          
          if ( $undo == 'undo' ){
          
          $result = FALSE;
          if ( $type == 'lost') {
          $result = $this->passport_model->edit_lost_passport( array( 'is_received' => 0 ) , $data['id']);
          }
          elseif ( $type == 'extend') {
              $result = $this->passport_model->edit_extending_passport( array( 'is_received' => 0 ) , $data['id']);
          }
          
          elseif ( $type == 'manual') { 
            $result = $this->passport_model->edit_manual_passport( array( 'is_received' => 0 ) , $data['id']);
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Removed From Received successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Remove From Receive');
          }   
              
          }
          
          else {
              
          $result = FALSE;
          if ( $type == 'lost') {
        
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
          foreach( $ids as $id ){
          $result = $this->passport_model->edit_lost_passport( array( 'is_received' => time() ) , $id);
          }
          
          }
          elseif ( $type == 'extend') {
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
          foreach( $ids as $id ){
              $result = $this->passport_model->edit_extending_passport( array( 'is_received' => time() ) , $id);
          }
          
          }
          
          elseif ( $type == 'manual') { 
              
          $ids = !empty( $_POST['ids'] ) ? $_POST['ids'] : array();
          foreach( $ids as $id ){
            $result = $this->passport_model->edit_manual_passport( array( 'is_received' => time() ) , $id);
          }
          
          
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Received successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Receive');
          }
          
          }
          
          redirect('passports/receive_to_embassy?type='.$type);
        }
public function delivery_passport( $type, $undo = '' ){
        
          $user_id = $this->vendorId; 
          $data = isset($_GET) ? $_GET : array();
          if ( empty($data) || empty($type) ){
          redirect('dashboard');
          }

          if ( $undo == 'undo' ){

          $result = FALSE;
          if ( $type == 'lost') {
          $result = $this->passport_model->edit_lost_passport( array( 'is_delivered' => 0 ) , $data['id']);
          }
          elseif ( $type == 'extend') {
              $result = $this->passport_model->edit_extending_passport( array( 'is_delivered' => 0 ) , $data['id']);
          }
          
          elseif ( $type == 'manual') { 
            $result = $this->passport_model->edit_manual_passport( array( 'is_delivered' => 0 ) , $data['id']);
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Removed From Delivered successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Remove From Delivered');
          }   
              
          }
          
          else {
          $result = FALSE;
          if ( $type == 'lost') {
          $result = $this->passport_model->edit_lost_passport( array( 'is_delivered' => time() ) , $data['id']);
          }
          elseif ( $type == 'extend') {
              $result = $this->passport_model->edit_extending_passport( array( 'is_delivered' => time() ) , $data['id']);
          }
          
          elseif ( $type == 'manual') { 
            $result = $this->passport_model->edit_manual_passport( array( 'is_delivered' => time() ) , $data['id']);
          }
         
          if ( $result == TRUE ){
              $this->session->set_flashdata('success', 'Delivered successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Deliver');
          }
          
          }
          
          redirect('passports/delivery?type='.$type);
        }
        
/////////////// Delete Passport ///////////////

public function delete_passport( $type, $id ){
        
          $user_id = $this->vendorId; 
          $data = isset($_GET) ? $_GET : array();
          if ( empty($type) || empty($id) ){
          redirect('dashboard');
          }
         
          if ( $this->global ['role'] !== ROLE_ADMIN ) { 
           $this->loadThis();
          } else {
          $result = $this->passport_model->delete_passport( $type , $id);
          if ( $result ){
              $this->session->set_flashdata('success', 'Passport Removed successfully');
          } else {
              $this->session->set_flashdata('error',  'Failed To Delete Passport');
          }
          redirect('passports/'.$data['redirect']);
          }
  }
  
 ////////////////////   Professions //////////////////
 
  public function professions(){
       $this->global['pageTitle'] = 'Professions';
       $data['user_id'] = $this->vendorId;
       $action = isset( $_GET['action'] ) ? $_GET['action'] : '';
       
       if ( $action == 'add_new' ){
       $this->loadViews("passports/profession/add", $this->global, $data , NULL);
       } 
       
       elseif( $action == 'edit' ){
    
        $this->loadViews("passports/profession/edit", $this->global, $data , NULL);
       }
       
       elseif( $action == 'create' ){
           
          $data = isset($_POST) ? $_POST : array();
          if ( empty($data) ){
              redirect('dashboard');
          }
          $result = $this->passport_model->insert_profession( $data );
          
          if ( $result > 0 ){
              $this->session->set_flashdata('success', 'Data added successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to insert Data');
          }
          
         redirect('passports/professions?action=add_new');
         
        }
        
      elseif( $action == 'update' ){
           
          $data = isset($_POST) ? $_POST : array();
          $id = $data['id'];
          
          if ( empty($data) ){
              redirect('dashboard');
          }
          
          $result = $this->passport_model->edit_profession( $data, $id);
          
          if ( $result ){
              $this->session->set_flashdata('success', 'Data edited successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to edit Data');
          }
          
         redirect('passports/professions?action=edit&id='.$id);
         
        }
       
       else {
        $this->loadViews("passports/profession/list", $this->global, $data , NULL);   
      }
     
  }
  
  
/*********** Other ********/
public function add_other(){
       $this->global['pageTitle'] = 'Add New Other';
       
      if  (   $this->global ['role'] == '4' ){
           $this->loadThis();
           
       } else {
       
       $this->loadViews("passports/others/add", $this->global, NULL , NULL);
       
       }
       
       
           
       }
    
     public function  create_other(){
         
         
          $data = isset($_POST) ? $_POST : array();
          
          if ( empty($data) ){
              redirect('dashboard');
          }
        
          $data['user_id'] = $this->vendorId; 
          $data['ems'] = 'EP'.time().'BH';
          $result = $this->passport_model->insert_other( $data );
          
          if ( $result > 0 ){
              $this->session->set_flashdata('success', 'Data added successfully');
              
          } else {
              $this->session->set_flashdata('error', 'Failed to insert Data');
          }
          
          redirect('passports/add_other');
    }
    
    public function edit_other(){
       $this->global['pageTitle'] = 'Edit Other';
       $data['user_id'] = $this->vendorId;
       $data['id'] = $_GET['id'];
       $data['passport'] = $this->passport_model->get_other($data['id']);
       if ( empty($data['passport'])  ){
           $this->loadThis();
       } 
       elseif ( !empty( $data['passport'] )  && (  $this->global ['role'] !== ROLE_ADMIN ) && $this->global ['role'] !== '5' && $this->global ['role'] !== '2' && ( $data['passport']->user_id !== $data['user_id'] ) ){
           $this->loadThis();
       }
       else {
          $this->loadViews("passports/others/edit", $this->global, $data , NULL);
       }
       
    }
    
    public function  update_other(){
         
          $data = isset($_POST) ? $_POST : array();
          if ( empty($data) || empty($this->passport_model->get_other($data['id']) ) ){
              redirect('dashboard');
          }
        
          //$data['user_id'] = $this->vendorId; 
          
          $result = $this->passport_model->edit_other( $data , $data['id']);
          
          if ( $result == TRUE ){
             $this->session->set_flashdata('success', 'Data updated successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to update Data');
          }
          
          redirect('passports/edit_other?id='.$data['id']);
    }
    
    
    public function list_others(){
       $this->global['pageTitle'] = 'Others';
       $data['user_id'] = $this->vendorId; 
       
        if  (   $this->global ['role'] == '4' ){
           $this->loadThis();
           
       } else {
           
       $this->loadViews("passports/others/list", $this->global, $data , NULL);
       
       }
       
       
    }
    
    public function  delete_other(){
         
          $data = isset($_GET) ? $_GET : array();
          if ( empty($data) || empty($this->passport_model->get_other($data['id']) ) ){
              redirect('dashboard');
          }
        
          $result = $this->passport_model->delete_other( $data['id']);
          
          if ( $result == TRUE ){
             $this->session->set_flashdata('success', 'Deleted successfully');
          } else {
              $this->session->set_flashdata('error', 'Failed to delete');
          }
          
          redirect('passports/list_others');
    }
    
    public function view_other(){
       $data = $this->global;
       if  (   $this->global ['role'] == '4' ){
           $this->loadThis();
           
       } else {
           
       $this->load->view("passports/others/view", $data);
       
       }
    }


    public function remarks_change()
    {

        // $type = explode('&', $data)[0] ? explode('&', $data)[0] : '';
        // $id = explode('&', $data)[1] ? explode('&', $data)[1] : '';
        // $remarks = explode('&', $data)[2];


        
        
        $type = $this->input->post('option');
        $id = $this->input->post('id');
        $remarks = $this->input->post('remarks');
        // return $id;
         
        // return json_encode([
        //     'type' => $type
        // ]);

        $type = isset($type) ? $type : '';

        if ($type == 'lost'){
            $table = 'lost_passports';
        }
        elseif ($type == 'extend'){
            $table = 'extending_passports';
        }
        elseif ($type == 'manual'){
            $table = 'manual_passports';
        }

        $this->db->where('id', $id);
        $result = $this->db->update($table, ['remarks' => $remarks ] );

        if ( $result == TRUE ){
            $this->session->set_flashdata('success', 'Remarks updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to Update Remarks');
        }

        // redirect($_SERVER['HTTP_REFERER']);

        // return response()->json([
        //     'type' => 'success',
        //     'url' => $_SERVER['HTTP_REFERER'],
        //     'message' => 'Remarks updated successfully'
        // ]);

        echo json_encode([
            'type' => 'success',
            'url' => $_SERVER['HTTP_REFERER'],
            'message' => 'Remarks updated successfully'
        ]);
    }

    public function embassy_passport_sl_change()
    {
        $id = $this->input->post('id');
        $embassy_passport_sl = $this->input->post('embassy_passport_sl');
        $type = $this->input->post('type');

        $type = isset($type) ? $type : '';

        if ($type == 'lost'){
            $table = 'lost_passports';
        }
        elseif ($type == 'extend'){
            $table = 'extending_passports';
        }
        elseif ($type == 'manual'){
            $table = 'manual_passports';
        }

        $this->db->where('id', $id);
        $result = $this->db->update($table, ['embassy_passport_sl' => $embassy_passport_sl ] );

        if ( $result == TRUE ){
            $this->session->set_flashdata('success', 'Embassy Passport SL. updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to Update Embassy Passport SL.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }



 /*   public function signin()
    {
        if($this->input->post('insert'))
        {
            $name = trim($this->input->post('name'));
            $email = trim($this->input->post('email'));
            $phone = trim($this->input->post('phone'));
            $message = trim($this->input->post('message'));
            $s_data = date('Y-m-d');

            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                's_date' => $s_date
            );

            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
            $userIp=$this->input->ip_address();
            $secret='****************************';
            $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response;=".$recaptchaResponse."&remoteip;=".$userIp;
            $response = $this->curl->simple_get($url);
            $status= json_decode($response, true);

            $this->db->insert('contact',$data);
            if($status['success'])
            {
                $this->session->set_flashdata('flashSuccess', 'successfull');
            }
            else
            {
                $this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
            }
        }
    }*/
    
    
}

?>
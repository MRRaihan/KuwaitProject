<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Passport_model extends CI_Model
{
    function insert_lost_passport( $data )
    {
        $this->db->trans_start();
        $this->db->insert('lost_passports', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
     function edit_lost_passport($data, $passport_id){
        $this->db->where('id', $passport_id);
        $this->db->update('lost_passports', $data);
        return TRUE;
    }
    
    function get_lost_passports( $userid = '' ){  
        $limit = 20;
        
        $offset = isset($_GET['page']) ? $_GET['page'] : 0;
        if ( $offset > 0){
        $offset = ($offset * $limit) - $limit;
        }
        $this->db->select('*');
        $this->db->from('lost_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        
        if ( !empty( $_GET['profession'] ) ){
            $this->db->where('profession', $_GET['profession']);
        }
        
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_lost_passport( $id ){
        $this->db->select('*');
        $this->db->from('lost_passports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ( isset($query->result()[0] )  ){
        return $query->result()[0];
        }
    }
    
     function get_lost_passports_count( $userid = '' ){
        $this->db->select('id');
        $this->db->from('lost_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    ////////////////////// Extending Passports /////////////////////////////
     function insert_extending_passport( $data )
    {
        $this->db->trans_start();
        $this->db->insert('extending_passports', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
     function edit_extending_passport($data, $passport_id){
        $this->db->where('id', $passport_id);
        $this->db->update('extending_passports', $data);
        return TRUE;
    }
    
    function get_extending_passports( $userid = '' )
    {  
        $limit = 20;
        
        $offset = isset($_GET['page']) ? $_GET['page'] : 0;
        if ( $offset > 0){
        $offset = ($offset * $limit) - $limit;
        }
        $this->db->select('*');
        $this->db->from('extending_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        if ( !empty( $_GET['profession'] ) ){
            $this->db->where('profession', $_GET['profession']);
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_extending_passport( $id ){
        $this->db->select('*');
        $this->db->from('extending_passports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ( isset($query->result()[0] )  ){
        return $query->result()[0];
        }
    }
    
     function get_extending_passports_count( $userid = '' ){
        $this->db->select('id');
        $this->db->from('extending_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
     ////////////////////// manual Passports /////////////////////////////
     function insert_manual_passport( $data )
    {
        $this->db->trans_start();
        $this->db->insert('manual_passports', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
     function edit_manual_passport($data, $passport_id){
        $this->db->where('id', $passport_id);
        $this->db->update('manual_passports', $data);
        return TRUE;
    }
    
    function get_manual_passports( $userid = '' )
    {  
        $limit = 20;
        
        $offset = isset($_GET['page']) ? $_GET['page'] : 0;
        if ( $offset > 0){
        $offset = ($offset * $limit) - $limit;
        }
        $this->db->select('*');
        $this->db->from('manual_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        if ( !empty( $_GET['profession'] ) ){
            $this->db->where('profession', $_GET['profession']);
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_manual_passport( $id ){
        $this->db->select('*');
        $this->db->from('manual_passports');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ( isset($query->result()[0] )  ){
        return $query->result()[0];
        }
    }
    
     function get_manual_passports_count( $userid = '' ){
        $this->db->select('id');
        $this->db->from('manual_passports');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    ///////////////// Delete Passport //////////////////
    
     public function delete_passport($type, $id){
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
           return $this->db->delete($table);
    }
    
 ///////////////// Reports /////////////////////////
 
 
  function get_passports( $data = array() ){
      
          $type = isset($data['type']) ? $data['type'] : '';   
          if ($type == 'lost'){
          $table = 'lost_passports';
          } 
          elseif ($type == 'extend'){
          $table = 'extending_passports';
          }
          elseif ($type == 'manual'){
          $table = 'manual_passports';  
          }
     
         $this->db->select('*');
         $this->db->from($table);
           
         if ( isset($data['user_id']) && is_numeric( $data['user_id'] ) ){
         $this->db->where('user_id', $data['user_id']);
         }
         if ( isset($data['shifted']) && $data['shifted'] == 1  ){
         $this->db->where('is_shifted >', '0');
         }
         if ( isset($data['received']) && $data['received'] == 1  ){
         $this->db->where('is_received >', '0');
         }
         if ( isset($data['delivered']) && $data['delivered'] == 1  ){
         $this->db->where('is_delivered >', '0');
         }
         
         if ( isset($data['shifted']) && $data['shifted'] == 0  ){
         $this->db->where('is_shifted <', '1');
         }
         if ( isset($data['received']) && $data['received'] == 0  ){
         $this->db->where('is_received <', '1');
         }
         if ( isset($data['delivered']) && $data['delivered'] == 0  ){
         $this->db->where('is_delivered <', '1');
         }
         //// Date And Timestamp Setup ///
         
         if ( isset($data['time_between']) && isset($data['time_from']) && isset($data['time_field']) ){
          $field = $data['time_field'];
          $this->db->where($field.' >=', $data['time_from']);
         }
         if ( isset($data['time_between']) && isset($data['time_to']) && isset($data['time_field']) ){
          $field = $data['time_field'];
          $this->db->where($field.' <=', $data['time_to']);
         }
        
        //// For Search Query ////
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        /// End For Search Query //
        
        
         //// End Date And Timestamp Setup ///
         $this->db->order_by('id', 'desc');
         
         if ( isset($data['limit']) && is_numeric( $data['limit'] ) ){
         $this->db->limit($data['limit']);
         }
         if ( isset($data['offset']) && is_numeric( $data['offset'] ) ){
         $this->db->offset($data['offset']);
         }
        
        $query = $this->db->get();
        if ( isset($data['count']) && $data['count'] == 1  ){
        return $query->num_rows();
        } else {
        return $query->result();
        }
        
    }
    
/////////////////////////////// Profession ///////////////////////////
    
    function insert_profession( $data ){
        $this->db->trans_start();
        $this->db->insert('professions', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    
    function edit_profession($data, $id){
        $this->db->where('id', $id);
        $this->db->update('professions', $data);
        return TRUE;
    }
    
    function get_professions( $userid = '' ){  
        $limit = 100;
        
        $offset = isset($_GET['page']) ? $_GET['page'] : 0;
        if ( $offset > 0){
        $offset = ($offset * $limit) - $limit;
        }
        $this->db->select('*');
        $this->db->from('professions');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_profession( $id ){
        $this->db->select('*');
        $this->db->from('professions');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ( isset($query->result()[0] )  ){
        return $query->result()[0];
        }
    }
    
    /************ Other Passports **************/
 function insert_other( $data )
    {
        $this->db->trans_start();
        $this->db->insert('others', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
     function edit_other($data, $passport_id){
        $this->db->where('id', $passport_id);
        $this->db->update('others', $data);
        return TRUE;
    }
    
    function get_others( $userid = '' ){  
        $limit = 20;
        
        $offset = isset($_GET['page']) ? $_GET['page'] : 0;
        if ( $offset > 0){
        $offset = ($offset * $limit) - $limit;
        }
        $this->db->select('*');
        $this->db->from('others');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
            $this->db->where('cpr', $_GET['cpr']);
        }
        if ( !empty( $_GET['bd_mobile'] ) ){
            $this->db->where('bd_mobile', $_GET['bd_mobile']);
        }
        
        if ( !empty( $_GET['profession'] ) ){
            $this->db->where('profession', $_GET['profession']);
        }
        
       
        if ( !empty( $_GET['from_date'] ) ){
        $from = $_GET['from_date'];
        $this->db->where('date >=', $from.' 00:00:00');
        }
        
        if ( !empty( $_GET['to_date'] ) ){
        $to = $_GET['to_date'];
        $this->db->where('date <=', $to.' 23:59:59');
        }
        
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_other( $id ){
        $this->db->select('*');
        $this->db->from('others');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ( isset($query->result()[0] )  ){
        return $query->result()[0];
        }
    }
    
     function get_others_count( $userid = '' ){
        $this->db->select('id');
        $this->db->from('others');
        
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        if ( !empty( $_GET['cpr'] ) ){
        $this->db->where('cpr', $_GET['cpr']);
        }
        
        
        if ( !empty( $_GET['from_date'] ) ){
        $from = $_GET['from_date'];
        $this->db->where('date >=', $from.' 00:00:00');
        }
        
        if ( !empty( $_GET['to_date'] ) ){
        $to = $_GET['to_date'];
        $this->db->where('date <=', $to.' 23:59:59');
        }

        $query = $this->db->get();
        return $query->num_rows();
    } 
    
    function get_others_fees( $userid = '' ){
        $this->db->select('fee');
        $this->db->from('others');
        if ( is_numeric( $userid ) ){
            $this->db->where('user_id', $userid);
        }
        
        if ( !empty( $_GET['from_date'] ) ){
        $from = $_GET['from_date'];
        $this->db->where('date >=', $from.' 00:00:00');
        }
        
        if ( !empty( $_GET['to_date'] ) ){
        $to = $_GET['to_date'];
        $this->db->where('date <=', $to.' 23:59:59');
        }
        
        $query = $this->db->get();
        $count = 0;
        $all = $query->result();
        foreach ( $all as $single){
        $count+=$single->fee;
        }
        return $count;
        } 
    
    
    public function delete_other($id){
           $this->db->where('id', $id);
           return $this->db->delete('others');
    }
    
    
}
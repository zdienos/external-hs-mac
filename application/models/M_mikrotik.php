<?php
  class M_mikrotik extends CI_Model {

        function cekUser($username){
          $this->db->where('username', $username);
          $query = $this->db->get('mikrotik_user_hotspot');
          if($query->num_rows()>0){
            return true;
          }
          else {
            return false;
          }
        }

        function tambahUser($username,$password){
          $field = array(
            'username'    => $username,
            'password'    => $password,
            'created_at'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('mikrotik_user_hotspot', $field);
          if($this->db->affected_rows() > 0){
            return true;
          }
          else {
            return false;
          }
        }

        function tambahLogUser($pesan){
          $field = array(
            'message'    => $pesan,
            'created_at'  => date('Y-m-d H:i:s')
          );
          $this->db->insert('mikrotik_user_log', $field);
          if($this->db->affected_rows() > 0){
            return true;
          }
          else {
            return false;
          }
        }



  }//end model
?>

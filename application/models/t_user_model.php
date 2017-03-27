<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_user_model extends CI_Model {
   public function compare_email($email){
       $this->db->select("*");
       $this->db->from('user');
       $this->db->where('email',$email);
       $query = $this->db->get();
       return  $query->row();
   }

    public function do_reg($email,$pass){
        $data=array(
            'email'=>$email,
            'pass'=>$pass

        );
        $result=$this->db->insert("user",$data);
        return $result;
    }
   public function compare_pass($user_id,$pass){
       $this->db->select("*");
       $this->db->from('user');
       $this->db->where('user_id',$user_id);
       $this->db->where('pass',$pass);
       $query = $this->db->get();
       return  $query->row();
   }
    public function get_userName($user_id){
        $this->db->select('user_name');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->row();
    }
    public function get_by_id($user_id){
        $this->db->select();
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->row();
    }
}
<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_message_model extends CI_Model {
   public function get_message(){
       $this->db->select("*");
       $this->db->from('message');
       $this->db->order_by('message_date', 'DESC');
       $query = $this->db->get();
       return  $query->result();
   }
   public function do_message($name,$email,$content,$time){
       $array=array(
           'message_content'=>$content,
           'message_date'=>$time,
           'user_name'=>$name,
           'user_mail'=>$email
       );
       $result=$this->db->insert("message",$array);
       return $result;
   }
}
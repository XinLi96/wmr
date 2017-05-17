<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_message_model extends CI_Model {
   public function get_message(){//获取所有的留言按时间倒序
       $this->db->select("*");
       $this->db->from('message');
       $this->db->order_by('message_date', 'DESC');
       $query = $this->db->get();
       return  $query->result();
   }
   public function do_message($name,$email,$content,$time){//发表留言
       $array=array(
           'message_content'=>$content,
           'message_date'=>$time,
           'user_name'=>$name,
           'user_mail'=>$email
       );
       $result=$this->db->insert("message",$array);
       return $result;
   }
   public function del_by_id($message_id){//删除一条留言
       $sql = 'delete from message where message_id='.$message_id;
       $query = $this->db->query($sql);
       return $query;
   }
}
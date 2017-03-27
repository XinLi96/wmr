<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_comment_model extends CI_Model {
    public function do_comment($name,$email,$content,$hideBlogId,$time){
        $array=array(
            'comment_content'=>$content,
            'comment_post_date'=>$time,
            'comment_user_name'=>$name,
            'blog_id'=>$hideBlogId,
            'comment_user_email'=>$email
        );
        $result=$this->db->insert("comment",$array);
        return $result;
    }
    public function get_all_comment($blogId){
        $this->db->select("*");
        $this->db->from('comment');
        $this->db->where('blog_id',$blogId);
        $this->db->order_by('comment_post_date', 'DESC');
        $query = $this->db->get();
        return  $query->result();
    }
}
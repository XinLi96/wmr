<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_comment_model extends CI_Model {
    public function do_comment($name,$email,$content,$hideBlogId,$time){//发表评论
        $array=array(
            'comment_content'=>$content,
            'comment_post_date'=>$time,//属性名
            'comment_user_name'=>$name,
            'blog_id'=>$hideBlogId,
            'comment_user_email'=>$email
        );
        $result=$this->db->insert("comment",$array);
        return $result;
    }
    public function get_all_comment($blogId){//获取一个文章下的所有的评论按时间倒序
        $this->db->select("*");
        $this->db->from('comment');
        $this->db->where('blog_id',$blogId);
        $this->db->order_by('comment_post_date', 'DESC');
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_comments(){//获取所有的评论按时间倒序
        $this->db->select("comment.*,blog.blog_title");
        $this->db->from('comment');
        $this->db->join('blog','blog.blog_id=comment.blog_id');
        $this->db->order_by('comment_post_date', 'DESC');
        $query = $this->db->get();
        return  $query->result();
    }
    public function del_by_id($comment_id){//删除一条评论
        $sql = 'delete from comment where comment_id='.$comment_id;
        $query = $this->db->query($sql);
        return $query;
    }
}
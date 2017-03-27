<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_blog_model extends CI_Model {
    public function get_all_blog($limit=4,$offset=0){
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->join('user','blog.user_id=user.user_id');
        $this->db->join('cate','blog.cate_id=cate.cate_id');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_all_count(){
        $this->db->select("*");
        $this->db->from('blog');
        return $this->db->count_all_results();
    }
    public function get_blog_by_blogId($blogId){
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->join('user','blog.user_id=user.user_id');
        $this->db->join('cate','blog.cate_id=cate.cate_id');
        $this->db->where('blog.blog_id',$blogId);
        $query = $this->db->get();
        return  $query->row();
    }
    //获取一个作者下的所有文章
    public function get_all_blog_by_id($user_id){
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_all(){
        $sql = "select * from blog,cate,`user` where blog.user_id=user.user_id and blog.cate_id=cate.cate_id ORDER BY postdate DESC";
        $query = $this->db->query($sql);
        return  $query->result();
    }

}
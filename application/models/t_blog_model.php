<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_blog_model extends CI_Model {
    public function get_all_blog($limit=4,$offset=0){//获取所有的博客（分页显示，每页五篇文章）
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->join('user','blog.user_id=user.user_id');
        $this->db->join('cate','blog.cate_id=cate.cate_id');
        $this->db->order_by('postdate', 'DESC');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return  $query->result();
    }
    public function get_all_count(){//获取所有博客的总数
        $this->db->select("*");
        $this->db->from('blog');
        return $this->db->count_all_results();
    }
    public function get_blog_by_blogId($blogId){//查询博客通过博客的id
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->join('user','blog.user_id=user.user_id');
        $this->db->join('cate','blog.cate_id=cate.cate_id');
        $this->db->where('blog.blog_id',$blogId);
        $query = $this->db->get();
        return  $query->row();
    }
    public function get_all(){//按照时间的倒序获取所有的博客
        $sql = "select * from blog b,`user`,cate where b.cate_id=cate.cate_id and b.user_id=`user`.user_id ORDER BY postdate DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    //获取一个作者下的所有文章
    public function get_all_blog_by_id($user_id){
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->result();
    }
    //发布新文章
    public function add_article($addBlogname,$addBlogintro,$addBlogcontent,$addBlogcate,$hideUserId,$time,$con_img){
        $array=array(
            'blog_title'=>$addBlogname,
            'introduce'=>$addBlogintro,
            'blog_content'=>$addBlogcontent,
            'postdate'=>$time,
            'user_id'=>$hideUserId,
            'cate_id'=>$addBlogcate,
            'blog_img'=>$con_img
        );
        $result=$this->db->insert("blog",$array);
        return $result;
    }
    public function search($key){//通过关键字进行搜索（在标题和介绍中进行字符串匹配）
        $sql = 'select * from blog b,`user`,cate where b.cate_id=cate.cate_id and b.user_id=`user`.user_id and (blog_title LIKE '."'%$key%'".' or introduce LIKE '."'%$key%'".')';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function del_by_id($blog_id){//删除一篇文章
        $sql = 'delete from blog where blog_id='.$blog_id;
        $query = $this->db->query($sql);
        return $query;
    }
    public function change_blog($blog_con,$blog_id){
        $sql = 'update blog set blog_content='."'$blog_con'".' where blog_id='.$blog_id;
        $query = $this->db->query($sql);
        return  $query;
    }

}
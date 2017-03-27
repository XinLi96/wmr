<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('t_blog_model');
        $this->load->model('t_user_model');
        $this->load->model('t_comment_model');
        $this->load->model('t_cate_model');
        
    
    }
    public function get_all(){
        $user_id = $this->session->userdata('user_id');
        $count=$this->t_blog_model->get_all_count();//获取总数量
        /**分页开始**/
        $this->load->library('pagination');

        $config['base_url'] = 'blog/get_all/';
        $config['total_rows'] = $count;
        $config['per_page'] = 4;

        /**样式开始**/
        $config['prev_link']="《";
        $config['next_link']="》";
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        $config['first_tag_open']='<li>';
        $config['first_tag_close']='</li>';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['cur_tag_open']='<li ><a href="blog/get_all/" class="page_selected">';
        $config['cur_tag_close']='</a></li>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        /**样式结束**/
        $this->pagination->initialize($config);
        /**分页结束**/
        $offset=$this->uri->segment(3);
        $offset=!$offset?0:$offset;
        $rs= $this->t_blog_model->get_all_blog($config['per_page'],$offset);
        $rs_name=$this->t_user_model->get_userName($user_id);
        $this->load->view('index',array('rs'=>$rs,
            'user_name'=>$rs_name ));
        
    }
    public function get_blog(){
        $blogId = $this -> input -> get('blogId');
        $rs= $this->t_blog_model->get_blog_by_blogId($blogId);
        $user_id=$rs->user_id;//作者的id
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $rs_all_comment=$this->t_comment_model->get_all_comment($blogId);
        $this->load->view('article',array('rs'=>$rs,
            'rs_authorBlog'=>$rs_authorBlog,
            'rs_all_comment'=>$rs_all_comment));
    }
    public function add_article(){
        $user_id = $this->session->userdata('user_id');
        $rs_user=$this->t_user_model->get_mess($user_id);
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $rs_cate=$this->t_cate_model->get_all_cate();
        $this->load->view('add_article',array(
            'rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog,
            'rs_cate'=>$rs_cate
            
            ));
           
    }
    public function do_add_article(){
        $addBlogname = $this -> input -> post('addBlog-name');
        $addBlogintro=$this -> input -> post('addBlog-intro');
        $addBlogcontent = $this -> input -> post('addBlog-content');
        $addBlogcate=$this -> input -> post('select');
        $hideUserId= $this -> input -> post('hideUserId');
        $time=date('Y-m-d H:i:s',time());
        $rs=$this->t_blog_model->add_article($addBlogname,$addBlogintro,$addBlogcontent,$addBlogcate,$hideUserId,$time);
        if($rs){

            $this->load->view('pub-success');
        }
       

    }
   
}




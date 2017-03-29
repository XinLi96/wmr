<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
    public function __construct(){
        parent::__construct();
       
        $this->load->model('t_comment_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');

    }
    public function get_comment(){
        $user_id = $this->session->userdata('user_id');
        $comments=$this->t_comment_model->get_comments();
        $rs_user=$this->t_user_model->get_mess($user_id);
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $array=array(
            'comments'=>$comments,
            '$rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog

        );

        $this->load->view('comment.php',$array);

        
    }
    public function do_comment(){
        $hideBlogId=$_GET['hideBlogId'];
        $name=$_GET['name'];
        $email=$_GET['email'];
        $content=$_GET['content'];
        $time= $_GET['time'];
        $rs=$this->t_comment_model->do_comment($name,$email,$content,$hideBlogId,$time);
        
        if($rs){
            echo $rs;
            return;
        }else{
            echo 'false';
            return;
        }
      
       


    }

}




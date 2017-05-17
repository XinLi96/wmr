<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
    public function __construct(){
        parent::__construct();
       
        $this->load->model('t_comment_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');

    }
    public function get_comment(){//获取所有评论
//        $user_id = $this->session->userdata('user_id');
        $user_id = 1;
        $comments=$this->t_comment_model->get_comments();//获取所有评论
        $rs_user=$this->t_user_model->get_mess($user_id);//获取用户信息
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);//获取用户的博客
        $array=array(
            'comments'=>$comments,
            'rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog

        );
        $this->load->view('comment.php',$array);
    }
    public function do_comment(){//评论文章，通过ajax方式插入评论（会使用户体验性更好）
        $hideBlogId=$_GET['hideBlogId'];//通过get方式虎获取博客id
        $name=$_GET['name'];
        $email=$_GET['email'];
        $content=$_GET['content'];
        $time= $_GET['time'];
        $rs=$this->t_comment_model->do_comment($name,$email,$content,$hideBlogId,$time);
        
        if($rs){//插入成功
            echo $rs;
            return;
        }else{//插入失败
            echo 'false';
            return;
        }
    }
    public function admin_get_all(){//后台管理员获取所有的评论
        $result = $this->t_comment_model->get_comments();
        $arr['result'] = $result;
        $this->load->view('admin/view_comment.php',$arr);
    }
    public function del(){//后台管理员删除评论
        $comment_id = $this->input->get('comment_id');
        $result = $this->t_comment_model->del_by_id($comment_id);
        if($result){
            redirect('comment/admin_get_all');
        }else{
            echo '删除失败';
        }
    }

}




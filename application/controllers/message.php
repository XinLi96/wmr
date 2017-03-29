<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('t_message_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');

    }
    public function message(){
        $user_id = $this->session->userdata('user_id');
        $messages=$this->t_message_model->get_message();
        $rs_user=$this->t_user_model->get_mess($user_id);
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $array=array(
            'messages'=>$messages,
            'rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog

        );
        $this->load->view('message.php',$array);
    }
    public function do_message(){
        $name=$_GET['name'];
        $email=$_GET['email'];
        $content=$_GET['content'];
        $time= $_GET['time'];
        $rs=$this->t_message_model->do_message($name,$email,$content,$time);
        if($rs){
            echo $rs;
            return;
        }else{
            echo 'false';
            return;
        }

    }
   




    

}




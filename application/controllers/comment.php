<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
    public function __construct(){
        parent::__construct();
       
        $this->load->model('t_comment_model');
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




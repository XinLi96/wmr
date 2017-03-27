<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('t_user_model');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function do_reg(){
        $email = $this -> input -> post('email');
        $pass = $this -> input -> post('pass');
       $rs=$this->t_user_model->compare_email($email);

        if(!$rs){
            $rs_doReg=$this->t_user_model->do_reg($email,$pass);
            if($rs_doReg){
                echo "<script>alert('注册成功')</script>";
                $this->load->view('login',array('emil'=>$email));
            }
           
        }else{
            echo "<script>alert('此邮箱已被注册')</script>";
            $this->load->view('reg');
   }

    }
    public function login(){
        $this->load->view('login');
    }
    public function do_login(){
        $email = $this -> input -> post('email');
        $pass = $this -> input -> post('pass');
        $rs=$this->t_user_model->compare_email($email);
        $user_id=$rs->user_id;
        if($rs){
            $rs=$this->t_user_model->compare_pass($user_id,$pass);
            $array=array(
                'user_id'=>$user_id
            );
            $this->session->set_userdata($array);
            redirect('blog/get_all');
        }else{
            echo "<script>alert('该邮箱未注册')</script>";
        }
    }
    public function out(){
        unset($_SESSION['user_id']);
        redirect('blog/get_all');
    }
    public function personal(){
        $user_id = $this->session->userdata('user_id');
        $result = $this->t_user_model->get_by_id($user_id);
        $arr['result'] = $result;
        $this->load->view('personal.php',$arr);
    }

}




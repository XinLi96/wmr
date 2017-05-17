<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('t_user_model');
    }
    public function reg(){//加载注册页面
        $this->load->view('reg');
    }
    public function do_reg(){//注册账号
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
    public function login(){//加载登录页面
        $this->load->view('login');
    }
    public function do_login(){//博主登录
        $email = $this -> input -> post('email');//获取登录账号
        $pass = $this -> input -> post('pass');//获取登录密码
        $rs=$this->t_user_model->compare_email($email);//去数据库判断账号密码是否正确
        $user_id=$rs->user_id;
        if($rs){//登陆成功
            $rs=$this->t_user_model->compare_pass($user_id,$pass);
            $array=array(
                'user_id'=>$user_id
            );
            $this->session->set_userdata($array);
            redirect('blog/get_all');
        }else{//登录失败
            echo "<script>alert('该邮箱未注册')</script>";
        }
    }
    public function out(){//用户退出清空缓存
        unset($_SESSION['user_id']);
        redirect('blog/get_all');
    }
    public function personal(){//个人信息页面
        $user_id = $this->session->userdata('user_id');
        if($user_id){
            $result = $this->t_user_model->get_by_id($user_id);
            $arr['result'] = $result;
            $this->load->view('personal.php',$arr);
        }else{
            $this->load->view('login.php');
        }

    }
    public function update_info(){//修改个人信息
        $user_id = $this->session->userdata('user_id');
        $name = $this->input->post('name');
        $pass = $this->input->post('pass');
        $sex = $this->input->post('sex');
        $pro = $this->input->post('pro');
        $city = $this->input->post('city');
        $js = $this->input->post('js');

        $result = $this->t_user_model->update_info($user_id,$pass,$name,$sex,$pro,$city,$js);
        if($result){
            redirect(blog/get_all);
        }else{
            echo '更新失败';
        }
    }
    public function admin_log(){//加载管理员登录界面
        $this->load->view('admin/login.php');
    }
    public function admin_do_log(){//管理员登录
        $num = $this->input->post('num');
        $pass = $this->input->post('pass');

        $result = $this->t_user_model->admin_do_log($num,$pass);
        if($result){
            $this->load->view('admin/main.php');
        }
    }

}




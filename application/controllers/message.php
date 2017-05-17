<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('t_message_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');

    }
    public function message(){//进入留言板
//        $user_id = $this->session->userdata('user_id');
        $user_id = 1;
        $messages=$this->t_message_model->get_message();//获取所有的留言
        $rs_user=$this->t_user_model->get_mess($user_id);
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $array=array(
            'messages'=>$messages,
            'rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog
        );
        $this->load->view('message.php',$array);
    }
    public function do_message(){//发布留言
        $name=$_GET['name'];//get方式获取姓名
        $email=$_GET['email'];//get方式获取email
        $content=$_GET['content'];//get方式获取评论内容
        $time= $_GET['time'];//get方式获取发布时间
        $rs=$this->t_message_model->do_message($name,$email,$content,$time);
        if($rs){
            echo $rs;
            return;
        }else{
            echo 'false';
            return;
        }

    }
    public function admin_get_all(){//后台管理员查看所有的留言
        $result = $this->t_message_model->get_message();
        $arr['result'] = $result;
        $this->load->view('admin/view_message.php',$arr);
    }
    public function del(){//后台管理员删除留言
        $message_id = $this->input->get('message_id');
        $result = $this->t_message_model->del_by_id($message_id);
        if($result){
            redirect('message/admin_get_all');
        }else{
            echo '删除失败';
        }
    }




    

}




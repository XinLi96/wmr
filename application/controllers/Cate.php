<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('t_cate_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');
    }
    public function add_cate(){//跳入添加分类的页面
        $user_id = $this->session->userdata('user_id');//获取session中的用户id
        if($user_id){
            $rs_user=$this->t_user_model->get_mess($user_id);//获取用户信息
            $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);//获取用户的博客
            $this->load->view('add_cate',array(
                'rs_user'=>$rs_user,
                'rs_authorBlog'=>$rs_authorBlog));
        }else{
            $this->load->view('login.php');
        }

    }
   public function do_add_cate(){//添加分类
       $cate=$this->input->post('addcate');//获取添加的分类名
       $rs_cate=$this->t_cate_model->add_cate($cate);//在数据库中添加分类
       if($rs_cate){
           $this->load->view('pub-cate-success');
       }
   }
   public function admin_get_all(){//后台管理员查看所有的分类
       $result = $this->t_cate_model->get_all_cate();
       $arr['result'] = $result;
       $this->load->view('admin/view_cate.php',$arr);
   }
   public function del(){//管理员删除分类
       $cate_id = $this->input->get('cate_id');
       $result = $this->t_cate_model->del_by_id($cate_id);
       if($result){
           redirect('Cate/admin_get_all');
       }else{
           echo '删除失败';
       }
   }

}




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('t_cate_model');
        $this->load->model('t_user_model');
        $this->load->model('t_blog_model');
    }
    public function add_cate(){
        $user_id = $this->session->userdata('user_id');
        $rs_user=$this->t_user_model->get_mess($user_id);
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $this->load->view('add_cate',array(
            'rs_user'=>$rs_user,
            'rs_authorBlog'=>$rs_authorBlog));
    }
   public function do_add_cate(){
       $cate=$this->input->post('addcate');
       $rs_cate=$this->t_cate_model->add_cate($cate);
       if($rs_cate){
           $this->load->view('pub-cate-success');
       }
   }


}




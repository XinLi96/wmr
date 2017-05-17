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
    public function get_all(){//主页展示所有的文章
        $user_id = $this->session->userdata('user_id');
        $count=$this->t_blog_model->get_all_count();//获取总数量
        /**分页开始**/
        $this->load->library('pagination');//加载分页类

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
        $config['cur_tag_open']='<li ><a href="blog/get_all/" class="page_selected" style="">';
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
        $rs= $this->t_blog_model->get_all_blog($config['per_page'],$offset);//每一次换页之后取到的文章
        $rs_name=$this->t_user_model->get_userName($user_id);
        $this->load->view('index',array('rs'=>$rs,
            'user_name'=>$rs_name,'flag'=>0 ));//将文章内容放回页面
        
    }
    public function get_blog(){//查看每一个文章的详情并获取此文章下的所有评论
        $blogId = $this -> input -> get('blogId');//通过input的get方式获取博客id
        $rs= $this->t_blog_model->get_blog_by_blogId($blogId);
        $user_id=$rs->user_id;//作者的id
        $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);
        $rs_all_comment=$this->t_comment_model->get_all_comment($blogId);
        $this->load->view('article',array('rs'=>$rs,
            'rs_authorBlog'=>$rs_authorBlog,
            'rs_all_comment'=>$rs_all_comment));
    }
    public function time(){//时间线获取所有的博客
        $result = $this->t_blog_model->get_all();
        $arr['result'] = $result;
        $this->load->view('timeline.php',$arr);
    }
    public function add_article(){//需要发布文章时获取作者的信息、所有分类
        $user_id = $this->session->userdata('user_id');
        if($user_id){
            $rs_user=$this->t_user_model->get_mess($user_id);//获取作者的信息
            $rs_authorBlog=$this->t_blog_model->get_all_blog_by_id($user_id);//获取作者发表过得博客
            $rs_cate=$this->t_cate_model->get_all_cate();//获取所有的分类
            $this->load->view('add_article',array(
                'rs_user'=>$rs_user,
                'rs_authorBlog'=>$rs_authorBlog,
                'rs_cate'=>$rs_cate
            ));
        }else{
            $this->load->view('login.php');
        }


    }
    public function do_add_article(){//发布文章将文章内容、分类、介绍、时间、图片写入数据库
        $addBlogname = $this -> input -> post('addBlog-name');//获取文章标题
        $addBlogintro=$this -> input -> post('addBlog-intro');//获取文章介绍
        $addBlogcontent = $this -> input -> post('addBlog-content');//获取文章内容
        $addBlogcate=$this -> input -> post('select');//获取文章分类
        $hideUserId= $this -> input -> post('hideUserId');
        date_default_timezone_set('PRC');
        $time=date("Y-m-d H:i:s");;//获取发布时间

        /*上传文件开始*/
        $config['upload_path']      = './assets/uploads/';
        $config['allowed_types']    = 'gif|jpg|png';//允许上传的格式
        $config['max_size']     = 20000;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $img_name = $data['upload_data']['file_name'];
        }
        $con_img = 'assets/uploads/'.$img_name;//上传文件后的路径
        /*上传文件结束*/
        $rs=$this->t_blog_model->add_article($addBlogname,$addBlogintro,$addBlogcontent,$addBlogcate,$hideUserId,$time,$con_img);
        if($rs){//如果发布成功后执行
            $this->load->view('pub-success');
        }
    }
    public function search(){//通过与文章的标题、介绍相关的关键字搜索并产生结果
        $user_id = $this->session->userdata('user_id');
        $rs_name=$this->t_user_model->get_userName($user_id);//获取当前用户信息
        $key = $this->input->post('key');//获取搜索的关键字
        $result = $this->t_blog_model->search($key);//到数据库中进行搜索
        if($result){
            $arr['rs'] = $result;
            $arr['user_name'] = $rs_name;
            $arr['flag'] = 1;
            $this->load->view('index.php',$arr);
        }else{
            echo '搜索不到与此相关的文章';
        }
    }

    public function admin_get_all(){//后台管理员查看所有的文章
        $result = $this->t_blog_model->get_all();
        $arr['result'] = $result;
        $this->load->view('admin/view_blog.php',$arr);
    }

    public function del(){//后台管理员删除文章
        $blog_id = $this->input->get('blog_id');
        $result = $this->t_blog_model->del_by_id($blog_id);
        if($result){
            redirect('blog/admin_get_all');
        }else{
            echo '删除失败';
        }
    }
    public function change_blog(){
        $blog_id = $this->input->get('blog_id');
        $blog_con = $this->input->post('blog_con');

        $result = $this->t_blog_model->change_blog($blog_con,$blog_id);
        if($result){
            redirect(blog/get_all);
        }else{
            echo '修改失败';
        }
    }
}




<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_user_model extends CI_Model {
   public function compare_email($email){//比较账号是否存在
       $this->db->select("*");
       $this->db->from('user');
       $this->db->where('email',$email);
       $query = $this->db->get();
       return  $query->row();
   }

    public function do_reg($email,$pass){//注册账号
        $data=array(
            'email'=>$email,
            'pass'=>$pass
        );
        $result=$this->db->insert("user",$data);
        return $result;
    }
   public function compare_pass($user_id,$pass){//比较密码是否正确
       $this->db->select("*");
       $this->db->from('user');
       $this->db->where('user_id',$user_id);
       $this->db->where('pass',$pass);
       $query = $this->db->get();
       return  $query->row();
   }
    public function get_userName($user_id){//获取用户的名字
        $this->db->select('user_name');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->row();
    }
    public function get_by_id($user_id){//通过id获取用户信息
        $this->db->select();
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->row();
    }
    public function get_mess($user_id){//通过id获取用户信息
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return  $query->row();
    }
    public function update_info($user_id,$pass,$name,$sex,$pro,$city,$js){//更新用户的信息
        $sql = 'update user set user_name='."'$name'".',pass='."'$pass'".',sex='."'$sex'".',province='."'$pro'".',city='."'$city'".',user_introduction='."'$js'".' where user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return  $query;
    }
    public function admin_do_log($num,$pass){//后台管理员登录
        $sql = 'select * from user u where u.email='."'$num'".' and u.pass='.$pass;
        $query = $this->db->query($sql);
        return  $query->row();
    }
}














<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_cate_model extends CI_Model {
  public function add_cate($cate){//添加新分类
      $array=array(
          'cate_name'=>$cate
      );
      $result=$this->db->insert('cate',$array);
      return $result;
  }
    public function get_all_cate(){//获取所有的分类
        $this->db->select("*");
        $this->db->from('cate');
        $query = $this->db->get();
        return  $query->result();
    }
    public function del_by_id($cate_id){//删除一个分类
        $sql = 'delete from cate where cate_id='.$cate_id;
        $query = $this->db->query($sql);
        return $query;
    }

}
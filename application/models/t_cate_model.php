<?php   defined('BASEPATH') OR exit('No direct script access allowed');
class T_cate_model extends CI_Model {
  public function add_cate($cate){
      $array=array(
          'cate_name'=>$cate
      );
      $result=$this->db->insert('cate',$array);
      return $result;
  }
    public function get_all_cate(){
        $this->db->select("*");
        $this->db->from('cate');
        $query = $this->db->get();
        return  $query->result();
    }

}
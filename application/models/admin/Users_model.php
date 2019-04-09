<?php
class Users_model extends CI_Model
{

  function create_general($tbl,$data)
  {
    $this->db->insert($tbl,$data);
  }

  function get_general($tbl)
  {
    return $this->db->query("SELECT * FROM $tbl")->result();
  }

  function get_general_by_id($tbl,$val,$id)
  {
    return $this->db->query("SELECT * FROM $tbl where $val = '$id'")->result();
  }

  function get_general_like($tbl,$val,$id)
  {
    return $this->db->query("SELECT * FROM $tbl where $val like '%$id%'")->result();
  }

  function update_general($tbl,$id,$val,$data)
  {
    $this->db->where($id, $val);
    return $this->db->update($tbl, $data);
  }

  function get_users($tbl,$val,$group_id)
  {
    return $this->db->query("SELECT * FROM users u, $tbl a, users_group ug where a.$val=u.kon_id
      and ug.group_id='$group_id' and u.group_id=ug.group_id")->result();
  }

  function get_users_by_status($tbl,$val,$group_id,$status)
  {
    return $this->db->query("SELECT * FROM users u, $tbl a, users_group ug where a.$val=u.kon_id
      and ug.group_id='$group_id' and u.group_id=ug.group_id and a.status='$status'")->result();
  }

}
 ?>

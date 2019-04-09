<?php
class Dashboard_model extends CI_Model
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

  function update_general($tbl,$id,$val,$data)
  {
    $this->db->where($id, $val);
    return $this->db->update($tbl, $data);
  }

}
 ?>

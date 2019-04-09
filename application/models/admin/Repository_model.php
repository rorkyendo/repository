<?php
class Repository_model extends CI_Model
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

  function get_general_like($tbl,$val,$id)
  {
    return $this->db->query("SELECT * FROM $tbl a where a.$val like '%$id%'")->result();
  }

  function get_repository_log_acceptance($tbl,$user_id)
  {
    return $this->db->query("SELECT rc.nama_repository_category,fc.nama_file_category,a.* FROM $tbl a, repository_category rc, file_category fc
      where a.id_repository_category=rc.id_repository_category and a.id_file_category=fc.id_file_category
      and a.status!='1' and a.author_user_id='$user_id'")->result();
  }

  function get_repository($tbl,$user_id,$status)
  {
    return $this->db->query("SELECT rc.nama_repository_category,fc.nama_file_category,a.* FROM $tbl a, repository_category rc, file_category fc
      where a.id_repository_category=rc.id_repository_category and a.id_file_category=fc.id_file_category
      and a.status='$status' and a.author_user_id='$user_id'")->result();
  }

  function get_repository_log_acceptance_by_id($tbl,$id)
  {
    return $this->db->query("SELECT rc.nama_repository_category,fc.nama_file_category,a.* FROM $tbl a, repository_category rc, file_category fc
      where a.id_repository_category=rc.id_repository_category and a.id_file_category=fc.id_file_category and a.id_repository='$id'")->result();
  }

  function get_repository_by_id($tbl,$id)
  {
    return $this->db->query("SELECT * FROM $tbl a, repository_category rc, file_category fc
      where a.id_repository_category=rc.id_repository_category and
      a.id_file_category=fc.id_file_category and a.id_repository='$id'")->result();
  }

  function delete_general($tbl,$id,$val)
  {
    $this->db->delete($tbl, array($id => $val));
  }

  function get_repository_all($tbl,$status)
  {
    return $this->db->query("SELECT rc.nama_repository_category,fc.nama_file_category,a.* FROM $tbl a, repository_category rc, file_category fc
      where a.id_repository_category=rc.id_repository_category and a.id_file_category=fc.id_file_category
      and a.status='$status'")->result();
  }

}
 ?>

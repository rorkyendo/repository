<?php
class Log_model extends CI_Model
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
    return $this->db->query("SELECT * FROM $tbl where $val = $id")->result();
  }

  function update_general($tbl,$id,$val,$data)
  {
    $this->db->where($id, $val);
    return $this->db->update($tbl, $data);
  }

  function get_login()
  {
    return $this->db->query("SELECT * FROM users_session_login usl, users u
      WHERE u.user_id=usl.user_id ORDER BY login_time DESC")->result();
  }

  function get_left_join_general($tbl1,$tbl2,$id1,$id2)
  {
    return $this->db->query("SELECT * FROM $tbl1 LEFT JOIN $tbl2 on $tbl1.$id1=$tbl2.$id2")->result();
  }

  function get_log_repository_acceptance()
  {
    return $this->db->query("SELECT fc.nama_file_category,rc.nama_repository_category,r.*,u.username
      FROM repository r LEFT JOIN users u on r.accepted_by=u.user_id
      LEFT JOIN repository_category rc ON r.id_repository_category = rc.id_repository_category
      LEFT JOIN file_category fc ON r.id_file_category = fc.id_file_category
      WHERE r.status='0' or r.status='1' ORDER BY r.created_time DESC")->result();
  }

  function get_log_revision()
  {
    return $this->db->query("SELECT fc.nama_file_category,rc.nama_repository_category,r.*,u.username
      FROM repository r LEFT JOIN users u on r.accepted_by=u.user_id
      LEFT JOIN repository_category rc ON r.id_repository_category = rc.id_repository_category
      LEFT JOIN file_category fc ON r.id_file_category = fc.id_file_category
      WHERE r.status='2' ORDER BY r.created_time DESC")->result();
  }

  function get_log_revision_by_date($start_date,$end_date)
  {
    return $this->db->query("SELECT fc.nama_file_category,rc.nama_repository_category,r.*,u.username
      FROM repository r LEFT JOIN users u on r.accepted_by=u.user_id
      LEFT JOIN repository_category rc ON r.id_repository_category = rc.id_repository_category
      LEFT JOIN file_category fc ON r.id_file_category = fc.id_file_category
      WHERE r.status='2' and r.created_time between '$start_date' and '$end_date' ORDER BY r.created_time DESC")->result();
  }

}
 ?>

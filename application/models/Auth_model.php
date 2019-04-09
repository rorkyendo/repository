<?php
/**
 *
 */
class Auth_model extends CI_Model
{

  function create_general($tbl,$data)
  {
    $this->db->insert($tbl,$data);
  }

  function checkUser($username,$password)
  {
    return $this->db->query("SELECT * FROM users where username='$username' and password='$password'")->result();
  }

  function simpan_data_mahasiswa($dataMahasiswa)
  {
    $this->db->insert('data_mahasiswa',$dataMahasiswa);
  }

  function create_email_verifcation($data)
  {
    $this->db->insert('email_verification',$data);
  }

  function search_email_verification($hash)
  {
    return $this->db->query("SELECT * FROM email_verification ev, users u, data_member dm WHERE ev.verification_code='$hash' and
       ev.verification_user_id=u.user_id and u.kon_id=dm.id_member and u.group_id=5")->result();
  }

  function update_status_email_verification_member($id,$data)
  {
    $this->db->where("id_member", $id);
    return $this->db->update("data_member", $data);
  }

  function checkDataMahasiswa($kon_id)
  {
    return $this->db->query("SELECT * FROM data_mahasiswa where id_mahasiswa='$kon_id'")->result();
  }

  function checkDataMember($kon_id)
  {
    return $this->db->query("SELECT * FROM data_member where id_member='$kon_id' and status='1'")->result();
  }

  function check_nik($nik)
  {
    return $this->db->query("SELECT * FROM data_member where nik=$nik")->result();
  }

  function checkDataAdmin($kon_id)
  {
    return $this->db->query("SELECT * FROM data_admin where id_admin='$kon_id'")->result();
  }

  function checkDataValidator($kon_id)
  {
    return $this->db->query("SELECT * FROM data_validator where id_validator='$kon_id'")->result();
  }

  function simpan_data_user($dataUser)
  {
    $this->db->insert('users',$dataUser);
  }

  function createDataMember($dataUser)
  {
    $this->db->insert('data_member',$dataUser);
  }

}
 ?>

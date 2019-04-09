<?php
class Page_model extends CI_Model
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
    $sql="(SELECT *, nim as identity, email as email from repository_category rc,repository c,users a
    right join data_mahasiswa b on a.username=b.nim WHERE c.author_user_id = a.user_id and
    c.id_repository='$id' and c.id_repository_category=rc.id_repository_category and a.group_id=3 group by c.id_repository)union
    (SELECT *, nik as identity, email as email from repository_category rc, repository c,users a right join data_member b on
    a.kon_id=b.id_member WHERE c.author_user_id = a.user_id and c.id_repository='$id'
    and c.id_repository_category = rc.id_repository_category and a.group_id=5 group by c.id_repository)";
    return $this->db->query($sql)->result();
  }

  function delete_general($tbl,$id,$val)
  {
    $this->db->delete($tbl, array($id => $val));
  }

  function get_rows_repository_by_keyword($title,$author,$category)
  {
    $sql="(SELECT DISTINCT *, nim as identity, email as email from file_category fc, repository_category rc,repository c,users a
    right join data_mahasiswa b on a.username=b.nim WHERE c.title like '%$title%' and b.nama_depan
    like '%$author%' and rc.nama_repository_category like '%$category%'
    and c.author_user_id = a.user_id and c.id_repository_category=rc.id_repository_category and fc.id_file_category=1
    and c.status='1' and a.group_id=3 GROUP BY c.id_repository)union
    (SELECT DISTINCT *, nik as identity, email as email from file_category fc, repository_category rc, repository c,users a
    right join data_member b on a.kon_id=b.id_member WHERE c.title like '%$title%' and b.nama_depan like '%$author%'
    and rc.nama_repository_category like '%$category%' and c.author_user_id = a.user_id and c.id_repository_category = rc.id_repository_category
    and fc.id_file_category=1 and c.status='1' and a.group_id=5 GROUP BY c.id_repository)";
    return $this->db->query($sql)->num_rows();
  }

  function get_rows_repository()
  {
    return $this->db->query("SELECT * FROM repository r where r.id_file_category=1 and r.status='1'")->num_rows();
  }

  function data_repository($number,$offset)
  {
    return $query = $this->db->query("(SELECT *, nim as identity, email as email from repository c, repository_category rc, users a right join data_mahasiswa b
     on a.username=b.nim WHERE c.author_user_id = a.user_id and c.status='1' and c.id_repository_category=rc.id_repository_category and a.group_id=3 LIMIT $number OFFSET $offset)union
     ( SELECT *, nik as identity, email as email from repository c, repository_category rc,users a right join data_member b
     on a.kon_id=b.id_member WHERE c.author_user_id = a.user_id and c.id_repository_category=rc.id_repository_category and c.status='1' and a.group_id=5 LIMIT $number OFFSET $offset)")->result();
  }

  function data_repository_by_keyword($number,$offset,$title,$author,$category)
  {
    $sql="(SELECT DISTINCT *, nim as identity, email as email from file_category fc, repository_category rc,repository c,users a
    right join data_mahasiswa b on a.username=b.nim WHERE c.title like '%$title%' and b.nama_depan like '%$author%'
    and rc.nama_repository_category like '%$category%' and c.author_user_id = a.user_id and c.id_repository_category=rc.id_repository_category and
    fc.id_file_category=1 and c.status='1' and a.group_id=3 GROUP BY c.id_repository LIMIT $number OFFSET $offset) union
    (SELECT DISTINCT *, nik as identity, email as email from file_category fc, repository_category rc, repository c,users a
    right join data_member b on a.kon_id=b.id_member WHERE c.title like '%$title%' and b.nama_depan like '%$author%' and
    rc.nama_repository_category like '%$category%' and c.author_user_id = a.user_id and c.id_repository_category = rc.id_repository_category
    and fc.id_file_category=1 and c.status='1' and a.group_id=5 GROUP BY c.id_repository LIMIT $number OFFSET $offset)";
    return $query = $this->db->query($sql)->result();
  }

}
 ?>

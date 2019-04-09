<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
			parent::__construct();
			$this->load->helper('cookie');
			$this->load->model('Auth_model','dbObject');
			$this->load->library('encryption');
			$this->load->helper('send_email');
			if($getloc = json_decode(file_get_contents("http://ipinfo.io/"))==TRUE)
				{
					$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
					$this->ip = $getloc->ip;
					$this->country = $getloc->country;
				}else {
					$this->ip = $this->input->ip_address();
					$this->country = '';
				}
		}

  public function index(){
    redirect('repository/page');
  }

	public function login()
	{
		$identity = $this->input->post('identity');
		$password = $this->input->post('password');

		$passcrypt = md5($password);

		$data_user = $this->dbObject->checkUser($identity,$passcrypt);
		foreach ($data_user as $key){
			$group_id = $key->group_id;
			$kon_id = $key->kon_id;
			$user_id = $key->user_id;
		}

		if($data_user)
		{
			//--------Login Admin----//
			if($group_id=='1')
			{
				$rows1 = $this->dbObject->checkDataAdmin($kon_id);
				foreach ($rows1 as $row){
				$admin = array(
				'nama'=> $row->nama_admin,
				'group_id' => $group_id,
				'kon_id' => $kon_id,
				'user_id' => $user_id,
				'loggedIn' => TRUE
				);
			}
				$this->session->set_userdata($admin);
				$data_login = array(
					'user_id' => $user_id,
					'user_agents' => $this->agent->agent_string(),
					'ip_address' => $this->ip,
					'country' => $this->country
				);
				$this->dbObject->create_general('users_session_login',$data_login);
				redirect('admin/dashboard');
			}
			//--------End Login Admin----//

			//--------Login Validator----//
			if($group_id=='4')
			{
				$rows2 = $this->dbObject->checkDataValidator($kon_id);
				foreach ($rows2 as $row){
				$validator = array(
				'nama'=> $row->nama_validator,
				'group_id' => $group_id,
				'kon_id' => $kon_id,
				'user_id' => $user_id,
				'loggedIn' => TRUE
				);
				}
				$this->session->set_userdata($validator);
				$data_login = array(
					'user_id' => $user_id,
					'user_agents' => $this->agent->agent_string(),
					'ip_address' => $this->ip,
					'country' => $this->country
				);
				$this->dbObject->create_general('users_session_login',$data_login);
				redirect('validator/dashboard');
			}
			//--------End Login Validator----//


				//--------Login Mahasiswa----//
				if($group_id=='3')
				{
					$rows3 = $this->dbObject->checkDataMahasiswa($kon_id);
					foreach ($rows3 as $row){
					$mahasiswa = array(
					'nama'=> $row->nama_depan." ".$row->nama_belakang,
					'group_id' => $group_id,
					'nim' => $row->nim,
					'email' => $row->email,
					'kon_id' => $kon_id,
					'link_foto' => $row->link_foto,
					'prodi' => $row->program_studi,
					'user_id' => $user_id,
					'loggedIn' => TRUE
					);
				}

					$this->session->set_userdata($mahasiswa);
					$data_login = array(
						'user_id' => $user_id,
						'user_agents' => $this->agent->agent_string(),
						'ip_address' => $this->ip,
						'country' => $this->country
					);
					$this->dbObject->create_general('users_session_login',$data_login);
					redirect('mahasiswa/dashboard');
				}
				//--------End Login Mahasiswa----//

				//--------Login Member----//
				if($group_id=='5')
				{
					$rows5 = $this->dbObject->checkDataMember($kon_id);
					if($rows5){
					foreach ($rows5 as $row){
					$mahasiswa = array(
					'nama'=> $row->nama_depan." ".$row->nama_belakang,
					'group_id' => $group_id,
					'email' => $row->email,
					'kon_id' => $kon_id,
					'user_id' => $user_id,
					'loggedIn' => TRUE
					);
				}
					$this->session->set_userdata($mahasiswa);
					$data_login = array(
						'user_id' => $user_id,
						'user_agents' => $this->agent->agent_string(),
						'ip_address' => $this->ip,
						'country' => $this->country
					);
					$this->dbObject->create_general('users_session_login',$data_login);
					redirect('guest/dashboard');
				}else{
						echo"<script>alert('Maaf akun and belum diaktifasi silahkan aktifasi melalui email anda!');window.location='javascript:history.go(-1)';</script>";die;
					}
			}
				//--------End Login Member----//

		}else{
			$curl = curl_init();
					$url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
					$url["profil"] = "https://portal.usu.ac.id/profil/tampil.php";
					$url["email"] = "https://portal.usu.ac.id/email/ubah.php";
										 $cookie = "../assets/cookie.txt";

										 $data1 = [
											 'username' => $identity,
											 'password' => $password
										 ];

										 $data1 = http_build_query($data1);

										 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
										 curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);
										 curl_setopt($curl, CURLOPT_URL, $url["login"] );
										 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
										 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
										 curl_setopt($curl, CURLOPT_POST, 1);
										 curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));


						$html = curl_exec($curl);
						$pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
						preg_match($pattern, $html, $login);

						if(count($login)<=0){
					 		 	echo"<script>alert('Username atau Password Anda salah!');window.location='javascript:history.go(-1)';</script>";die;
						}else{
						curl_setopt($curl, CURLOPT_URL, $url['profil']);
						$html = curl_exec($curl);
					 	preg_match_all('/\<td>.?(.+)?<\/td>/', $html, $profil);


					 	curl_setopt($curl, CURLOPT_URL, $url['email']);
					 	$html = curl_exec($curl);
					 	preg_match_all('/<strong.+?id="myemail">(.+)<\/strong>/', $html, $email);

					 	$login[0] = $login[1];
					 	$login[1] = $login[2];
						$login[2] = $login[3];
						$profil = $profil[1];
						$ttl = explode(", ", $profil[2]);
						$nama = explode(' ', $login[0]);
						 for($i=1;$i<count($nama);$i++)
							 @$nama_belakang .= ' '.$nama[$i];
						 $bln["Januari"] = 1;
						 $bln["Februari"] =2;
						 $bln["Maret"] = 3;
						 $bln["April"] = 4;
						 $bln["Mei"] = 5;
						 $bln["Juni"] = 6;
						 $bln["Juli"] = 7;
						 $bln["Agustus"] = 8;
						 $bln["September"] = 9;
						 $bln["Oktober"] = 10;
						 $bln["November"] = 11;
						 $bln["Desember"] = 12;
						 $date = explode(" ", $ttl[1]);
						 $tgl_lahir = $date[2].'-'.$bln[$date[1]].'-'.$date[0];
						 $email = $email[1][0];
									 $dataMahasiswa = array(
										 'nama_depan' => $nama[0],
										 'nama_belakang' => $nama_belakang,
										 'nim' => $login[1],
										 'email' => $email,
										 'tempat_lahir' => $ttl[0],
										 'tanggal_lahir' => $tgl_lahir,
										 'program_studi' => $login[2],
										 'link_foto' => 'https://portal.usu.ac.id/photos/'.$login[1].'.jpg'
									 );
									 $insertDataMahasiswa = $this->dbObject->simpan_data_mahasiswa($dataMahasiswa);
									 $id_mahasiswa=$this->db->insert_id();
									 $dataUser = array(
										 'username' => $identity,
										 'password' => $passcrypt,
										 'group_id' => 3,
										 'kon_id' => $id_mahasiswa
									 );
									 $this->dbObject->simpan_data_user($dataUser);
									 $user_id = $this->db->insert_id();
									 $rows3 = $this->dbObject->checkDataMahasiswa($id_mahasiswa);
				 						foreach ($rows3 as $row){
				 						$mahasiswa = array(
				 						'nama'=> $row->nama_depan." ".$row->nama_belakang,
				 						'group_id' => $dataUser['group_id'],
				 						'nim' => $row->nim,
				 						'email' => $row->email,
				 						'kon_id' => $id_mahasiswa,
				 						'link_foto' => $row->link_foto,
				 						'prodi' => $row->program_studi,
										'user_id' => $user_id,
				 						'loggedIn' => TRUE
				 						);
										$this->session->set_userdata($mahasiswa);
				 					}
									// var_dump($mahasiswa);die;
									$data_login = array(
										'user_id' => $user_id,
										'user_agents' => $this->agent->agent_string(),
										'ip_address' => $this->ip,
										'country' => $this->country
									);
										redirect('mahasiswa/dashboard');
								 }
					}
			}

			public function register()
			{
				$nik = $this->input->post('nik');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$nama_depan = $this->input->post('nama_depan');
				$nama_belakang = $this->input->post('nama_belakang');
				$jenkel = $this->input->post('jenkel');
				$email = $this->input->post('email');
				$nomor_hp = $this->input->post('nomor_hp');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$tgl_lahir = $this->input->post('tgl_lahir');
				if($this->dbObject->check_nik($nik)==TRUE){
				foreach ($check_nik as $data) {
					$nik_db = $data->nik;
					$username_db = $data->username;
				}
				if($nik==$nik_db)
				{
					$this->session->set_flashdata('notif','<div class="alert alert-danger">NIK anda sudah terdaftar jika merasa NIK anda dipakai oleh orang lain atau email salah dimasukkan silahkan kontak administrator <a href="mailto:repository.fasilkom@gmail.com">Kirim Email</a></div>');
					redirect('repository/page/register');
				}elseif($username==$username_db) {
					$this->session->set_flashdata('notif','<div class="alert alert-danger">Username sudah dipakai silahkan cari username lain</div>');
					redirect('repository/page/register');
					}
				}else{
				$data_member = array(
					'nik' => $nik,
					'nama_depan' => $nama_depan,
					'nama_belakang' => $nama_belakang,
					'jenkel' => $jenkel,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => date('Y-m-d',strtotime($tgl_lahir)),
					'status' => '0',
					'email' => $email,
					'nomor_hp' => $nomor_hp
				);
				// var_dump($data_member);die;
				$this->dbObject->createDataMember($data_member);
				$id_member = $this->db->insert_id();
				$data_user_member = array(
					'username' => $username,
					'password' => md5($password),
					'group_id' => 5,
					'kon_id' => $id_member
				);
				$this->dbObject->simpan_data_user($data_user_member);
				$user_id = $this->db->insert_id();
				$this->send_email_verification(md5($nik),$user_id,$email);
				}
			}

			public function send_email_verification($hash,$user_id,$email)
			{
				$data_verification_code = array(
					'verification_code' => $hash,
					'verification_user_id' => $user_id
				);

				$this->dbObject->create_email_verifcation($data_verification_code);

				$url = base_url().'auth/verification/'.$hash;

				$subject = "Email Verification";
				$mailContent = "
				<div style='background-color:red'>
					&nbsp;
				</div>
				<div>
					<b>Untuk mengaktifkan akun anda silahkan klik link verifikasi kode dibawah ini.</b>
					<br>
					<a href='$url'>$url</a>
				</div>
				<div style='background-color:red'>
					&nbsp;
				</div>
				";
				$mailTo = $email;
				$mailFromId = "repository-fasilkom";
				$mailFromName = "repository-fasilkom";
				sendMail($subject, $mailContent, $mailTo, $mailFromId, $mailFromName);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Silahkan Check email anda untuk melakukan verifikasi akun</div>');
				redirect(base_url('repository/page/register'));
			}

			public function verification($hash)
			{
				$data_member = $this->dbObject->search_email_verification($hash);
				foreach($data_member as $data ){
					$id = $data->id_member;
				}
				$data = array(
					'status' => '1',
				);
				$this->dbObject->update_status_email_verification_member($id,$data);
				$this->session->set_flashdata('notif','<div class="alert alert-success">Selamat Akun anda telah aktif silahkan login</div>');
				redirect('repository/page/login');
			}

			public function logout()
			{
				$this->session->sess_destroy();
				redirect(base_url());
			}

}
?>

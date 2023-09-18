<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pemodal extends CI_Model {

		public function __construct() {
			$this->load->library("email");
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	      	parent::__construct();
	    }

        public function LoginProcess($captcha, $param) {
			/*if(empty($captcha)) {
				$ReturnData = [
					"IsError" => true,
					"lsdt" => "Please enter the captcha correctly"
				];
				return json_encode($ReturnData);
			} else if ($captcha == "tanpa_captcha") {
				$IsError = false;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Please enter the captcha correctly"
					];
					return json_encode($ReturnData);
				}
			}*/
			$args["email"] = $param["email"];
        	$args["password"] = $param["password"];
			$this->db->where("email", $args["email"]);
			$get_user = $this->db->get("v_pemodal")->result();
			if(!empty($get_user)) {
				if (password_verify($args["password"], str_replace("$", "\$", $get_user[0]->password))) {
        			$UserData["Data"] = $get_user[0];
					if(empty($this->session->set_userdata)) {
						$this->session->set_userdata(["user" => $UserData["Data"]]);
					}
					else {
						$this->session->sess_destroy();
						$this->session->set_userdata(["user" => $UserData["Data"]]);
					}
					$this->user = $this->session->userdata("user");
					$ReturnData = [
						"IsError" => false
					];
					return json_encode($ReturnData);
				} else {
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Login gagal! Password yang anda masukkan salah"
					];
					return json_encode($ReturnData);
				}
			} else {
				$ReturnData = [
					"IsError" => true,
					"lsdt" => "Login gagal! Email yang anda masukkan tidak terdaftar"
				];
				return json_encode($ReturnData);
			}
		}

		public function GetOTP() {
			$args_insert["email"] = $this->user->email;
		    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
		    $args_insert["created_at"] = date("Y-m-d H:i:s");
		    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
		    $args_insert["jenis"] = "Penarikan Saldo";
			$this->db->insert("tb_otp", $args_insert);
			// SENDMAIL
			$config = [
			    'mailtype'  => 'html',
			    'charset'   => 'utf-8',
			    'protocol'  => 'smtp',
			    'smtp_host' => 'srv87.niagahoster.com',
			    'smtp_user' => 'mail@obsido.co.id',
			    'smtp_pass'   => 'Obsido2021',
			    'smtp_crypto' => 'tls',
			    'smtp_port'   => 587,
			    'crlf'    => "\r\n",
			    'newline' => "\r\n"
			];
			$this->email->initialize($config);
	        $this->email->from('mail@obsido.co.id', "Obsido");
	        $this->email->to($args_insert["email"]);
	        $this->email->subject("Obsido - Kode Verifikasi");
	        $this->email->message("
				<div style='background: #eaeaea; padding: 30px;'>
					<div style='background: #fff; padding: 15px;'>
						<img style='display: block; max-width: 40%; max-width: 250px; margin: 0px auto;' src='https://obsido.co.id/assets/images/notif_email.png'>
						<br>
						<label>
							Halo <b>".$this->user->nama."</b>,<br>
							Silahkan gunakan kode verifikasi ini untuk menkonfirmasi pendaftaran akun kamu.<br>
							Jangan memberihatukan kode tersebut ke siapapun, termasuk pihak kami.
						</label><br><br>
						<div style='text-align:center;'>
						    <div style='background: #eaeaea;max-width: 250px;padding: 10px;margin: 0px auto;'>
						    <h1 style='margin-bottom: 0px;'>Kode Verifikasi</h1>
						    <h1>".$args_insert["code"]."</h1><br>
						    (Kode verifikasi ini berkalu 5 menit)
						</div>
						</div><br><br>
						<label>
							Kami tidak pernah meminta Anda untuk memberitahu kata sandi dan data pribadi Anda yang bersifat rahasia.
							<br>Jika Anda menerima email yang mencurigakan dengan tautan untuk memperbarui informasi akun Anda, jangan klik link tersebut.
						</label>
					</div>
				</div>
	        ");
	        $this->email->send();
			$ReturnData = [
				"IsError" => false
			];
			return json_encode($ReturnData);
		}
		public function SubmitTarikSaldo($param) {
			$this->db->where("email", $this->user->email);
			$get_user = $this->db->get("v_pemodal")->result();
			if(password_verify($param["password"], str_replace("$", "\$", $get_user[0]->password))) {
				$this->db->where("status", 0);
				$this->db->where("code", str_replace(" ", "", $param["kode_verifikasi"]));
				$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
	  			$GetOTP = $this->db->get("tb_otp")->result();
		      	if(!empty($GetOTP)) {
		        	$id_otp = $GetOTP[0]->id;
	             	$this->db->where("id", $id_otp);
			        $param_update_otp["status"] = 1;
					$this->db->update("tb_otp", $param_update_otp);

					$param_tarik["keterangan"] = "Penarikan Saldo sebesar Rp ".$param["nominal"];
					$param_tarik["id_pemodal"] = $this->session->userdata("user")->id;
					$param_tarik["nominal"] = (str_replace(".", "", $param["nominal"]))*-1;
					$param_tarik["no_transaksi"] = "TS".rand(1111111111,9999999999);
					$param_tarik["status"] = 1;
					$param_tarik["created_at"] = date("Y-m-d H:i:s");
					$param_tarik["expired_at"] = date("Y-m-d H:i:s", strtotime("+2 hours"));
					$this->db->insert("tb_topup", $param_tarik);

					$ReturnData = ["IsError" => false];
					return json_encode($ReturnData);
		      	} else {
					$ReturnData = ["IsError" => true, "lsdt" => "Kode Verifikasi salah"];
					return json_encode($ReturnData);
			   	}
			} else {
				$ReturnData = ["IsError" => true, "lsdt" => "Password salah"];
				return json_encode($ReturnData);
			}
		}

		public function VerifyEmailProcess($param) {
			$this->db->where("status", 0);
			$this->db->where("code", str_replace(" ", "", $param["otp"]));
			$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
  			$GetOTP = $this->db->get("tb_otp")->result();
	      	if(!empty($GetOTP)) {
	        	$id_otp = $GetOTP[0]->id;
             	$this->db->where("id", $id_otp);
		        $param_update_otp["status"] = 1;
				$this->db->update("tb_otp", $param_update_otp);

				$this->db->where("email", $param["email"]);
				$get_user = $this->db->get("v_pemodal")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $get_user[0]]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $get_user[0]]);
				}
				$ReturnData = ["IsError" => false];
				return json_encode($ReturnData);
	      	} else {
				$ReturnData = ["IsError" => true, "lsdt" => "Kode verifikasi salah"];
				return json_encode($ReturnData);
		   	}
		}

		public function SignUpProcess($captcha, $param) {
			/*if(empty($captcha)) {
				$ReturnData = [
					"IsError" => true,
					"lsdt" => "Please enter the captcha correctly"
				];
				return json_encode($ReturnData);
			} else if ($captcha == "tanpa_captcha") {
				$IsError = false;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Please enter the captcha correctly"
					];
					return json_encode($ReturnData);
				}
			}*/
			if(isset($param["email"])) {
            	$this->db->where("email", $param["email"]);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Email yang anda masukkan telah terdaftar"
					];
					return json_encode($ReturnData);
				}
			}
			if(isset($param["no_hp"])) {
            	$this->db->where("no_hp", $param["no_hp"]);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "No HP yang anda masukkan telah terdaftar"
					];
					return json_encode($ReturnData);
				}
			}
			if($param["password"] == $param["password2"]){
				unset($param["password2"]);
			} else {
				$ReturnData = [
					"IsError" => true,
					"lsdt" => "Password yang anda masukkan salah"
				];
				return json_encode($ReturnData);
			}
		    $param["password"] = password_hash($param["password"], PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
		    $param["created_at"] = date("Y-m-d H:i:s");
		    $param["updated_at"] = date("Y-m-d H:i:s");
			$query = $this->db->insert("tb_pemodal", $param);
			if(!$query){
				$ReturnData = [
					"IsError" => true,
					"lsdt" => $this->db->conn_id->error_list
				];
				return json_encode($ReturnData);
			} else {
				/*$this->foglobal->insert_log_pemodal($this->db->insert_id(), date("Y-m-d H:i:s"), $param["email"]." melakukan registrasi", $this->foglobal->ip_address());*/
				$this->db->where("email", $param["email"]);
				$get_user = $this->db->get("v_pemodal")->result();
				if(!empty($get_user)) {
					$UserData["Data"] = $get_user[0];
					$args_insert["email"] = $param["email"];
				    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
				    $args_insert["created_at"] = date("Y-m-d H:i:s");
				    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
					$this->db->insert("tb_otp", $args_insert);
					// SENDMAIL
					$config = [
					    'mailtype'  => 'html',
					    'charset'   => 'utf-8',
					    'protocol'  => 'smtp',
					    'smtp_host' => 'srv87.niagahoster.com',
					    'smtp_user' => 'mail@obsido.co.id',
					    'smtp_pass'   => 'Obsido2021',
					    'smtp_crypto' => 'tls',
					    'smtp_port'   => 587,
					    'crlf'    => "\r\n",
					    'newline' => "\r\n"
					];
					$this->email->initialize($config);
			        $this->email->from('mail@obsido.co.id', "Obsido");
			        $this->email->to($param["email"]);
			        $this->email->subject("Obsido - Kode Verifikasi");
			        $this->email->message("
						<div style='background: #eaeaea; padding: 30px;'>
							<div style='background: #fff; padding: 15px;'>
								<img style='display: block; max-width: 40%; max-width: 250px; margin: 0px auto;' src='https://obsido.co.id/assets/images/notif_email.png'>
								<br>
								<label>
									Silahkan gunakan kode verifikasi ini untuk menkonfirmasi pendaftaran akun kamu.<br>
									Jangan memberihatukan kode tersebut ke siapapun, termasuk pihak kami.
								</label><br><br>
								<div style='text-align:center;'>
								    <div style='background: #eaeaea;max-width: 250px;padding: 10px;margin: 0px auto;'>
								    <h1 style='margin-bottom: 0px;'>Kode Verifikasi</h1>
								    <h1>".$args_insert["code"]."</h1><br>
								    (Kode verifikasi ini berkalu 5 menit)
								</div>
								</div><br><br>
								<label>
									Kami tidak pernah meminta Anda untuk memberitahu kata sandi dan data pribadi Anda yang bersifat rahasia.
									<br>Jika Anda menerima email yang mencurigakan dengan tautan untuk memperbarui informasi akun Anda, jangan klik link tersebut.
								</label>
							</div>
						</div>
			        ");
			        $this->email->send();
					$ReturnData = [
						"IsError" => false
					];
					return json_encode($ReturnData);
				} else {
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Login gagal! Email yang anda masukkan tidak terdaftar"
					];
					return json_encode($ReturnData);
				}
			}
		}

		public function GetPemodal($param, $disable_page=false){
			if(isset($param["filter"]["id"]) and $param["filter"]["id"] != "") {
				$this->db->where("id", $param["filter"]["id"]);
			}
			if(isset($param["filter"]["nik"]) and $param["filter"]["nik"] != "") {
				$this->db->where("nik", $param["filter"]["nik"]);
			}
			$return_data["data"] = $this->db->get("v_pemodal")->result();
		    return $return_data;
		}

        public function UpdatePemodal($id_update, $param) {
        	if(isset($param["no_telfon_lama"]) && isset($param["no_telfon_baru"])) {
            	$this->db->where("no_hp", $param["no_telfon_baru"]);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					if($id_update != $GetPemodal[0]->id){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "No Telefon baru telah tedaftar";
						return json_encode($return_data);
					}
				}
            	$this->db->where("id", $id_update);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					if($GetPemodal[0]->no_hp != $param["no_telfon_lama"]){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "No Telefon lama salah";
						return json_encode($return_data);
					}
				}
				$param["no_hp"] = $param["no_telfon_baru"];
				unset($param["no_telfon_lama"]);
				unset($param["no_telfon_baru"]);
        	} else if(isset($param["kata_sandi_lama"]) && isset($param["kata_sandi_baru"])) {
            	$this->db->where("id", $id_update);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(password_verify($param["kata_sandi_lama"], str_replace("$", "\$", $GetPemodal[0]->password))) {
					if($param["kata_sandi_baru"] != $param["kata_sandi_baru2"]){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "Konfirmasi Kata Sandi salah";
						return json_encode($return_data);
					}
		    		$param["password"] = password_hash($param["kata_sandi_baru"], PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
					unset($param["kata_sandi_lama"]);
					unset($param["kata_sandi_baru"]);
					unset($param["kata_sandi_baru2"]);
				} else {
					$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = "Kata Sandi Lama salah";
					return json_encode($return_data);
				}
        	} else if(isset($param["email_lama"]) && isset($param["email_baru"])) {
            	$this->db->where("email", $param["email_baru"]);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					if($id_update != $GetPemodal[0]->id){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "Email baru telah tedaftar";
						return json_encode($return_data);
					}
				}
            	$this->db->where("id", $id_update);
            	$GetPemodal = $this->db->get("v_pemodal")->result();
				if(!empty($GetPemodal)){
					if($GetPemodal[0]->email != $param["email_lama"]){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "Email lama salah";
						return json_encode($return_data);
					}
				}
				$param["email"] = $param["email_baru"];
				unset($param["email_lama"]);
				unset($param["email_baru"]);
        	} else {
	        	$param["status_verify_send"] = 1;
	        	$param["status_verify"] = 0;
				$param["updated_at"] = date("Y-m-d H:i:s");
				if(isset($param["tgl_lahir"]) && $param["tgl_lahir"] != "") {
					$param["tgl_lahir"] = date("Y-m-d", strtotime($param["tgl_lahir"]));
				}
				if(isset($param["nik"]) && isset($param["nik"])) {
	            	$this->db->where("nik", $param["nik"]);
	            	$GetPemodal = $this->db->get("v_pemodal")->result();
					if(!empty($GetPemodal)){
						if($id_update != $GetPemodal[0]->id){
							$return_data["IsError"] = true;
							$return_data["ErrorMessage"] = "NIK telah tedaftar";
							return json_encode($return_data);
						}
					}
	        	}
				$param["penghasilan_per_tahun"] = str_replace(".", "", $param["penghasilan_per_tahun"]);
        	}
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_pemodal", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$this->db->where("id", $id_update);
				$get_user = $this->db->get("v_pemodal")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $get_user[0]]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $get_user[0]]);
				}
			}
		   	return $query;
        }


		public function TopUp($param){
			$param["keterangan"] = "Topup sebesar Rp ".$param["nominal"];
			$param["id_pemodal"] = $this->session->userdata("user")->id;
			$param["nominal"] = str_replace(".", "", $param["nominal"]);
			$param["va"] = "2582".$this->session->userdata("user")->nik;
			$param["no_transaksi"] = "TO".rand(1111111111,9999999999);
			$param["status"] = 0;
			$param["created_at"] = date("Y-m-d H:i:s");
			$param["expired_at"] = date("Y-m-d H:i:s", strtotime("+2 hours"));
			$query = $this->db->insert("tb_topup", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return json_encode($param);
		}

		public function ResetPIN($param){
			$this->db->where("email", $this->user->email);
			$get_user = $this->db->get("v_pemodal")->result();
			if(!empty($get_user)) {
				if (password_verify($param["password"], str_replace("$", "\$", $get_user[0]->password))) {
		        	$args_reset_pin["code"] = substr(md5(microtime()),rand(0,26),25);
		        	$args_reset_pin["id_pemodal"] = $this->user->id;
					$args_reset_pin["id_penerbit"] = null;
				    $args_reset_pin["created_at"] = date("Y-m-d H:i:s");
				    $args_reset_pin["expired_at"] = date("Y-m-d H:i:s", strtotime("+10 min"));
					$args_reset_pin["status"] = 0;
					$this->db->insert("tb_reset_pin", $args_reset_pin);

					$args_insert["email"] = $this->user->email;
				    $args_insert["code"] = rand(pow(10, 6-1), pow(10, 6)-1);
				    $args_insert["created_at"] = date("Y-m-d H:i:s");
				    $args_insert["expired_at"] = date("Y-m-d H:i:s", strtotime("+5 min"));
				    $args_insert["jenis"] = "Reset PIN";
					$this->db->insert("tb_otp", $args_insert);
					// SENDMAIL
					$config = [
					    'mailtype'  => 'html',
					    'charset'   => 'utf-8',
					    'protocol'  => 'smtp',
					    'smtp_host' => 'srv87.niagahoster.com',
					    'smtp_user' => 'mail@obsido.co.id',
					    'smtp_pass'   => 'Obsido2021',
					    'smtp_crypto' => 'tls',
					    'smtp_port'   => 587,
					    'crlf'    => "\r\n",
					    'newline' => "\r\n"
					];
					$this->email->initialize($config);
			        $this->email->from('mail@obsido.co.id', "Obsido");
			        $this->email->to($args_insert["email"]);
			        $this->email->subject("Obsido - Reset PIN");
			        $this->email->message("
						<div style='background: #eaeaea; padding: 30px;'>
							<div style='background: #fff; padding: 15px;'>
								<img style='display: block; max-width: 150px; margin: 0px auto;' src='https://obsido.co.id/assets/images/logo.png'>
								<br>
								<label>
									Halo <b>".$this->user->nama."</b>,<br>
									Silahkan gunakan kode verifikasi ini untuk melanjutkan perubahan PIN kamu
								</label><br><br>
								<div style='text-align:center;'>
								    <div style='background: #eaeaea;max-width: 250px;padding: 10px;margin: 0px auto;'>
									    <h1 style='margin-bottom: 0px;'>Kode Verifikasi</h1>
									    <h1>".$args_insert["code"]."</h1><br>
									    (Kode verifikasi ini berkalu 5 menit)
									</div>
								</div><br><br>
								<label>
									Anda juga bisa klik tombol di bawah ini untuk mendaftarkan PIN akun kamu, jangan memberitahukan tautan ini kepada siapapun, karena ini bersifat rahasia.<br>
								</label><br>
								<div style='text-align: center'>
									<a style='background: #0084ff; padding: 10px 50px; border-radius: 5px; color: #fff; text-decoration: none; font-weight: bold; display: inline-block; text-align: center;' href='https://obsido.co.id/user/reset_pin.html?code=".$args_reset_pin["code"]."' target='_blank'>Reset PIN</a>
								</div><br><br>
								<label>
									Kami tidak pernah meminta Anda untuk memberitahu kata sandi dan data pribadi Anda yang bersifat rahasia.
									<br>Jika Anda menerima email yang mencurigakan dengan tautan untuk memperbarui informasi akun Anda, jangan klik link tersebut.
									<br><br><br><hr><br>Jika kamu memiliki pertanyaan atau kendala, silakan hubungi 0823748294221 atau email ke support@obsiodo.id
								</label>
							</div>
						</div>
			        ");
			        $this->email->send();
					return 1;
				} else {
				   	$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = "Password yang anda masukkan salah";
					return json_encode($return_data);
				}
			} else {
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "User tidak terdaftar";
				return json_encode($return_data);
			}
		}

		public function VerifikasiOTP($param){
			$this->db->where("email", $this->user->email);
			$this->db->where("status", 0);
			$this->db->where("code", str_replace(" ", "", $param["otp"]));
			$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
  			$GetOTP = $this->db->get("tb_otp")->result();
	      	if(!empty($GetOTP)) {
	        	$id_otp = $GetOTP[0]->id;
             	$this->db->where("id", $id_otp);
		        $param_update_otp["status"] = 1;
				$this->db->update("tb_otp", $param_update_otp);
				return 1;
	      	} else {
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Kode verifikasi salah";
				return json_encode($return_data);
		   	}
		}

		public function GetTopup($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
    		$this->db->where("status", 1);
        	$this->db->where("id_pemodal", $this->user->id);
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				$this->db->where_not_in("id", $param["filter"]["array_id"]);
			}
            // END SEARCH & FILTER
            if(!empty($param["Sort"])) {
            	$param["Sort"] = explode(" ",trim($param["Sort"]));
            	$this->db->order_by($param["Sort"][0], $param["Sort"][1]);
			}
	    	if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"];
            if(!empty($param["Page"])) $args["Page"] = $param["Page"];
            if(empty($param["Page"])){
            	$args["Limit"] = "10";
            	$args["Page"] = "1";
            }
            if(empty($param["Limit"])){
            	$args["Limit"] = "10";
            }
            if($disable_page == true){
            	$args["Limit"] = "0";
            	$args["Page"] = "0";
            }
            $this->db->limit($args["Limit"], ($args["Limit"]*$args["Page"])-$args["Limit"]);
			if(!empty($param["filter"]["id"])) {
				$this->db->where("id", $param["filter"]["id"]);
				$return_data["data"] = $this->db->get("tb_topup")->result();
			} else {
				$return_data["data"] = $this->db->get("tb_topup")->result();
	            // START SEARCH & FILTER 
	    		$this->db->where("status", 1);
	        	$this->db->where("id_pemodal", $this->user->id);
				if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
					$this->db->where_not_in("id", $param["filter"]["array_id"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("tb_topup")->num_rows();
	            $return_data["paging"]["InfoPage"] = $return_data["paging"]["DataDari"]." - ".$return_data["paging"]["DataSampai"]." from ".$return_data["paging"]["Total"];
	            if($return_data["paging"]["Count"] != 0 && (int)$args["Limit"] != 0){
	            	$return_data["paging"]["JmlHalTotal"] = ceil($return_data["paging"]["Total"]/(int)$args["Limit"]);
	            } else {
	            	$return_data["paging"]["JmlHalTotal"] = 1;
	            }
	            if((int)$return_data["paging"]["HalKe"] < $return_data["paging"]["JmlHalTotal"]){
	            	$return_data["paging"]["IsNext"] = true;
	            } else {
	            	$return_data["paging"]["IsNext"] = false;
	            }
	            $return_data["paging"]["IsPaging"] = true;
	            if((int)$return_data["paging"]["HalKe"] <= 1){
	            	$return_data["paging"]["IsPrev"] = false;
	            } else {
	            	$return_data["paging"]["IsPrev"] = true;
	            }
			}
    		$this->db->where("status", 1);
        	$this->db->where("id_pemodal", $this->user->id);
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				$this->db->where_not_in("id", $param["filter"]["array_id"]);
			}
        	$return_data["data_next"] = $this->db->get("tb_topup")->result();
		    return $return_data;
		}

		public function HtmlTopup($param){
		    $rHtml ="";
			$query = $this->GetTopup($param);
			$array_id = array();
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				foreach ($param["filter"]["array_id"] as $item_id) {
					array_push($array_id, $item_id);
				}
			}
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					if($item->nominal < 0){
						$nominal = "<span class='text-danger'>Rp".$this->foglobal->rupiah(($item->nominal*-1))."</span>";
					} else {
						$nominal = "Rp".$this->foglobal->rupiah($item->nominal);
					}
	                $rHtml .= "<div class='col-12 box-shadow rounded pt-3 pb-3 pl-4 pr-4 mb-4'>
								    <div class='row'>
								        <div class='col-lg-9 col-md-8 col-sm-6'>
								            <label class='bold'>".$item->no_transaksi."</label><br>
								            <label class='mt-2'>".$item->keterangan."</label><br>
								            <label class='mt-2'>".date("d M Y", strtotime($item->created_at))."</label>
								        </div>
								        <div class='col-lg-3 col-md-4 col-sm-6 text-right'>
								            <label class='bold'>".$nominal."</label><br>
								            <label class='mt-2'>".$item->metode_pembayaran."</label><br>
								            <label class='mt-2'>".$item->va."</label>
								        </div>
								    </div>
								</div>";
					array_push($array_id, $item->id);
				}
			} else {
				$rHtml = "<div class='col-12 box-shadow rounded pt-3 pb-3 pl-4 pr-4'><div class='row'><div class='col-12 text-center'><span class='badge badge-pill badge-warning text-white p-3'>Tidak ada data</span></div></div></div>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging, "array_id" => $array_id];
            return json_encode($ReturnData);
		}

		public function InsertBookmark($param) {
			$this->db->where("id_pemodal", $this->user->id);
			$this->db->where("id_properti", $param);
        	$this->db->order_by("updated_by", "desc");
            $this->db->limit(1);
			$GetBookmark = $this->db->get("tb_bookmark")->result();
			if(!empty($GetBookmark)) {
				if($GetBookmark[0]->status_delete == 0){
				    $args["updated_at"] = date("Y-m-d H:i:s");
				    $args["updated_by"] = $this->user->nama;
				    $args["status_delete"] = "1";
		         	$this->db->where("id", $GetBookmark[0]->id);
				    $query = $this->db->update("tb_bookmark", $args);
					if(!$query){
						return 1;
					} else {
						return 2;
					}
				} else {
				    $args["updated_at"] = date("Y-m-d H:i:s");
				    $args["updated_by"] = $this->user->nama;
				    $args["status_delete"] = "0";
		         	$this->db->where("id", $GetBookmark[0]->id);
				    $query = $this->db->update("tb_bookmark", $args);
					if(!$query){
						return 2;
					} else {
						return 1;
					}
				}
			} else {
			    $args["id_pemodal"] = $this->user->id;
			    $args["id_properti"] = $param;
			    $args["created_at"] = date("Y-m-d H:i:s");
			    $args["updated_at"] = date("Y-m-d H:i:s");
			    $args["created_by"] = $this->user->nama;
			    $args["updated_by"] = $this->user->nama;
			    $args["status_delete"] = "0";
				$query = $this->db->insert("tb_bookmark", $args);
				if(!$query){
					return 2;
				} else {
					return 1;
				}
			}
		}
		public function InsertLinkResetPassword($args) {
			$this->db->where("email", $args["email"]);
  			$GetPemodal = $this->db->get("tb_pemodal")->result();
	      	if(!empty($GetPemodal)) {
	        	$args_reset_password["code"] = substr(md5(microtime()),rand(0,26),25);
	        	$args_reset_password["id_pemodal"] = $GetPemodal[0]->id;
				$args_reset_password["id_penerbit"] = null;
			    $args_reset_password["created_at"] = date("Y-m-d H:i:s");
			    $args_reset_password["expired_at"] = date("Y-m-d H:i:s", strtotime("+10 min"));
				$args_reset_password["status"] = 0;
				$query = $this->db->insert("tb_reset_password", $args_reset_password);
				if(!$query){
				   	$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
					return json_encode($return_data);
				} else {
					$args_send_email["email_sender"] = "mail@obsido.co.id";
					$args_send_email["password_sender"] = "Obsido2021";
					$args_send_email["name_sender"] = "Obsido";
					$args_send_email["subject"] = "Obsido - Reset Password";
					$args_send_email["message"] = "
					<div style='background: #eaeaea; padding: 30px;'>
						<div style='background: #fff; padding: 15px;'>
							<img style='display: block; max-width: 40%; max-width: 150px; margin: 0px auto;' src='https://obsido.co.id/assets/images/logo.png'>
							<h1 style='text-align: center;'>Reset Password</h1>
							<hr>
							<label>
								Halo <b>".$GetPemodal[0]->nama."</b>,<br>
								Anda telah meminta untuk mengatur ulang kata sandi Anda, tautan ini berlaku selama <b>5 menit</b>.<br>
								Silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda.
							</label><br><br>
							<div style='text-align: center'>
								<a style='background: #0084ff; padding: 10px 50px; border-radius: 5px; color: #fff; text-decoration: none; font-weight: bold; display: inline-block; text-align: center;' href='https://obsido.co.id/user/reset_password.html?code=".$args_reset_password["code"]."' target='_blank'>Reset Password</a>
							</div><br><br>
							<label>
								Kami tidak pernah meminta Anda untuk memberitahu kata sandi dan data pribadi Anda yang bersifat rahasia.
								<br>Jika Anda menerima email yang mencurigakan dengan tautan untuk memperbarui informasi akun Anda, jangan klik link tersebut.
							</label>
						</div>
					</div>
			        ";
					$args_send_email["email_recipient"] = $GetPemodal[0]->email;
					$args_send_email["status_sent"] = 0;
					$args_send_email["type"] = 1;
					$args_send_email["created_at"] = date("Y-m-d H:i:s");
					$args_send_email["updated_at"] = date("Y-m-d H:i:s");
					$this->db->insert("tb_send_email", $args_send_email);
					return $query;
				}
	      	} else {
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Email yang anda masukkan tidak terdaftar";
				return json_encode($return_data);
		   	}
        }

        public function SimpanResetPassword($param) {
        	$code = $param["code"];
        	$id_user = $param["id_user"];
        	if($param["kata_sandi_baru"] != $param["kata_sandi_baru2"]){
				$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Konfirmasi Kata Sandi salah";
				return json_encode($return_data);
			}
    		$param["password"] = password_hash($param["kata_sandi_baru"], PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
			unset($param["kata_sandi_baru"]);
			unset($param["kata_sandi_baru2"]);
			unset($param["code"]);
			unset($param["id_user"]);
         	$this->db->where("id", $id_user);
		    $query = $this->db->update("tb_pemodal", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$param_update_reset_password["status"] = 1;
	         	$this->db->where("id_pemodal", $id_user);
			    $this->db->update("tb_reset_password", $param_update_reset_password);
			}
		   	return $query;
        }
	}

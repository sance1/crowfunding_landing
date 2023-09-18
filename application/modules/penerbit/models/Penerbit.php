<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Penerbit extends CI_Model {

		public function __construct() {
			$this->load->library("email");
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	      	parent::__construct();
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
			    'smtp_host' => 'smtp.gmail.com',
			    'smtp_user' => 'windana.id@gmail.com',
			    'smtp_pass'   => 'Malang2021',
			    'smtp_crypto' => 'tls',
			    'smtp_port'   => 587,
			    'crlf'    => "\r\n",
			    'newline' => "\r\n"
			];
			$this->email->initialize($config);
	        $this->email->from('windana.id@gmail.com', "Obsido");
	        $this->email->to($args_insert["email"]);
	        $this->email->subject("Obsido - Kode Verifikasi");
	        $this->email->message("Kode Verifikasi Penarikan Saldo : ".$args_insert["code"]."<br>
	        	Kode ini akan kadaluarsa dalam 5 menit
	        ");
	        $this->email->send();
			$ReturnData = [
				"IsError" => false
			];
			return json_encode($ReturnData);
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
				$get_user = $this->db->get("v_penerbit")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user_penerbit" => $get_user[0]]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user_penerbit" => $get_user[0]]);
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
            	$GetPenerbit = $this->db->get("v_penerbit")->result();
				if(!empty($GetPenerbit)){
					$ReturnData = [
						"IsError" => true,
						"lsdt" => "Email yang anda masukkan telah terdaftar"
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
			$query = $this->db->insert("tb_penerbit", $param);
			if(!$query){
				$ReturnData = [
					"IsError" => true,
					"lsdt" => $this->db->conn_id->error_list
				];
				return json_encode($ReturnData);
			} else {
				$this->db->where("email", $param["email"]);
				$get_user = $this->db->get("v_penerbit")->result();
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
					    'smtp_host' => 'smtp.gmail.com',
					    'smtp_user' => 'windana.id@gmail.com',
					    'smtp_pass'   => 'Malang2021',
					    'smtp_crypto' => 'tls',
					    'smtp_port'   => 587,
					    'crlf'    => "\r\n",
					    'newline' => "\r\n"
					];
					$this->email->initialize($config);
			        $this->email->from('windana.id@gmail.com', "Obsido");
			        $this->email->to($param["email"]);
			        $this->email->subject("Obsido - Kode Verifikasi");
			        $this->email->message("Kode Verifikasi : ".$args_insert["code"]."<br>
			        	Kode ini akan kadaluarsa dalam 5 menit
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

		public function UpdatePenerbit($id_update, $param) {
			$jabatan_lainnya = $param["jabatan_lainnya"];
			if($param["jabatan"] == "LAINNYA"){
				$param["jabatan"] = $jabatan_lainnya;
			}
        	$param["status_verify_send"] = 1;
        	$param["no_telepon"] = $param["kode_telepon"].$param["no_telepon"];
        	unset($param["kode_telepon"]);
        	unset($param["jabatan_lainnya"]);
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_penerbit", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$this->db->where("id", $id_update);
				$get_user = $this->db->get("v_penerbit")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user_penerbit" => $get_user[0]]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user_penerbit" => $get_user[0]]);
				}
			}
		   	return $query;
        }
	}

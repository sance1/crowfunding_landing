<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        // $this->foglobal->CheckSessionLogin();
		// FACEBOOK
		require_once APPPATH.'third_party/Facebook/autoload.php';
	    $this->load->model("Facebook_login");

	    // GOOGLE
		require_once APPPATH.'third_party/src/Google_Client.php';
		require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	    $this->load->model("Google_login");
	}
	public function login(){
		if(!empty($this->session->userdata("user"))) {
            redirect("home");
        } else {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
            $this->load->view("user/login", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
	        ));
        }
	}
	public function new_pin(){
		if(!empty($this->session->userdata("user"))) {
			if($this->session->userdata("user")->pin == "" || $this->session->userdata("user")->pin == null){
				$this->db->where("name", "Untuk di Perhatikan");
				$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
				$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
	            $this->load->view("user/new_pin", array(
		            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
		        ));
			} else {
            	redirect("home");
			}
        } else {
            redirect("home");
        }
	}
	public function lupa_password(){
		if(!empty($this->session->userdata("user"))) {
            redirect("home");
        } else {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
            $this->load->view("user/lupa_password", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
	        ));
        }
	}
	public function reset_password(){
		$code = $_GET["code"];
		$this->db->where("code", $code);
		$this->db->where("status", 0);
		$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
		$GetResetPassword = $this->db->get("tb_reset_password")->result();
      	if(!empty($GetResetPassword)) {
      		// $this->db->where("id", $GetResetPassword[0]->id_pemodal);
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
      		$this->load->view("user/reset_password", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan,
	            "id_user" => $GetResetPassword[0]->id_pemodal
	        ));
      	} else {
      		redirect("home");
      	}
	}
	public function reset_pin(){
		$code = $_GET["code"];
		$this->db->where("code", $code);
		$this->db->where("status", 0);
		$this->db->where("expired_at >=", date("Y-m-d H:i:s"));
		$GetResetPIN = $this->db->get("tb_reset_pin")->result();
      	if(!empty($GetResetPIN)) {
      		// $this->db->where("id", $GetResetPIN[0]->id_pemodal);
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
      		$this->load->view("user/reset_pin", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan,
	            "id_user" => $GetResetPIN[0]->id_pemodal
	        ));
      	} else {
      		redirect("home");
      	}
	}
	public function signup(){
		if(!empty($this->session->userdata("user"))) {
            redirect("home");
        } else {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
            $this->load->view("user/signup", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
	        ));
        }
	}

	public function logout() {
        $this->session->sess_destroy();
        redirect("home");
    }

    public function edit_profil(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
		$this->load->view("user/edit_profil", array(
			"edit_profil" => "active",
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}

	public function verifikasi(){
		if(!empty($this->session->userdata("user"))) {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
			$this->db->where("id_pemodal", $this->session->userdata("user")->id);
			$GetPemodal = $this->db->get("tb_verifikasi_pemodal")->result();
            $this->load->view("user/verifikasi", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan,
		        "pemodal" => $GetPemodal
	        ));
        } else {
            redirect("home");
        }
	}

	public function verifikasi_penerbit(){
		if(!empty($this->session->userdata("user_penerbit"))) {
			if($this->session->userdata("user_penerbit")->status_verify_send == 0){
				$this->db->where("name", "Untuk di Perhatikan");
				$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
				$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
				$this->load->view("user/verifikasi_penerbit", array(
		            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
		        ));
			} else {
        		$this->session->sess_destroy();
				redirect("home");
			}
        } else {
            redirect("home");
        }
	}
	
	public function profil_pengguna(){
		if(!empty($this->session->userdata("user"))) {
			if($this->session->userdata("user")->pin == "" || $this->session->userdata("user")->pin == null){
            	redirect("home");
			} else {
				$this->db->where("name", "Untuk di Perhatikan");
				$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
				$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
	            $this->load->view("user/profil_pengguna", array(
		            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
		        ));
			}
        } else {
            redirect("home");
        }
	}
	
	public function daftar_keinginan(){
		if(!empty($this->session->userdata("user"))) {
			if($this->session->userdata("user")->pin == "" || $this->session->userdata("user")->pin == null){
            	redirect("home");
			} else {
				$this->db->where("name", "Untuk di Perhatikan");
				$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
				$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
	            $this->load->view("user/daftar_keinginan", array(
		            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
		        ));
			}
        } else {
            redirect("home");
        }
	}
	
	public function histori_saldo(){
		if(!empty($this->session->userdata("user"))) {
			if($this->session->userdata("user")->pin == "" || $this->session->userdata("user")->pin == null){
            	redirect("home");
			} else {
				$this->db->where("name", "Untuk di Perhatikan");
				$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
				$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
	            $this->load->view("user/histori_saldo", array(
		            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
		        ));
			}
        } else {
            redirect("home");
        }
	}




	// FACEBOOK
	public function facebook(){
		$FBObject = new \Facebook\Facebook([
			'app_id' => '848305466023274',
			'app_secret' => 'a7c62a52d7da696d6b3c241822d17e6a',
			'default_graph_version' => 'v2.10'
		]);
		$handler = $FBObject -> getRedirectLoginHelper();
		$redirectTo = base_url()."user/check_login_facebook";
		$data = ['email'];
		$fullURL = $handler->getLoginUrl($redirectTo, $data);
		header("Location: $fullURL");
	}
	public function check_login_facebook(){
		$FBObject = new \Facebook\Facebook([
			'app_id' => '848305466023274',
			'app_secret' => 'a7c62a52d7da696d6b3c241822d17e6a',
			'default_graph_version' => 'v2.10'
		]);
		$handler = $FBObject -> getRedirectLoginHelper();
		try {
		    $accessToken = $handler->getAccessToken();
		}catch(\Facebook\Exceptions\FacebookResponseException $e){
		    echo "Response Exception: " . $e->getMessage();
		    exit();
		}catch(\Facebook\Exceptions\FacebookSDKException $e){
		    echo "SDK Exception: " . $e->getMessage();
		    exit();
		}
		if(!$accessToken){
        	redirect("");
		    exit();
		}
		$oAuth2Client = $FBObject->getOAuth2Client();
		if(!$accessToken->isLongLived())
		    $accessToken = $oAuth2Client->getLongLivedAccesToken($accessToken);
		    $response = $FBObject->get("/me?fields=id,name,email,birthday,gender,hometown,likes{name},age_range,location,picture.type(large)", $accessToken);
		    $userData = $response->getGraphNode()->asArray();
		    $Request = $this->Facebook_login->LoginProcess($userData);
			// $id_log_insert = $this->Log_login_user->InsertLog($Request[0]->id);
        	if(empty($this->session->set_userdata)) {
				$this->session->set_userdata(["user" => $Request[0]]);
			}
			else {
				$this->session->sess_destroy();
				$this->session->set_userdata(["user" => $Request[0]]);
			}
        	redirect("home");
		    exit();
	}


	// GOOGLE
	public function google()
	{
		$clientId = '1077299908161-7jvu8q65kgrbl5e2tnrvgrf9atovbtmj.apps.googleusercontent.com'; //Google client ID
		$clientSecret = 'naOV52hAJbXnhjmadZAFl59m'; //Google client secret
		$redirectURL = base_url().'user/google';
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		if(isset($_GET['code'])){
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}
		if (isset($_SESSION['token'])) {
			$gClient->setAccessToken($_SESSION['token']);
		}
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			$Request = $this->Google_login->LoginProcess($userProfile);
			// $id_log_insert = $this->Log_login_user->InsertLog($Request[0]->id);
        	if(empty($this->session->set_userdata)) {
				$this->session->set_userdata(["user" => $Request[0]]);
			}
			else {
				$this->session->sess_destroy();
				$this->session->set_userdata(["user" => $Request[0]]);
			}
        	redirect("home");
        } else {
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}	
}
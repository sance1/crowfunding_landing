<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Foglobal extends CI_Model {
			
		protected $user;

		public function __construct() {
			parent::__construct();
		}

		function secondsToTime($seconds) {
			if($seconds == 0){
				return "0 detik";
			}
	        $days = floor($seconds / 86400);
	        $seconds -= ($days * 86400);

	        $hours = floor($seconds / 3600);
	        $seconds -= ($hours * 3600);

	        $minutes = floor($seconds / 60);
	        $seconds -= ($minutes * 60);

	        $values = array(
	            'day'    => $days,
	            'hour'   => $hours,
	            'minute' => $minutes,
	            'second' => $seconds
	        );

	        $parts = array();

	        foreach ($values as $text => $value) {
	            if ($value > 0) {
	                $parts[] = $value . ' ' . $text . ($value > 1 ? 's' : '');
	            }
	        }
	        $return = implode(' ', $parts);
	        $return = str_replace("days", "hari", $return);
	        $return = str_replace("hours", "jam", $return);
	        $return = str_replace("minutes", "menit", $return);
	        $return = str_replace("seconds", "detik", $return);
	        return $return;
	    }
	    public function SahamSaya($id){
			$email = $this->session->userdata('user')->email;
	
			$sumBeli = $this->db->select_sum('lembar_saham')
			->where('email',$email)
			->where('id_properti',$id)
			->where('keterangan','jual')
			->get('tb_transaksi_jual_beli')->result();

			$sumConvertLembarSahamTb_Saham = $this->db->select_sum('lembar_saham')
			->where('email',$email)
			->where('id_properti',$id)
			->get('tb_saham')->result();

			foreach ($sumBeli as $item) {
				$tb_transaksi_jb = $item->lembar_saham;
			}
			foreach ($sumConvertLembarSahamTb_Saham as $item1) {
				$tb_saham = $item1->lembar_saham;
			}

			if($tb_transaksi_jb == null){
				$tb_transaksi_jb = 0;
			}
			if($tb_saham == null){
				$tb_saham = 0;
			}
			$data = $tb_saham - $tb_transaksi_jb;
			if($data == null){
				$data = 0;
			}
			return $data; 
		}
		public function rupiah($angka, $with_rp = false){
			if($angka == "" || $angka == null){
				return 0;
			} else {
				$angka = str_replace(".00", "", (string)$angka);
				if($with_rp == true){
					$hasil_rupiah = "Rp" . number_format($angka,0,'','.');
					return $hasil_rupiah."";
				} else {
					$hasil_rupiah = number_format($angka,0,'','.');
					return $hasil_rupiah."";
				}
			}
		}

		public function persen($angka){
            if(substr($angka, -2) == "00"){
                $hasil = substr($angka, 0, -3);
            } else {
            	$hasil = $angka;
            }
             return $hasil;
		}

		public function UploadImage($param) {
			$this->api->setAction("ImageUpload");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}

		public function DeleteImage($param) {
			$this->api->setAction("ImageDelete");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}
		
		public function MakeJsonError($message) {
			return json_encode([
				"IsError" => true, 
				"ErrMessage" => $message
			]);
		}

		public function encrypt($string) {
			return hash("ripemd160", md5($string));
		}

		public function RandomWord($len = 5) {
		    $word = array_merge(range('a', 'z'), range('A', 'Z'));
		    shuffle($word);
		    return substr(implode($word), 0, $len);
		}

		public function ImgProfile2Photo($db_image) {
			if(preg_match("/(http|https)/", $db_image)) {
				return $db_image;
			} else {
				$img = str_replace("1|", "", $db_image);
				return base_url("assets/upload/images/".$img);
			}
		}

		public function MakeAlert($message, $type = "warning") {
			return "<div class='alert alert-{$type}'><a role='button' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>{$message}</div>";
		}

		public function IDtoTextKey($id) {
			$data = [1 => "Admin", 2 => "Sekolah", 3 => "Pengguna"];
			return (array_key_exists($id, $data)) ? $data[$id]: "Level tidak valid";
		}

		public function IDtoSex($id) {
	      	$data = [1 => "Laki - laki", 2 => "Perempuan"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Jenis Kelamin tidak valid";
	    }

	    public function date_abs($tgl) {
	      $bulan  = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
	      $string = explode("-", $tgl);

	      $stgl   = ($string[2] <= 9) ? "0".$string[2]: $string[2];
	      $sbulan = ($string[1] - 1);
	      $sbulan = (array_key_exists($sbulan, $bulan)) ? $bulan[$sbulan]: "Bulan tidak valid";
	      $stahun = $string[0];

	      return $stgl." ".$sbulan." ".$stahun; 
	    }

	    public function IDtoMonth($id) {
	      	$data = [1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
	      			 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Bulan tidak valid";
	    }

	    public function NumbertoMonth($id) {
	      	$data = [1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun",
	      			 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Bulan tidak valid";
	    }

	    public function CheckSessionLogin() {
			if(empty($this->session->userdata("user"))) {
				if(empty($this->session->userdata("user_penerbit"))) {

				} else {
					$this->db->where("name", "Biaya Admin");
					$get_biaya_admin = $this->db->get("tb_setting")->result();
					$biaya_admin = (int)$get_biaya_admin[0]->value;
					$this->db->where("id", $this->session->userdata("user_penerbit")->id);
					$get_user = $this->db->get("v_penerbit")->result();
		        	if(empty($this->session->set_userdata)) {
						$this->session->set_userdata(["user_penerbit" => $get_user[0], "biaya_admin" => $biaya_admin]);
					}
					else {
						$this->session->sess_destroy();
						$this->session->set_userdata(["user_penerbit" => $get_user[0], "biaya_admin" => $biaya_admin]);
					}
				}
			} else {
				$this->db->where("name", "Biaya Admin");
				$get_biaya_admin = $this->db->get("tb_setting")->result();
				$biaya_admin = (int)$get_biaya_admin[0]->value;
				$this->db->where("id", $this->session->userdata("user")->id);
				$get_user = $this->db->get("v_pemodal")->result();
	        	if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $get_user[0], "biaya_admin" => $biaya_admin]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $get_user[0], "biaya_admin" => $biaya_admin]);
				}
				if($this->session->userdata("user")->pin == "" || $this->session->userdata("user")->pin == null){
					redirect("user/new_pin");
					return;
				}
			}
			return;
		}


		public function HakAkses($no_urut, $redirect = true) {
			$this->user = $this->session->userdata("user");

			$explode = $this->user->hak_akses;
			if (strpos($explode, $no_urut) !== false) {
			    return true;
			} else {
				if($redirect) redirect("not_found");
				return false;
			}
		}

		public function ApiSession($param) {
			$this->api->set("sekolah/m01_administrator/Controller_karyawan/session", $param);
			return $this->api->exec();
		}

		public function CheckStrip($param) {
		    return !empty($param) ? $param : "-";
		}

		public function formatAngka($angka, $precision = 0) { //contoh format sebelum di convert 1000000 
	      if(is_numeric($angka)) {
	        return number_format($angka, $precision, ",", ".");
	      }
	      return $angka;
	    }
	    
		public function ParseGambar($url) {
			if(preg_match("!(http|https)!", $url)) {
				$url = str_replace("https", "http", $url);
				return $url;
			} else {
				$url = str_replace("2|", "", $url);
				return $this->config->item("cdn_url")."/sekolah/images/".$url;
			}
		}
	}

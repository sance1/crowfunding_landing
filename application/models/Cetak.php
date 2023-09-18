<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Cetak extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	    }

	    public function GetMutasiTabungan($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->like("REKENING", $param["Search"]);
				$this->db->or_like("NAMA", $param["Search"]);
				$this->db->or_like("Keterangan", $param["Search"]);
			}
			if(isset($param["filter"]["jk"]) and $param["filter"]["jk"] != "") {
            	$this->db->where("KELAMIN", $param["filter"]["jk"]);
			}
			if(isset($param["filter"]["id_tabungan"]) and $param["filter"]["id_tabungan"] != "") {
            	$this->db->where("REKENING", $param["filter"]["id_tabungan"]);
			}
			if(isset($param["filter"]["dk"]) and $param["filter"]["dk"] != "") {
            	$this->db->where("DK", $param["filter"]["dk"]);
			}
			if(isset($param["filter"]["cetak"]) and $param["filter"]["cetak"] != "") {
				if($param["filter"]["cetak"] == "1" || $param["filter"]["cetak"] == 1){
            		$this->db->where("Status", "1");
				}
				if($param["filter"]["cetak"] == "2" || $param["filter"]["cetak"] == 2){
            		$this->db->where("Status", null);
				}
			}
			if(!empty($param["filter"]["TGL"])) {
				$this->db->where("TGL >=", date("Y-m-d", strtotime(mb_substr($param["filter"]["TGL"], 0, 10))));
				$this->db->where("TGL <=", date("Y-m-d", strtotime(substr($param["filter"]["TGL"], -10))));
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
				$this->db->where("ID", $param["filter"]["id"]);
				$return_data["data"] = $this->db->get("v_mutasitabungan")->result();
			} else {
				$return_data["data"] = $this->db->get("v_mutasitabungan")->result();
				if(!empty($param["filter"]["TGL"]) and !empty($param["filter"]["id_tabungan"])) {
            		$this->db->where("REKENING", $param["filter"]["id_tabungan"]);
					$this->db->where("TGL <", date("Y-m-d", strtotime(mb_substr($param["filter"]["TGL"], 0, 10))));
					$return_data["saldo_akhir"] = $this->db->get("v_mutasitabungan")->result();
				}
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->like("REKENING", $param["Search"]);
					$this->db->or_like("NAMA", $param["Search"]);
					$this->db->or_like("Keterangan", $param["Search"]);
				}
				if(isset($param["filter"]["jk"]) and $param["filter"]["jk"] != "") {
		        	$this->db->where("KELAMIN", $param["filter"]["jk"]);
				}
				if(isset($param["filter"]["id_tabungan"]) and $param["filter"]["id_tabungan"] != "") {
		        	$this->db->where("REKENING", $param["filter"]["id_tabungan"]);
				}
				if(isset($param["filter"]["dk"]) and $param["filter"]["dk"] != "") {
	            	$this->db->where("DK", $param["filter"]["dk"]);
				}
				if(isset($param["filter"]["cetak"]) and $param["filter"]["cetak"] != "") {
					if($param["filter"]["cetak"] == "1" || $param["filter"]["cetak"] == 1){
	            		$this->db->where("Status", "1");
					}
					if($param["filter"]["cetak"] == "2" || $param["filter"]["cetak"] == 2){
	            		$this->db->where("Status", null);
					}
				}
				if(!empty($param["filter"]["TGL"])) {
					$this->db->where("TGL >=", date("Y-m-d", strtotime(mb_substr($param["filter"]["TGL"], 0, 10))));
					$this->db->where("TGL <=", date("Y-m-d", strtotime(substr($param["filter"]["TGL"], -10))));
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_mutasitabungan")->num_rows();
	            $return_data["paging"]["InfoPage"] = $return_data["paging"]["DataDari"]." - ".$return_data["paging"]["DataSampai"]." dari ".$return_data["paging"]["Total"];
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
		    return $return_data;
		}
	}

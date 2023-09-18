<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Master_data_kecamatan extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetKecamatan($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama LIKE '%".$param["Search"]."%' OR
					nama_provinsi LIKE '%".$param["Search"]."%' OR
					nama_kota LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
    		$this->db->where("status_delete", 0);
			if(isset($param["filter"]["id_provinsi"]) and $param["filter"]["id_provinsi"] != "") {
            	$this->db->where("id_provinsi", $param["filter"]["id_provinsi"]);
			}
			if(isset($param["filter"]["id_kota"]) and $param["filter"]["id_kota"] != "") {
            	$this->db->where("id_kota", $param["filter"]["id_kota"]);
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
				$return_data["data"] = $this->db->get("tb_kecamatan")->result();
			} else {
				$return_data["data"] = $this->db->get("tb_kecamatan")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama LIKE '%".$param["Search"]."%' OR
						nama_provinsi LIKE '%".$param["Search"]."%' OR
						nama_kota LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
	    		$this->db->where("status_delete", 0);
				if(isset($param["filter"]["id_provinsi"]) and $param["filter"]["id_provinsi"] != "") {
	            	$this->db->where("id_provinsi", $param["filter"]["id_provinsi"]);
				}
				if(isset($param["filter"]["id_kota"]) and $param["filter"]["id_kota"] != "") {
	            	$this->db->where("id_kota", $param["filter"]["id_kota"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("tb_kecamatan")->num_rows();
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

		public function HtmlKecamatan($param){
		    $rHtml ="";
			$query = $this->GetKecamatan($param);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
                    $rHtml .= "<tr>
								    <td class='text-center' style='padding-top:10px !important;'>
								        <div class='btn-group mb-1'>
								            <button class='btn btn-primary btn-sm dropdown-toggle button-menu btn-icon' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                <a class='dropdown-item edit-master-data-kecamatan' data-id='".$item->id."'><i class='fa fa-pencil-alt button-icon'></i> Edit</a>
								                <a class='dropdown-item hapus-master-data-kecamatan' data-id='".$item->id."'><i class='fa fa-times button-icon'></i> Hapus</a>
								            </div>
								        </div>
								    </td>
								    <td>".$item->nama_provinsi."</td>
								    <td>".$item->nama_kota."</td>
								    <td>".$item->nama."</td>
								</tr>";

				}
			} else {
				$rHtml = "<tr><td colspan='4' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>Tidak ada data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function DropdownKecamatan($param) {
			$rHtml ="";
			$query = $this->GetKecamatan($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->id.'">'.$item->nama.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">Tidak Ada Data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}

		public function InsertKecamatan($args) {
			if(isset($args["nama"])) {
	    		$this->db->where("status_delete", 0);
            	$this->db->where("nama", $args["nama"]);
            	$this->db->where("id_kota", $args["id_kota"]);
            	$GetKecamatan = $this->db->get("tb_kecamatan")->result();
				if(!empty($GetKecamatan)){
					$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = "Kecamatan telah terdaftar";
					return json_encode($return_data);
				}
			}
			$query = $this->db->insert("tb_kecamatan", $args);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." menambahkan Kecamatan '".$args["nama"]."'", $this->foglobal->ip_address());
			}
		   	return $query;
        }

        public function UpdateKecamatan($id_update, $param) {
        	if(isset($param["nama"])) {
	    		$this->db->where("status_delete", 0);
            	$this->db->where("nama", $param["nama"]);
            	$this->db->where("id_kota", $param["id_kota"]);
            	$GetKecamatan = $this->db->get("tb_kecamatan")->result();
				if(!empty($GetKecamatan)){
					if($id_update != $GetKecamatan[0]->id){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "Kecamatan telah tedaftar";
						return json_encode($return_data);
					}
				}
			}
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_kecamatan", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
	        	$this->db->where("id", $id_update);
	        	$GetKecamatan = $this->db->get("tb_kecamatan")->result();
	        	$nama_kecamatan = $GetKecamatan[0]->nama;
				$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." mengubah Kecamatan '".$nama_kecamatan."'", $this->foglobal->ip_address());
			}
		   	return $query;
        }

        public function HapusKecamatan($id_update) {
        	$this->db->where("id", $id_update);
        	$GetKecamatan = $this->db->get("tb_kecamatan")->result();
        	$nama_kecamatan = $GetKecamatan[0]->nama;
		    $param["status_delete"] = 1;
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_kecamatan", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$this->foglobal->insert_log_admin($this->user->id, date("Y-m-d H:i:s"), $this->user->nama." menghapus Kecamatan '".$nama_kecamatan."'", $this->foglobal->ip_address());
			}
		   	return $query;
        }
	}

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Admin extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetAdmin($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					name LIKE '%".$param["Search"]."%' OR
					username LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["gender"]) and $param["filter"]["gender"] != "") {
            	$this->db->where("gender", $param["filter"]["gender"]);
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
				$return_data["data"] = $this->db->get("tb_admin")->result();
			} else {
				$return_data["data"] = $this->db->get("tb_admin")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						name LIKE '%".$param["Search"]."%' OR
						username LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["gender"]) and $param["filter"]["gender"] != "") {
	            	$this->db->where("gender", $param["filter"]["gender"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("tb_admin")->num_rows();
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
		    return $return_data;
		}

		public function HtmlAdmin($param){
		    $rHtml ="";
			$query = $this->GetAdmin($param);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					if($item->photo == "" || $item->photo == null){
						$photo = "-";
					} else {
						$photo = "<a class='zoom-photo'><img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$item->photo."'></a>";
					}
                    $rHtml .= "<tr>
								    <td class='text-center' style='padding-top:4px !important;'>
								        <div class='btn-group mb-1'>
								            <button class='btn btn-primary dropdown-toggle button-menu' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								                <i class='fa fa-bars'></i>
								            </button>
								            <div class='dropdown-menu'>
								                <a class='dropdown-item edit-admin' data-id='".$item->id."'><i class='fa fa-pencil-alt button-icon'></i> Edit</a>
								                <a class='dropdown-item password-admin' data-id='".$item->id."'><i class='fa fa-unlock-alt button-icon'></i> Edit Password</a>
								                <a class='dropdown-item hapus-admin' data-id='".$item->id."'><i class='fa fa-times button-icon'></i> Delete</a>
								            </div>
								        </div>
								    </td>
								    <td><center>".$photo."</center></td>
								    <td>".$item->name."</td>
								    <td>".$item->gender."</td>
								    <td>".$item->username."</td>
								</tr>";

				}
			} else {
				$rHtml = "<tr><td colspan='5' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>No data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function DropdownAdmin($param) {
			$rHtml ="";
			$query = $this->GetAdmin($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->id.'">'.$item->name.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">No data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}

		public function InsertAdmin($args) {
			if(isset($args["username"])) {
            	$this->db->where("username", $args["username"]);
            	$GetAdmin = $this->db->get("tb_admin")->result();
				if(!empty($GetAdmin)){
					$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = "Username already registered";
					return json_encode($return_data);
				}
			}
		    $args["password"] = password_hash($args["password"], PASSWORD_DEFAULT);
			$query = $this->db->insert("tb_admin", $args);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function UpdateAdmin($id_update, $param) {
        	$set_session = false;
        	if(isset($param["session"]) and $param["session"] == 1) {
				unset($param["session"]);
				$set_session = true;
        	}
        	if(isset($param["username"])) {
            	$this->db->where("username", $param["username"]);
            	$GetAdmin = $this->db->get("tb_admin")->result();
				if(!empty($GetAdmin)){
					if($id_update != $GetAdmin[0]->id){
						$return_data["IsError"] = true;
						$return_data["ErrorMessage"] = "Username already registered";
						return json_encode($return_data);
					}
				}
			}
			if(isset($param["password"])) {
        		$param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);
        	}
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_admin", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				if($set_session == true) {
	            	$this->db->where("id", $this->user->id);
					$Data = $this->db->get("tb_admin")->result();
					$Data = $Data[0];
					if(empty($this->session->set_userdata)) {
						$this->session->set_userdata(["user" => $Data, "user_login" => $this->user_login]);
					}
					else {
						$this->session->sess_destroy();
						$this->session->set_userdata(["user" => $Data, "user_login" => $this->user_login]);
					}
				}
			}
		   	return $query;
        }

        public function HapusAdmin($id_update) {
		    $this->db->where("id", $id_update);
		    $query = $this->db->delete("tb_admin");
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}

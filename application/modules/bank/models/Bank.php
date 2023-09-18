<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Bank extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetBank($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
			if(isset($param["filter"]["status_active"]) and $param["filter"]["status_active"] != "") {
			} else {
				$this->db->where("status_active", 1);
			}
			if(isset($param["filter"]["id_bank"]) and $param["filter"]["id_bank"] != "") {
            	$this->db->where("id_bank", $param["filter"]["id_bank"]);
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
				$return_data["data"] = $this->db->get("tb_bank")->result();
			} else {
				$return_data["data"] = $this->db->get("tb_bank")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
				if(isset($param["filter"]["status_active"]) and $param["filter"]["status_active"] != "") {
				} else {
					$this->db->where("status_active", 1);
				}
				if(isset($param["filter"]["id_bank"]) and $param["filter"]["id_bank"] != "") {
	            	$this->db->where("id_bank", $param["filter"]["id_bank"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("tb_bank")->num_rows();
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

		/*public function HtmlBank($param){
		    $rHtml ="";
			$query = $this->GetBank($param);
			$array_id = array();
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				foreach ($param["filter"]["array_id"] as $item_id) {
					array_push($array_id, $item_id);
				}
			}
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
                    $foto = json_decode($item->foto);
                    if(empty($foto)){
                        $foto = "<img style='width: 100%; height:auto;' src='".base_url("/assets/images/default-placeholder.png")."'>";
                    } else {
                        $foto = "<img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$foto[0]."'>";
                    }
                    $rHtml .= "<tr>
								    <td><center style='max-height: 130px; overflow: hidden;'>".$foto."</center></td>
								    <td>
								    	<label class='bold'>".$item->nama."</label><br><br>
								    	<label>".$item->alamat."</label><br><br><br>
								    	<a class='text-primary'><i class='far fa-star'></i> Bookmark</a>
								    </td>
								    <td>
								    	<label class='bold'>530</label><br>
                                        <div class='progress mt-1 mb-1'>
                                            <div class='progress-bar' role='progressbar' aria-valuenow='30' aria-valuemin='0' aria-valuemax='100' style='width:30%'>
                                            </div>
                                        </div>
								    	<label>Terkumpul 30% dari 223</label><br><br>
								    	<label class='bold'>Durasi Project</label><br>
								    	<label>&nbsp;&nbsp;<i class='las la-calendar' style='font-size: 20px;'></i> Mulai</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								    	<label><i class='las la-calendar-check' style='font-size: 20px;'></i> Selesai</label><br>
								    	<label>".date("d M Y", strtotime($item->tgl_mulai))."</label>&nbsp;&nbsp;&nbsp;
								    	<label>".date("d M Y", strtotime($item->tgl_selesai))."</label>
								    </td>
								    <td class='text-right'>
								    	<label class='mb-1'>Jumlah Dana : </label><br>
								    	<label class='mb-1'>Harga Per Lembar : </label><br>
								    	<label class='mb-1'>Total Per Lembar : </label><br>
								    	<label class='mb-1'>ROI : </label><br>
								    	<label class='mb-1'>Periode Dividen : </label>
								    </td>
								    <td class='text-right'>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->jumlah_dana, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->harga_per_lembar, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->total_per_lembar, true)."</label><br>
								    	<label class='bold mb-1'>".$this->foglobal->persen($item->roi)."%</label><br>
								    	<label class='bold mb-1'></label><br>
								    </td>
								</tr>";
					array_push($array_id, $item->id);
				}
			} else {
				// $rHtml = "<tr><td colspan='5' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning'>No data</span></td></tr>";
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging, "array_id" => $array_id];
            return json_encode($ReturnData);
		}*/

		public function DropdownBank($param) {
			$rHtml ="";
			$query = $this->GetBank($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->kode.'">'.$item->nama.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">No data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}
	}

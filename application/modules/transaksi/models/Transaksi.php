<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Transaksi extends CI_Model {

		public function __construct() {
			$this->load->library("email");
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	    }

	    public function GetTransaksi($param, $disable_page=false){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
            // START SEARCH & FILTER
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama_properti LIKE '%".$param["Search"]."%' OR
					alamat_properti LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
    		$this->db->where("status_delete", 0);
    		$this->db->where("status_verifikasi", 1);
        	$this->db->where("id_pemodal", $this->user->id);
			if(isset($param["filter"]["jenis"]) and $param["filter"]["jenis"] != "") {
            	$this->db->where("jenis", $param["filter"]["jenis"]);
            	$this->db->group_by("id_properti");
			}
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
				$return_data["data"] = $this->db->get("v_transaksi")->result();
			} else {
				$return_data["data"] = $this->db->get("v_transaksi")->result();
	            // START SEARCH & FILTER 
				if(!empty($param["Search"])) {
					$this->db->where("(
						nama_properti LIKE '%".$param["Search"]."%' OR
						alamat_properti LIKE '%".$param["Search"]."%')"
					, NULL, FALSE);
				}
	    		$this->db->where("status_delete", 0);
	    		$this->db->where("status_verifikasi", 1);
	        	$this->db->where("id_pemodal", $this->user->id);
				if(isset($param["filter"]["jenis"]) and $param["filter"]["jenis"] != "") {
	            	$this->db->where("jenis", $param["filter"]["jenis"]);
            		$this->db->group_by("id_properti");
				}
				if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
					$this->db->where_not_in("id", $param["filter"]["array_id"]);
				}
	            // END SEARCH & FILTER
	            $return_data["paging"]["Count"] = count($return_data["data"]);
	            $return_data["paging"]["DataDari"] = ($args["Limit"]*$args["Page"])-$args["Limit"]+1;
	            $return_data["paging"]["DataSampai"] = $return_data["paging"]["DataDari"]+$return_data["paging"]["Count"]-1;
	            $return_data["paging"]["HalKe"] = $args["Page"];
	            $return_data["paging"]["Total"] = $this->db->get("v_transaksi")->num_rows();
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
			if(!empty($param["Search"])) {
				$this->db->where("(
					nama_properti LIKE '%".$param["Search"]."%' OR
					alamat_properti LIKE '%".$param["Search"]."%')"
				, NULL, FALSE);
			}
    		$this->db->where("status_delete", 0);
    		$this->db->where("status_verifikasi", 1);
        	$this->db->where("id_pemodal", $this->user->id);
			if(isset($param["filter"]["jenis"]) and $param["filter"]["jenis"] != "") {
            	$this->db->where("jenis", $param["filter"]["jenis"]);
			}
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				$this->db->where_not_in("id", $param["filter"]["array_id"]);
			}
        	$return_data["data_next"] = $this->db->get("v_transaksi")->result();
		    return $return_data;
		}
		
		public function HtmlTransaksi($param){
		    $rHtml ="";
			$query = $this->GetTransaksi($param);
			$array_id = array();
			if(isset($param["filter"]["array_id"]) and !empty($param["filter"]["array_id"])) {
				foreach ($param["filter"]["array_id"] as $item_id) {
					array_push($array_id, $item_id);
				}
			}
			if(isset($param["filter"]["jenis"]) and $param["filter"]["jenis"] != "") {
				if(!empty($query["data"])) {
					foreach ($query["data"] as $item) {
	                    $total_investasi = 0;
	                    $total_saham = 0;
						foreach ($query["data_next"] as $item_next) {
							if($item->id_properti == $item_next->id_properti){
								$total_investasi += $item_next->nominal;
	                    		$total_saham += $item_next->total_saham;
							}
						}
	                    $harga_per_saham = round($total_investasi/$total_saham);
	                    $keuntungan = ($harga_per_saham*$total_saham)-$total_investasi;

	                    $foto = json_decode($item->foto_properti);
	                    if(empty($foto)){
	                        $foto = "<img style='width: 100%; height:auto;' src='".base_url("/assets/images/default-placeholder.png")."'>";
	                    } else {
	                        $foto = "<img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$foto[0]."'>";
	                    }
	                    if($this->foglobal->SahamSaya($item->id_properti) != 0){
	                    	$Saham_Saya = $this->foglobal->SahamSaya($item->id_properti);
	                    	$Saham_Saya = $this->foglobal->rupiah($Saham_Saya); 
	                    }else{
	                    	$Saham_Saya = $this->foglobal->rupiah($total_saham);
	                    }
	                    $rHtml .= "<tr>
									    <td><a href='".base_url()."properti/detail.html?id=".$item->id_properti."'><center style='max-height: 130px; overflow: hidden;'>".$foto."</center></a></td>
									    <td>
									    	<label class='bold'><a href='".base_url()."properti/detail.html?id=".$item->id_properti."'>".$item->nama_properti."</a></label><br><br>
									    	<label>".$item->alamat_properti."</label>
									    	<br><br>
									    	<a href='".base_url()."properti/detail.html?id=".$item->id_properti."' class='btn btn-primary text-white'>Beli Lagi</a>
									    </td>
									    <td class='text-right'>
									    	<label class='mb-1'>Total Investasi : </label><br>
									    	<label class='mb-1'>Harga Saham : </label><br>
									    	<label class='mb-1'>Total Saham : </label><br>
									    	<label class='mb-1'>Tipe Aset : </label><br>
									    	<label class='mb-1'>Persentase Saham : </label><br>
									    	<label class='mb-1'>Periode Dividen : </label><br>
									    </td>
									    <td class='text-right'>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah($total_investasi, true)."</label><br>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah($harga_per_saham, true)."</label><br>
									    	<label class='bold mb-1'>".
									    	/*if(SahamSaya($item->id_properti) != 0  ){
									    		SahamSaya($item->id_properti)
									    	}else{
									    		$this->foglobal->rupiah($total_saham)	
									    	}*/
									    	$Saham_Saya
									    	//$this->foglobal->rupiah($total_saham)	
									    	//$this->foglobal->SahamSaya($item->id_properti)
									    	
									    	.
									    	"</label><br>
									    	<label class='bold mb-1'>".$item->tipe_aset."</label><br>
									    	<label class='bold mb-1'>".$item->lepas_saham."%</label><br>
									    	<label class='bold mb-1'>".$item->dividen_period."</label><br>
									    </td>
									</tr>";

									    	/*<a class='btn btn-outline-danger text-danger'>Jual</a>
									    	<label class='mb-1'>ROI : </label><br>
									    	<label class='mb-1'>Keuntungan : </label>
									    	<label class='bold mb-1'>".$item->roi."%</label><br>
									    	<label class='bold text-success mb-1'>".$this->foglobal->rupiah($keuntungan, true)."</label>*/
						array_push($array_id, $item->id);
					}
				} else {
					$rHtml = "<tr><td colspan='4' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning text-white p-3'>Tidak ada data</span></td></tr>";
				}
			} else {
				if(!empty($query["data"])) {
					foreach ($query["data"] as $item) {
	                    $foto = json_decode($item->foto_properti);
	                    if(empty($foto)){
	                        $foto = "<img style='width: 100%; height:auto;' src='".base_url("/assets/images/default-placeholder.png")."'>";
	                    } else {
	                        $foto = "<img style='width: 100%; height:auto;' src='".$this->config->item("cdn_url")."/".$foto[0]."'>";
	                    }
	                    $rHtml .= "<tr>
									    <td><a href='".base_url()."properti/detail.html?id=".$item->id_properti."'><center style='max-height: 130px; overflow: hidden;'>".$foto."</center></a></td>
									    <td>
									    	<label class='bold'><a href='".base_url()."properti/detail.html?id=".$item->id_properti."'>".$item->nama_properti."</a></label><br><br>
									    	<label>".$item->alamat_properti."</label><br>
									    	<label class='mt-1'>".$item->jenis." berhasil</label><br>
									    	<label class='mt-1'>".date("d M Y H:i", strtotime($item->tgl))."</label>
									    </td>
									    <td class='text-right'>
									    	<label class='mb-1'>Total Saham : </label><br>
									    	<label class='mb-1'>Harga Saham : </label><br>
									    	<label class='mb-1'>".$item->jenis." : </label><br>
									    	<label class='mb-1'>Biaya Administrasi : </label><br>
									    	<label class='mb-1'>Total Pembayaran : </label><br>
									    </td>
									    <td class='text-right'>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->total_saham)."</label><br>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah((int)($item->nominal/$item->total_saham), true)."</label><br>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->nominal, true)."</label><br>
									    	<label class='bold text-danger mb-1'>".$this->foglobal->rupiah($item->biaya_administrasi, true)."</label><br>
									    	<label class='bold mb-1'>".$this->foglobal->rupiah($item->total_transaksi, true)."</label><br>
									    </td>
									</tr>";
						array_push($array_id, $item->id);
					}
				} else {
					$rHtml = "<tr><td colspan='4' style='padding: 20px !important;' class='text-center'><span class='badge badge-pill badge-warning text-white p-3'>Tidak ada data</span></td></tr>";
				}
			}
			$Paging = (!empty($query["paging"])) ? $query["paging"] : "";
			$ReturnData = ["lsdt" => $rHtml, "paging" => $Paging, "array_id" => $array_id];
            return json_encode($ReturnData);
		}

		public function DropdownTransaksi($param) {
			$rHtml ="";
			$query = $this->GetTransaksi($param, true);
			if(!empty($query["data"])) {
				foreach ($query["data"] as $item) {
					 $rHtml .= '<option value="'.$item->id.'">'.$item->name_event.'</option>';
				}
			} else {
				$rHtml = '<option disabled value="">No data</option>';
			}
            $ReturnData = ["lsdt" => $rHtml];
            return json_encode($ReturnData);
		}

		public function InsertTransaksi($args) {
			$args["id_pemodal"] = $this->user->id;
			$args["jenis"] = "Pembelian";
			$args["tgl"] = date("Y-m-d H:i:s");
			$args["status_verifikasi"] = 1;
			$args["nominal"] = str_replace(".", "", $args["nominal"]);
			$args["biaya_administrasi"] = (int)$this->session->userdata("biaya_admin");			
			$query = $this->db->insert("tb_transaksi", $args);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			} else {
				$id_transaksi = $this->db->insert_id();

	        	$this->db->where("id", $args["id_properti"]);
	        	$GetProperti = $this->db->get("tb_properti")->result();
	        	$nama_properti = $GetProperti[0]->nama;

				$args_topup["id_transaksi"] = $id_transaksi;
				$args_topup["id_pemodal"] = $this->user->id;
				$args_topup["no_transaksi"] = "PMBL".substr(date("Y"), -2).date("md").rand(100000,999999);
				$args_topup["status"] = 1;
				$args_topup["keterangan"] = "Pembelian saham ".$nama_properti;
				$args_topup["created_at"] = date("Y-m-d H:i:s");
				$args_topup["nominal"] = str_replace(".", "", $args["nominal"])+$args["biaya_administrasi"];
				$args_topup["nominal"] = (int)$args_topup["nominal"]*-1;
				$this->db->insert("tb_topup", $args_topup);


	        	$this->db->where("id", $id_transaksi);
	        	$GetTransaksi = $this->db->get("v_transaksi")->result();
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
		        $this->email->to($this->user->email);
		        $this->email->subject("Obsido - Pembelian");
		        $this->email->message("
					<div style='background: #eaeaea; padding: 30px;'>
						<div style='background: #fff; padding: 15px;'>
							<img style='display: block; max-width: 150px; margin: 0px auto;' src='https://obsido.co.id/assets/images/logo.png'>
							<br>
							<label>
								Halo <b>".$this->user->nama."</b>,<br>
								Pembelian investasi properti kamu telah berhasil. Terima kasih telah mendanai <b>".$GetProperti[0]->nama."</b>, penerbit akan memberikan update setiap dana yang di pakai pada laman yang kamu danai
							</label><br><br>
							<label style='font-weight: bold;'>DETAIL PEMBELIAN</label>
							<hr>
							<table style='width: 100%;'>
								<tr>
									<td style='width: 150px; min-width: 150px;'>Nama Properti</td>
									<td>".$GetProperti[0]->nama."</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>".$GetProperti[0]->alamat."</td>
								</tr>
								<tr>
									<td>Durasi Proyek</td>
									<td>".date("d M Y", strtotime($GetProperti[0]->tgl_mulai))." - ".date("d M Y", strtotime($GetProperti[0]->tgl_selesai))."</td>
								</tr>
								<tr>
									<td>Harga Saham</td>
									<td>".$this->foglobal->rupiah($GetProperti[0]->harga_per_lembar, true)."</td>
								</tr>
								<tr>
									<td>Total Saham</td>
									<td>".$this->foglobal->rupiah($GetProperti[0]->total_per_lembar, true)."</td>
								</tr>
								<tr>
									<td>Periode Dividen</td>
									<td>".$GetProperti[0]->dividen_period."</td>
								</tr>
							</table>
							<br>
							<br>
							<label style='font-weight: bold;'>DETAIL TRANSAKSI</label>
							<hr>
							<table style='width: 100%;'>
								<tr>
									<td style='width: 150px; min-width: 150px;'>Nomor Transaksi</td>
									<td>".$GetTransaksi[0]->no_transaksi."</td>
								</tr>
								<tr>
									<td>Tanggal Transaksi</td>
									<td>".date("d M Y H:i", strtotime($GetTransaksi[0]->tgl))."</td>
								</tr>
								<tr>
									<td>Total Pembayaran</td>
									<td>".$this->foglobal->rupiah($GetTransaksi[0]->total_transaksi, true)."</td>
								</tr>
							</table>
							<br><br><br>
							<label>
								Kami tidak pernah meminta Anda untuk memberitahu kata sandi dan data pribadi Anda yang bersifat rahasia.
								<br>Jika Anda menerima email yang mencurigakan dengan tautan untuk memperbarui informasi akun Anda, jangan klik link tersebut.
								<br><br><br><hr><br>Jika kamu memiliki pertanyaan atau kendala, silakan hubungi 0823748294221 atau email ke support@obsiodo.id
							</label>
						</div>
					</div>
		        ");
		        $this->email->send();
			}
		   	return $query;
        }

        public function UpdateTransaksi($id_update, $param) {
			if($param["photo"] == ""){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = "Photo is required";
				return json_encode($return_data);
			}
         	$this->db->where("id", $id_update);
		    $query = $this->db->update("tb_transaksi", $param);
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }

        public function HapusTransaksi($id_update) {
		    $this->db->where("id", $id_update);
		    $query = $this->db->delete("tb_transaksi");
		    if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}

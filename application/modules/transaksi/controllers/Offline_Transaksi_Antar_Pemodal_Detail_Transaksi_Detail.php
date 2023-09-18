<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal_Detail_Transaksi_Detail extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}

	public function index($id,$set_harga_saham=0,$jual_beli="")
	{
		$data['getProperti'] =  $this->db->select('*')
			->where('status_projek','Tersedia')
			->where('id',$id)
			->get("tb_properti")->result();
		$data['set_harga_saham'] = $set_harga_saham;
		$data['jual_beli'] = $jual_beli;
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail_Transaksi_Detail",$data);
	}

	public function GetTb_Transaksi_Jual_Beli($id,$set_harga_saham=0,$jual_beli="")
	{
		
		if($set_harga_saham > 0 ){
			$data = $this->db->select("*")
			->select("tb_transaksi_jual_beli.id")
			->limit(20)
			->where("id_properti",$id)
			->where("harga_saham",$set_harga_saham)
			->where("keterangan",$jual_beli)
			->where("tb_transaksi_jual_beli.email !=",$this->session->userdata("user")->email)
			->join('tb_pemodal', 'tb_pemodal.email = tb_transaksi_jual_beli.email', 'left')			
			->order_by("create_date","asc")
			->get("tb_transaksi_jual_beli")
			->result();
		}else{
			$data = $this->db->select("*")
			->select("tb_transaksi_jual_beli.id")
			->limit(20)
			->where("id_properti",$id)
			->where("tb_transaksi_jual_beli.email !=",$this->session->userdata("user")->email)
			->join('tb_pemodal', 'tb_pemodal.email = tb_transaksi_jual_beli.email', 'left')			
			->order_by("create_date","asc")
			->get("tb_transaksi_jual_beli")
			->result();	
		}
		$dataTransaksi = [
			"dataTransaksi" => $data 
		];
		echo json_encode(["data" => $dataTransaksi]);
	}

	public function UpdateTransaksiJualBeli()
	{
		$id = $this->input->post("Id");
		$email = $this->session->userdata('user')->email; 
		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Match',convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email != '$email'");
		
		$result = [
			"id" => $id,
			"query" => $query 
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	
	public function UpdateOrder()
	{		
		$id = $this->input->post("idOrder");
		$email = $this->session->userdata('user')->email;
		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Match' where id = '$id'");
		
		$result = [
			"email" => $email,
			"id" => $id,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}

}
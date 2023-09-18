<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal_Detail_Histori extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}

	public function Detail($id)
	{
		$data['getProperti'] =  $this->db->select('*')
			->where('status_projek','Selesai')
			->where('id',$id)
			->get("tb_properti")->result();
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail_Histori",$data);
	}

	public function GetTb_Transaksi_Jual_Beli($id)
	{
		$data = $this->db->select("*")
			->limit(20)
			->where("id_properti",$id)
			->where("email",$this->session->userdata("user")->email)
			->order_by("create_date","desc")
			->get("tb_transaksi_jual_beli")
			->result();
		$dataTransaksi = [
			"dataTransaksi" => $data 
		];
		echo json_encode(["data" => $dataTransaksi]);
	}

	public function BatalTransaksi()
	{
		date_default_timezone_set('asia/jakarta');
		$date = date('Y-m-d H:i:s'); 
		$getData = $this->input->post('getData');
		extract($getData);	
		$update = "";
		$data1 = array(
			'id_properti' => $id_properti,
			'email' => $email,
			'lembar_saham' => $convert_lembar_saham,
			'harga_saham' => $harga_saham,
			'order_saham' => $order_saham,
			'status' => 'Di Batalkan',
			'keterangan' => $keterangan,
			'create_date' => $date,
			'modified_date' => $date,
			'convert_lembar_saham' => 0 
		);
		$data2 = array(
			'id_properti' => $id_properti,
			'email' => $email,
			'lembar_saham' => ($lembar_saham - $convert_lembar_saham) ,
			'harga_saham' => $harga_saham,
			'order_saham' => $order_saham,
			'status' => 'Berhasil',
			'keterangan' => $keterangan,
			'create_date' => $date,
			'modified_date' => $date,
			'convert_lembar_saham' => 0 
		);

		if($lembar_saham != $convert_lembar_saham and $lembar_saham > $convert_lembar_saham){
			$this->db->insert('tb_transaksi_jual_beli',$data1);
			$this->db->insert('tb_transaksi_jual_beli',$data2);
			$this->db->query("delete  from tb_transaksi_jual_beli where id= '$id'");
			$update = $id;
		}
		if($lembar_saham == $convert_lembar_saham){
			$this->db->query("update tb_transaksi_jual_beli set status ='Di Batalkan' where id= '$id'");
			$update = $id;
			$data1 ="";
			$data2="";
		}

		echo json_encode(
			["insert1" => $data1,"insert2"=> $data2,"updateId"=>$update]
		);
	}
	

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends MY_Controller {	
	
	public function get_Data()
	{
		if($this->session->userdata("user")){

		$username = $this->session->userdata("user");
		$email = $this->session->userdata("user")->email;
		if($email  == null)$email = "";
		$datas = $this->db->select('*')->where("email",$email)->order_by("create_date","Desc")->limit(90)->get('tb_notifikasi')->result();
		$totalNotifikasi = count($this->db->select('*')->where("status_dibaca","Belum Dibaca")->where("email",$email)->get('tb_notifikasi')->result());
		$countTableNotifikasi = count($datas);
		if($totalNotifikasi == 0)$totalNotifikasi = "";

		$data[] = [
		"countTableNotifikasi" => $countTableNotifikasi,
        "totalNotifikasi" => $totalNotifikasi,
        "datas" => $datas,
        "nama" => $username->email,
        "AllData" => $this->session->userdata("user")
    	];

        echo json_encode(["get_Datas" => $data]);	
		}
		
	}

	public function Save_Data_Saldo()
	{
		date_default_timezone_set('asia/jakarta');
		$create_date = date('Y-m-d H:i:s');
		$email = $this->session->userdata("user")->email;
		$data = array(
	        'nominal'		=> $this->input->post('nominal'),
	        'pembayaran'	=> $this->input->post('pembayaran'),
	        'status_dibaca' => "Belum Dibaca",
	        'create_date'	=> $create_date,
	        'email'			=> $email,
	        'remark'		=> "Isi Saldo" 
		);
        $this->db->insert('tb_notifikasi', $data);
	}

	public function SaveNotifikasiInvestasi()
	{
		date_default_timezone_set('asia/jakarta');
		$create_date = date('Y-m-d H:i:s');
		$email = $this->session->userdata("user")->email;
		$data = array(
	        'nominal'		=> $this->input->post('nominal'),
	        'pembayaran'	=> "",
	        'status_dibaca' => "Belum Dibaca",
	        'create_date'	=> $create_date,
	        'email'			=> $email,
	        'remark'		=> "Total Pembayaran" 
		);
        $this->db->insert('tb_notifikasi', $data);
	}
	
	public function update_status_dibaca($id)
	{
		$email = $this->session->userdata("user")->email;
		$this->db->query("update tb_notifikasi set status_dibaca = 'Sudah Dibaca' where id='$id' and email='$email'");
		$getLink = $this->db->select("link")->get("tb_notifikasi")->result();
		foreach ($getLink as $value) {
			$link = $value->link;
		}
		redirect($link);
	}
	public function iconNotifUpdate()
	{
		$email = $this->session->userdata("user")->email;
		$this->db->query("update tb_notifikasi set status_dibaca = 'Sudah Dibaca' and email='$email'");
		echo json_encode(["get_Datas" => "Update Proses Success Notifikasi.php line 73"]);	
	}

}

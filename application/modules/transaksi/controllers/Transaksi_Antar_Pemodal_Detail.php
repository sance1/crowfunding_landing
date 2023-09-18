<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal_Detail extends MY_Controller
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
		$this->load->view("transaksi/Transaksi_Antar_Pemodal_Detail",$data);
	}
	public function HargaWajar($id){
		/*$getSumHargaSaham = $this->db->select_sum('harga_saham')		
		->where('keterangan','beli')		
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result();

		$getCountHargaSaham = count($this->db->select('*')		
		->where('keterangan','beli')		
		->where('id_properti',$id)
		->get('v_transaksi_beli')->result());
		*/
		$defaulHarga =  $this->db->select('*')
		->where('id',$id)
		->get('tb_properti')->result();

		$dataTransaksi = [
			/*"harga_per_lembar" =>$getSumHargaSaham,
			"lembar_saham_beli" => $getCountHargaSaham,*/
			
			"defaulHarga" => $defaulHarga 
		];
		echo json_encode(["getHargaWajar" => $dataTransaksi]);

	}
	public function GetTransaksiBeli($id)
	{
		/*$getData = $this->db->query("select count('lembar_saham') as lembar_saham,jumlah_saham,harga_saham from v_transaksi_beli where keterangan = 'beli' group by id_properti ")->result();*/
		$email = $this->session->userdata('user')->email;
		$getData = $this->db->select_sum('order_saham')
		->select_sum('convert_lembar_saham')
		->select('harga_saham')
		//->where('status !=','Berhasil')
		->where('status !=','Di Batalkan')
		->where('convert_lembar_saham !=',0)
		//->where('email !=',$email)
		->where('keterangan','beli')
		->where('id_properti',$id)
		->group_by('harga_saham')
		->order_by('harga_saham','desc')
		->get('v_transaksi_beli')->result();

		
		$data = [
			"dataBeli" => $getData,		
		];
		echo json_encode(["getDataBeli" => $data]);
	}

	public function GetVTransaksiJual($id)
	{
		/*$getData = $this->db->query("select count('lembar_saham') as lembar_saham,jumlah_saham,harga_saham from v_transaksi_beli where keterangan = 'beli' group by id_properti ")->result();*/
		$email = $this->session->userdata('user')->email;
		$getData = $this->db->select_sum('order_saham')
		->select_sum('convert_lembar_saham')
		->select('harga_saham')
		//->where('status !=','Berhasil')
		->where('status !=','Di Batalkan')
		->where('convert_lembar_saham !=',0)
		//->where('email !=',$email)
		->where('id_properti',$id)
		->where('keterangan','jual')

		->group_by('harga_saham')
		->order_by('harga_saham','asc')
		->get('v_transaksi_jual')->result();
		$data = [
			"dataJual" => $getData
		];
		echo json_encode(["getDataJual" => $data]);
	}

	public function AddTransaksiJualBeli_beli()
	{
		date_default_timezone_set('asia/jakarta');
		$id =  $this->input->post('id');		
		$lembarSaham =  $this->input->post('lembarSaham');		
		$keterangan =  $this->input->post('keterangan');
		$hargaSaham =  $this->input->post('hargaSaham');

		$data = array(
			'id_properti' => $id,
			'email'=> $this->session->userdata("user")->email, 
			'lembar_saham' => $lembarSaham,
			'harga_saham' => $hargaSaham, 
			'order_saham' => 1, 
			'status' => "Sedang Berlangsung", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s'),
			'convert_lembar_saham' => $lembarSaham

		);		
		
		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		$insert_id = $this->db->insert_id();
		echo json_encode(["insertIdLastBeli" => $insert_id]);
	}
	/*public function ConvertBuy()
	{
		$email = $this->session->userdata('user')->email;
		$jual = $this->db->select('*')
		->select("id")
		->select("convert_lembar_saham")
		->where('keterangan','jual')
		->where('status !=','Berhasil')
		->where('convert_lembar_saham !=',0)
		->where('email !=',$email)
		->order_by("create_date","asc")	
		->get('v_transaksi_jual')
		->result();

		$result = [
			"jual" => $jual			
		];
		echo json_encode(["ConvertBuy" => $result]);
	}*/
	//Waktu Press Beli dan update tb jual(status)
	public function UpdateJual()
	{
		$email = $this->session->userdata('user')->email;
		$id = $this->input->post("Id");
		$convert_lembar_saham = $this->input->post("convert_lembar_saham");

		if($convert_lembar_saham <= 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Berhasil',convert_lembar_saham = '0' where id = '$id' and email != '$email'");
		}
		if($convert_lembar_saham > 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Sedang Berlangsung',convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email != '$email'");
		}
		$result = [
			"email" => $email,
			"id" => $id,
			"convert_lembar_saham" => $convert_lembar_saham
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	public function UpdateBeliLastId()
	{
		$insertIdLastBeli = $this->input->post("insertIdLastBeli");
		$lembarSaham = $this->input->post("lembarSaham");

		if($lembarSaham > 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Sedang Berlangsung',convert_lembar_saham = '$lembarSaham' where id = '$insertIdLastBeli'");
		}
		$result = [
			"lembarSaham" => $lembarSaham,
			"insertIdLastBeli" => $insertIdLastBeli,
			"message" => "update last id beli"
		];
		echo json_encode(["ConvertSell" => $result]);		
	}
	public function UpdateJualLastId()
	{
		$insertIdLastJual = $this->input->post("insertIdLastJual");
		$lembarSaham = $this->input->post("lembarSaham");

		if($lembarSaham > 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Sedang Berlangsung',convert_lembar_saham = '$lembarSaham' where id = '$insertIdLastJual'");
		}
		$result = [
			"lembarSaham" => $lembarSaham,
			"insertIdLastJual" => $insertIdLastJual,
			"message" => "update last id Jual"
		];
		echo json_encode(["ConvertSell" => $result]);		
	}
	public function MathConvertZero()
	{
		$insertIdLastJualBeli = $this->input->post("insertIdLastJualBeli");
		$lembarSaham = $this->input->post("lembarSaham");

		if($lembarSaham <= 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Berhasil',convert_lembar_saham = '0' where id = '$insertIdLastJualBeli'");
		}
		$result = [
			"lembarSaham" => $lembarSaham,
			"insertIdLastJualBeli" => $insertIdLastJualBeli,
			"message" => "Math Convert Zero"
		];
		echo json_encode(["Respon" => $result]);		
	}
	public function updateHargaPerLembarSecondary(){
		$id_properti = $this->input->post("id_properti");
		$hargaSaham = $this->input->post("hargaSaham");
		$this->db->query("update tb_properti set harga_per_lembar_secondary='$hargaSaham' where id='$id_properti'");
		$result = [
			"Message" => "update tb_properti set harga_per_lembar_secondary='$hargaSaham' where id='$id_properti'"
		];
		echo json_encode(["Respon" => $result]);
	}
	public function AddTransaksiJualBeli_jual()
	{
		date_default_timezone_set('asia/jakarta');
		$email = $this->session->userdata('user')->email;
		$id =  $this->input->post('id');		
		$lembarSahamJual =  $this->input->post('lembarSahamJual');		
		$keterangan =  $this->input->post('keterangan');
		$hargaSahamJual =  $this->input->post('hargaSahamJual');
		
		$data = array(
			'id_properti' => $id,
			'email'=> $this->session->userdata("user")->email, 
			'lembar_saham' => $lembarSahamJual,
			'harga_saham' => $hargaSahamJual, 
			'order_saham' => 1, 
			'status' => "Sedang Berlangsung", 
			'keterangan' => $keterangan,
			'create_date' => date('Y-m-d H:i:s'),
			'modified_date' => date('Y-m-d H:i:s'),
			'convert_lembar_saham' => $lembarSahamJual 
		);

		$result = $this->db->insert('tb_transaksi_jual_beli',$data);
		$insert_id = $this->db->insert_id();
		echo json_encode(["insertIdLastJual" => $insert_id]);
	}
	/*public function ConvertLembarSaham()
	{
		$result = [
			"beli" => $beli			
		];
		echo json_encode(["ConvertSell" => $result]);

	}*/
	public function SendNotifBuySell()
	{
		
	}
	public function ConvertSell($id_properti)
	{
		$email = $this->session->userdata('user')->email;
		$beli = $this->db->select('*')
		->select("id")
		->select("convert_lembar_saham")
		->where('keterangan','beli')
		//->where('status !=','Berhasil')
		->where('convert_lembar_saham !=',0)
		->where('id_properti',$id_properti)
		->where('email',$email)
		->order_by("harga_saham","asc")	
		->get('tb_transaksi_jual_beli')
		->result();

		/*$sumBeli = $this->db->select('*')
		->select_sum("convert_lembar_saham")
		->where('keterangan','beli')
		->where('status !=','Match')
		->where('convert_lembar_saham !=',0)
		->where('id_properti',$id_properti)
		->where('email',$email)
		->get('v_transaksi_beli')
		->result();*/

		$tbSaham = $this->db->select('*')
		->select("id")
		->select("convert_lembar_saham")
		->where('keterangan','beli')
	
		->where('convert_lembar_saham !=',0)
		->where('id_properti',$id_properti)
		->where('email',$email)
		->order_by("harga_saham","asc")	
		->get('tb_saham')
		->result();

		$result = [
			"beli" => $beli,
			"tbSaham" => $tbSaham
			/*"sumBeli" => $sumBeli*/			
		];
		echo json_encode(["ConvertSell" => $result]);
	}
	//waktu press jual dan update tb beli(status)
	/*public function UpdateBeli()
	{
		$email = $this->session->userdata('user')->email;
		$id = $this->input->post("Id");
		$convert_lembar_saham = $this->input->post("convert_lembar_saham");

		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Sedang Berlangsung',convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email = '$email'");
		if($convert_lembar_saham == 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Sedang Berlangsung' where id = '$id' and email = '$email'");
		}
		if($convert_lembar_saham != 0){
			$this->db->query("update tb_transaksi_jual_beli set status = 'Partial Match' where id = '$id' and email = '$email'");
		}
		$result = [
			"email" => $email,
			"id" => $id,
			"convert_lembar_saham" => $convert_lembar_saham,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}*/
	
	public function UpdateBeli2()
	{
		$email = $this->session->userdata('user')->email;
		$id = $this->input->post("Id");
		$convert_lembar_saham = $this->input->post("convert_lembar_saham");
		if($convert_lembar_saham == null){
			$convert_lembar_saham = $convert_lembar_saham;
		}

		$query = $this->db->query("update tb_saham set convert_lembar_saham = '$convert_lembar_saham' where id = '$id' and email = '$email'");
		if($convert_lembar_saham == 0){
			//$this->db->query("update tb_saham set status = 'Sedang Berlangsung' where id = '$id' and email = '$email'");
		}
		if($convert_lembar_saham != 0){
			//$this->db->query("update tb_saham set status = 'Partial Match' where id = '$id' and email = '$email'");
		}
		$result = [
			"email" => $email,
			"id" => $id,
			"convert_lembar_saham" => $convert_lembar_saham,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}

	/*saham saya*/
	public function totalInvestasiJual($id)
	{
		$email = $this->session->userdata('user')->email;

		$sumConvertLembarSahamTb_Saham = $this->db->select_sum('lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->where('keterangan','beli')
		->get('tb_saham')->result();

		$addSaham = $this->db->select_sum('lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->where('keterangan','beli')
		->get('tb_transaksi_jual_beli')->result();		
	
		$sumBeli = $this->db->select_sum('lembar_saham')
		->where('email',$email)
		->where('id_properti',$id)
		->where('keterangan','jual')
		->get('tb_transaksi_jual_beli')->result();

		$result = [			 
			"sumConvertLembarSahamTb_Saham" => $sumConvertLembarSahamTb_Saham,
			"addSaham" => $addSaham,
			"sumBeli" => $sumBeli
			
		];
		echo json_encode(["totalInvestasi" => $result]);
	}

	public function SendNotifSell($id)
	{
		$email = $this->session->userdata('user')->email;
		$tb_saham = $this->db->select('email')
					->distinct()
					->where('email !=',$email)
					->where('id_properti',$id)
					->where('keterangan','beli')
					->get('tb_saham')->result();
		/*$tb_transaksi_jual_beli = $this->db->select('email')
					->distinct()
					->where('email !=',$email)
					->where('keterangan','beli')
					->get('tb_transaksi_jual_beli')->result();*/

		$result = [
			"tb_saham" => $tb_saham
			//"tb_transaksi_jual_beli" => $tb_transaksi_jual_beli
		];
	    echo json_encode(["SendNotif" => $result]);
	}
	public function UpdateSendNotifSell()
	{
		date_default_timezone_set('asia/jakarta');
		$email = $this->session->userdata('user')->email;
		$toEmail = $this->input->post("toEmail");
		$idPemodal = $this->input->post("idPemodal");
		$create_date = date('Y-m-d H:i:s');
		$getNama = $this->db->query("select * from tb_pemodal where email = '$email'")->result();
		foreach ($getNama as $value) {
			$nama = $value->nama;
		}
		$remark = $nama." Melakukan Penjualan";
		//$this->db->query("insert into tb_notifikasi values('','',0,'$create_date','$toEmail','$remark')");
		date_default_timezone_set('asia/jakarta');
		$create_date = date('Y-m-d H:i:s');
		$email = $this->session->userdata("user")->email;
		$link = "/transaksi/Transaksi_Antar_Pemodal_Detail/Detail/".$idPemodal;
		$data = array(
	        'nominal'		=> "",
	        'pembayaran'	=> "",
	        'status_dibaca' => "Belum Dibaca",
	        'create_date'	=> $create_date,
	        'email'			=> $toEmail,
	        'remark'		=> $remark,
	        'type'			=> "TransaksiAntarPemodal",
	        'link'			=> $link	 
		);
        $result = $this->db->insert('tb_notifikasi', $data);
        echo json_encode(["SendNotif" => $result]);
	}
	/*public function UpdateConvertSell()
	{
		$email = $this->session->userdata('user')->email;
		$id_tb_transaksi_jual_beli = $this->input->post("Id");
		$this->db->query("update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy =  where id = '$id_tb_transaksi_jual_beli' and email == '$email'");
		$result = $this->db->query("select * from tb_transaksi_jual_beli where status = 'Match' and id = '$id_tb_transaksi_jual_beli' and email != '$email' ")->result();
		$result = count($result);
		if($result == 0){
			$result = "Update Failed";			
		}else{
			$result = "Update Success";
		}

		echo json_encode(["UpdateConvertBuySell" => $result]);			
	}*/

	/*modal*/
	public function GetTb_Transaksi_Jual_Beli()
	{
		$id = $this->input->post('id');
		$set_harga_saham = $this->input->post('harga');
		$jual_beli = $this->input->post('jual_beli');
		if($set_harga_saham > 0 ){
			$data = $this->db->select("*")
			->select("tb_transaksi_jual_beli.id")
			->limit(20)
			->where("id_properti",$id)
			->where("harga_saham",$set_harga_saham)
			->where("keterangan",$jual_beli)
			->where("status !=","Berhasil")
			->where("tb_transaksi_jual_beli.email !=",$this->session->userdata("user")->email)
			->join('tb_pemodal', 'tb_pemodal.email = tb_transaksi_jual_beli.email', 'left')			
			->order_by("create_date","asc")
			->get("tb_transaksi_jual_beli")
			->result();
		}
		/*else{
			$data = $this->db->select("*")
			->select("Tb_Transaksi_Jual_Beli.id")
			->limit(20)
			->where("id_properti",$id)
			->where("Tb_Transaksi_Jual_Beli.email !=",$this->session->userdata("user")->email)
			->join('tb_pemodal', 'tb_pemodal.email = Tb_Transaksi_Jual_Beli.email', 'left')			
			->order_by("create_date","asc")
			->get("Tb_Transaksi_Jual_Beli")
			->result();	
		}*/
		$dataTransaksi = [
			"dataTransaksi" => $data 
		];
		echo json_encode(["data" => $dataTransaksi]);
	}
	/*modal*/
	public function UpdateOrder()
	{		
		$id = $this->input->post("idOrder");
		$email = $this->session->userdata('user')->email;
		$query = $this->db->query("update tb_transaksi_jual_beli set status = 'Berhasil' where id = '$id'");
		
		$result = [
			"email" => $email,
			"id" => $id,
			"query" => $query
		];
		echo json_encode(["ConvertSell" => $result]);
	}

	public function GetTb_Transaksi_jual_Beli_where_Jual()
	{
		$id_properti = $this->input->post("id");	
		$hargaSaham = $this->input->post("hargaSaham");
		$email = $this->session->userdata('user')->email;

		$data = $this->db->select('*')		
		->where('keterangan','jual')
		->where('harga_saham <=',$hargaSaham)	
		->where('convert_lembar_saham !=',0)
		->where('id_properti',$id_properti)
		->where('status !=' ,'Di Batalkan')
		->where('email !=',$email)
		->order_by("harga_saham","asc")	
		->order_by("create_date","asc")
		->get('tb_transaksi_jual_beli')
		->result();

		$result = [
			"data" => $data			
		];
		echo json_encode(["WhereJual" => $result]);
	}

	public function GetTb_Transaksi_jual_Beli_where_Beli()
	{
		$id_properti = $this->input->post("id");	
		$hargaSaham = $this->input->post("hargaSaham");
		$email = $this->session->userdata('user')->email;

		$data = $this->db->select('*')		
		->where('keterangan','beli')
		->where('harga_saham >=',$hargaSaham)	
		->where('convert_lembar_saham !=',0)
		->where('status !=' ,'Di Batalkan')
		->where('id_properti',$id_properti)
		->where('email !=',$email)
		->order_by("harga_saham","asc")	
		->order_by("create_date","asc")
		->get('tb_transaksi_jual_beli')
		->result();

		$result = [
			"data" => $data			
		];
		echo json_encode(["WhereBeli" => $result]);
	}

	public function CekConvert()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("select * from tb_transaksi_jual_beli where id='$id'")->result();
		foreach ($data as $value) {
			if($value->convert_lembar_saham == 0){
				$this->db->query("update tb_transaksi_jual_beli set status = 'Berhasil'");
			}
		}
		echo json_encode(["WhereBeli" => $data]);
	}

}
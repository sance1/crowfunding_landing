<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Antar_Pemodal extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}

	public function index()
	{
		$data["properti"] = $this->db->select('*')		
		->limit(1000)->where('status_projek','Selesai')
		->get("tb_properti")->result();
		$this->load->view("transaksi/Transaksi_Antar_Pemodal",$data);
	}

	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {	
	function __construct()
    {
        parent::__construct();
        $this->load->model("properti/properti");
    }


	public function index()
	{
		$this->load->view('Test');
	}

	public function Simpan_OK()
	{
		$data = array(
	        'nominal' => $this->input->post('nominal'),
	        'pembayaran'	=>$this->input->post('pembayaran')
		);
        $this->db->insert('tb_notifikasi', $data);

	}

}

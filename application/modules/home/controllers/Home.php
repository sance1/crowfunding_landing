<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
        $this->load->model("properti/properti");
	}
	public function index()
	{
		$this->db->where("name", "Banner");
		$get_banner = $this->db->get("tb_setting")->result();
		$get_banner = json_decode($get_banner[0]->value);
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;

       //$GetProperti = $this->properti->GetProperti(["Limit" => 20, "Sort" => "created_at desc"]);
	   // change with created_at desc if you want update data automatically when prosesing update in verifikasi_proyek_edit.html

	    $GetProperti = $this->properti->GetProperti(["Limit" => 10, "Sort" => "id desc"]);
        $this->load->view("home/landing", array(
            "properti" => $GetProperti["data"],
            "banner" => $get_banner,
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
}
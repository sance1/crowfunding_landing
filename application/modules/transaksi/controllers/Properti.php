<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properti extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}
	public function index(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("properti/properti", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function detail(){
		$this->db->where("id", $_GET["id"]);
		$GetProperti = $this->db->get("tb_properti")->result();
     	$this->db->where("id", $_GET["id"]);
     	$param["total_view"] = (int)$GetProperti[0]->total_view + 1;
	    $this->db->update("tb_properti", $param);

		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("properti/detail", array(
            "properti" => $GetProperti[0],
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
}
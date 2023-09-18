<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->foglobal->CheckSessionLogin();
		if(empty($this->session->userdata("user"))) {
			redirect("home");
		} else {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
			$this->load->view("portofolio", array(
				"portofolio" => "active",
				"untuk_di_perhatikan" => $get_untuk_di_perhatikan
			));
		}
	}
	public function login(){
		if(!empty($this->session->userdata("user"))) {
            redirect("home");
        } else {
			$this->db->where("name", "Untuk di Perhatikan");
			$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
			$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
            $this->load->view("portofolio/portofolio", array(
	            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
	        ));
        }
	}
}
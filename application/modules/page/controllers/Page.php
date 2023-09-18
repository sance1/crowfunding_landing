<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->foglobal->CheckSessionLogin();
	}
	public function tentang_kami(){
		$this->db->where("name", "Tentang Kami");
		$GetContent = $this->db->get("tb_setting")->result();
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/page", array(
            "content" => $GetContent[0],
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function tim_obsido(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/tim_obsido", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function syarat_dan_ketentuan(){
		$this->db->where("name", "Syarat dan Ketentuan");
		$GetContent = $this->db->get("tb_setting")->result();
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/page", array(
            "content" => $GetContent[0],
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function kebijakan_dan_privasi(){
		$this->db->where("name", "Kebijakan dan Privasi");
		$GetContent = $this->db->get("tb_setting")->result();
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/page", array(
            "content" => $GetContent[0],
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function risiko(){
		$this->db->where("name", "Risiko");
		$GetContent = $this->db->get("tb_setting")->result();
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/page", array(
            "content" => $GetContent[0],
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function hubungi_kami(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/hubungi_kami", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function faq(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
        $this->load->view("page/faq", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan
        ));
	}
	public function daftar_penerbit(){
		$this->db->where("name", "Untuk di Perhatikan");
		$get_untuk_di_perhatikan = $this->db->get("tb_setting")->result();
		$get_untuk_di_perhatikan = $get_untuk_di_perhatikan[0]->value;
		$this->db->where("name", "Gambar Daftar Penerbit 1");
		$get_gambar_penerbit_1 = $this->db->get("tb_setting")->result();
		$get_gambar_penerbit_1 = $get_gambar_penerbit_1[0]->value;
		$this->db->where("name", "Gambar Daftar Penerbit 2");
		$get_gambar_penerbit_2 = $this->db->get("tb_setting")->result();
		$get_gambar_penerbit_2 = $get_gambar_penerbit_2[0]->value;
        $this->load->view("page/daftar_penerbit", array(
            "untuk_di_perhatikan" => $get_untuk_di_perhatikan,
            "gambar_penerbit_1" => $get_gambar_penerbit_1,
            "gambar_penerbit_2" => $get_gambar_penerbit_2
        ));
	}
}
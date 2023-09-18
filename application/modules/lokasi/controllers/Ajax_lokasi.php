<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_lokasi extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("lokasi/lokasi");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->lokasi->HtmlLokasi($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->lokasi->GetLokasi($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->lokasi->GetLokasi(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->lokasi->DropdownLokasi($this->req);
        return $Request;
    }
}

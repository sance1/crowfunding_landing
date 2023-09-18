<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_daftar_keinginan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("daftar_keinginan/daftar_keinginan");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->daftar_keinginan->HtmlDaftarKeinginan($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->daftar_keinginan->GetDaftarKeinginan($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->daftar_keinginan->GetDaftarKeinginan(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->daftar_keinginan->DropdownDaftarKeinginan($this->req);
        return $Request;
    }
}

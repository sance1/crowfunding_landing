<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_master_data_kota extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("master_data/master_data_kota");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->master_data_kota->HtmlKota($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->master_data_kota->GetKota(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->master_data_kota->DropdownKota($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->master_data_kota->InsertKota($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->master_data_kota->UpdateKota($id_update, $this->form);
        return $Request;
    }

    private function deletedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->master_data_kota->HapusKota($id_update);
        return $Request;
    }
}

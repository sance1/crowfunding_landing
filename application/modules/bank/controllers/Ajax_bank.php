<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_bank extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("bank/bank");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->bank->HtmlBank($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->bank->GetBank($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->bank->GetBank(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->bank->DropdownBank($this->req);
        return $Request;
    }
}

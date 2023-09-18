<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_properti extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("properti/properti");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->properti->HtmlProperti($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->properti->GetProperti($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->properti->GetProperti(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->properti->DropdownProperti($this->req);
        return $Request;
    }
}

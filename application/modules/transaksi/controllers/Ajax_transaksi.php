<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_transaksi extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("transaksi/transaksi");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function listdatahtml() {
        $Request = $this->transaksi->HtmlTransaksi($this->req);
        return $Request;
    }

    private function getdata() {
        $Request = $this->transaksi->GetTransaksi($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->transaksi->GetTransaksi(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function datadropdown() {
        $Request = $this->transaksi->DropdownTransaksi($this->req);
        return $Request;
    }

    private function insert_transaksi() {
        $Request = $this->transaksi->InsertTransaksi($this->form);
        return $Request;
    }
}

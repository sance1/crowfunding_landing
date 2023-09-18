<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_page extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("page/page");
    }
    public function index() {
        $act = $this->input->post("act");
        $form = $this->input->post("form");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        print_r($this->$act());
    }

    private function insert_hubungi_kami() {
        $Request = $this->page->InsertHubungiKami(json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
}

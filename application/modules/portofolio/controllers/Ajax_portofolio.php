<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_portofolio extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("portofolio/portofolio");
    }
    public function index() {
        $act = $this->input->post("act");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        $this->email = $this->input->post("email");
        print_r($this->$act());
    }

    private function login() {
        $Request = $this->portofolio->LoginProcess($this->form, "Login");
        return $Request;
    }
}

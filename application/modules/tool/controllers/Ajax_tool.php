<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_tool extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("tool/tool");
    }
    public function index() {
        if(!empty($this->session->userdata("user"))) {
            $act = $this->input->post("act");
            $form = $this->input->post("form");
            $this->req  = $this->input->post("req");
            $this->form = $this->input->post("form");
            print_r($this->$act());
        }
    }

    private function upload_file() {
        $Request = $this->tool->UploadFile($this->form);
        return $Request;
    }

    private function upload_file_name() {
        $Request = $this->tool->UploadFileName($this->form);
        return $Request;
    }
}

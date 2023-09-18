<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_penerbit extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("penerbit/penerbit");
    }
    public function index() {
        $act = $this->input->post("act");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        $this->capt = $this->input->post("captcha");
        $this->is_capt = $this->input->post("is_captcha");
        print_r($this->$act());
    }

    private function signup() {
        $Request = $this->penerbit->SignUpProcess($this->capt, json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
    private function verify_email() {
        $Request = $this->penerbit->VerifyEmailProcess($this->form);
        return $Request;
    }
    private function get_otp() {
        $Request = $this->penerbit->GetOTP();
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->penerbit->GetPenerbit(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function emptysession() {
        session_start(); 
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);
    }

    private function updatedata() {
        $id_update = $this->form["id"]; unset($this->form["id"]);
        $Request = $this->penerbit->UpdatePenerbit($id_update, json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pemodal extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("pemodal/pemodal");
    }
    public function index() {
        $act = $this->input->post("act");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        $this->capt = $this->input->post("captcha");
        $this->is_capt = $this->input->post("is_captcha");
        print_r($this->$act());
    }

    private function listdatahtml_topup() {
        $Request = $this->pemodal->HtmlTopup($this->req);
        return $Request;
    }
    private function simpan_reset_password() {
        $Request = $this->pemodal->SimpanResetPassword($this->form);
        return $Request;
    }
    private function insert_lupa_password() {
        $Request = $this->pemodal->InsertLinkResetPassword($this->form);
        return $Request;
    }
    private function login() {
        $Request = $this->pemodal->LoginProcess($this->capt, $this->form);
        return $Request;
    }
    private function signup() {
        $Request = $this->pemodal->SignUpProcess($this->capt, json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
    private function verify_email() {
        $Request = $this->pemodal->VerifyEmailProcess($this->form);
        return $Request;
    }
    private function topup() {
        $Request = $this->pemodal->TopUp($this->form);
        return $Request;
    }
    private function tarik_saldo() {
        $Request = $this->pemodal->TarikSaldo($this->form);
        return $Request;
    }
    private function submit_tarik_saldo() {
        $Request = $this->pemodal->SubmitTarikSaldo($this->form);
        return $Request;
    }
    private function insert_bookmark() {
        $Request = $this->pemodal->InsertBookmark($this->req);
        return $Request;
    }

    private function get_otp() {
        $Request = $this->pemodal->GetOTP();
        return $Request;
    }

    private function getdata() {
        $Request = $this->pemodal->GetPemodal($this->req);
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->pemodal->GetPemodal(["filter" => ["id" => $this->req]]);
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
        $Request = $this->pemodal->UpdatePemodal($id_update, json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }

    private function reset_pin() {
        $Request = $this->pemodal->ResetPIN(json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }

    private function verifikasi_otp() {
        $Request = $this->pemodal->VerifikasiOTP(json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
}

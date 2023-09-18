<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_user extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("user/user");
    }
    public function index() {
        $act = $this->input->post("act");
        $this->req  = $this->input->post("req");
        $this->form = $this->input->post("form");
        $this->email = $this->input->post("email");
        print_r($this->$act());
    }

    private function login() {
        $Request = $this->user->LoginProcess($this->form, "Login");
        return $Request;
    }
    private function verify_email() {
        $Request = $this->user->VerifyEmailProcess($this->form, $this->email);
        return $Request;
    }
    private function signup() {
        $Request = $this->user->SignUpProcess(json_decode(strip_tags(json_encode($this->form)), true));
        return $Request;
    }
    private function new_pin() {
        $Request = $this->user->NewPIN($this->req);
        return $Request;
    }
    private function reset_pin() {
        $Request = $this->user->ResetPIN($this->req);
        return $Request;
    }

    private function emptysession() {
        session_start(); 
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);
    }
}

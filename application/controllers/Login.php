<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller  {
    function __construct()
    {
        parent::__construct();
        $this->load->model("properti/properti");
    }

	public function index()
	{
        redirect("home");
	}

    public function login() {
        if(!empty($this->session->userdata("user"))) {
            redirect("home");
        } else {
            $this->load->view("user/login");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("");
    }

    public function session_token_expired() {
        $this->session->sess_destroy();
        $this->session->set_userdata("notifikasi", "<div class='alert alert-warning'><a role='button' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>Silahkan login dahulu untuk melanjutkan</div>");
        $this->load->view("user/login");
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_dashboard extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("dashboard/dashboard");
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
    
    private function total_data() {
        $Request = $this->dashboard->GetTotalData($this->req);
        return json_encode($Request);
    }

    private function aktifitas_bulanan() {
        $Request = $this->dashboard->GetAktifitasBulanan($this->req);
        return json_encode($Request);
    }
}

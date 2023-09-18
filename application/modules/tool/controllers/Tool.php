<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Tool extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("email");
      	$this->load->database();
	}
	public function send_email(){
		$this->db->where("status_sent", 0);
    	$this->db->order_by("created_at", "asc");
        $this->db->limit(3);
		$GetSendEmail = $this->db->get("tb_send_email")->result();
		if(!empty($GetSendEmail)) {
			foreach ($GetSendEmail as $item) {
				$config = [
				    'mailtype'  => 'html',
				    'charset'   => 'utf-8',
				    'protocol'  => 'smtp',
				    'smtp_host' => 'smtp.gmail.com',
				    'smtp_user' => $item->email_sender,
				    'smtp_pass'   => $item->password_sender,
				    'smtp_crypto' => 'tls',
				    'smtp_port'   => 587,
				    'crlf'    => "\r\n",
				    'newline' => "\r\n"
				];
				$this->email->initialize($config);
		        $this->email->from($item->email_sender, $item->name_sender);
		        $this->email->to($item->email_recipient);
		        $this->email->subject($item->subject);
		        $this->email->message($item->message);
		        if ($this->email->send()) {
					echo $item->email_sender." - ".$item->name_sender." - ".$item->subject." - ".$item->message." - ".$item->email_recipient." berhasil<br>";
					$param["status_sent"] = 1;
		         	$this->db->where("id", $item->id);
				    $this->db->update("tb_send_email", $param);
		        } else {
					echo $item->email_sender." - ".$item->name_sender." - ".$item->subject." - ".$item->message." - ".$item->email_recipient." gagal<br>";
		        }
			}
		}
	}

	public function check_properti(){
		$this->db->where("tgl_selesai <=", date("Y-m-d"));
		$this->db->where("status_projek", "Tersedia");
		$GetProperti = $this->db->get("tb_properti")->result();
		if(!empty($GetProperti)) {
			foreach ($GetProperti as $item) {
				$param["status_projek"] = "Selesai";
	         	$this->db->where("id", $item->id);
			    $this->db->update("tb_properti", $param);
			}
		}
	}
}
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Page extends CI_Model {

		public function __construct() {
			$this->load->library("email");
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	      	$this->user_login = $this->session->userdata("user_login");
	      	parent::__construct();
	    }

		public function InsertHubungiKami($args) {
			$args_send_email["email_sender"] = "mail@obsido.co.id";
			$args_send_email["password_sender"] = "Obsido2021";
			$args_send_email["name_sender"] = "Obsido";
			$args_send_email["subject"] = "Obsido - Hubungi Kami - ".$args["no_hp"];
			$args_send_email["message"] = "Nama : ".$args["nama"]."<br>
	        	Nomor Telepon : ".$args["no_hp"]."<br>
	        	Email : ".$args["email"]."<br><br>
	        	".$args["pesan"]."
	        ";
			$args_send_email["email_recipient"] = "chat@obsido.co.id";
			$args_send_email["status_sent"] = 0;
			$args_send_email["type"] = 1;
			$args_send_email["created_at"] = date("Y-m-d H:i:s");
			$args_send_email["updated_at"] = date("Y-m-d H:i:s");
			$query = $this->db->insert("tb_send_email", $args_send_email);
			if(!$query){
			   	$return_data["IsError"] = true;
				$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
				return json_encode($return_data);
			}
		   	return $query;
        }
	}

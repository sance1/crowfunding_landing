<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Facebook_login extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	    }

        public function LoginProcess($param) {
			$this->db->where("id_facebook", $param['id']);
			$get_user = $this->db->get("tb_pemodal")->result();
			if(!empty($get_user)) {
				$return_data = $param;
			} else {
				$args['from'] = "Facebook";
				$args['id_facebook'] = $param['id'];
				$args['email'] = $param['email'];
				$args['nama'] = $param['name'];
        		$query = $this->db->insert("tb_pemodal", $args);
				if(!$query){
				   	$return_data["IsError"] = true;
					$return_data["ErrorMessage"] = $this->db->conn_id->error_list;
					return json_encode($return_data);
				}
			}
			$this->db->where("id_facebook", $param['id']);
			$get_user = $this->db->get("tb_pemodal")->result();
			return $get_user;
		}
	}
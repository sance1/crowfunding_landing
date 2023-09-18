<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Tool extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	    }

        public function UploadFile($args) {
            $data = base64_decode($args["form"]["Base64"]);
            $name_file = date("Y.m.d_H.i.s.").uniqid().".".$args["form"]["Ext"];
            $file = __DIR__."/../../../../../crowfunding_cdn/cdn/".$name_file;
            $success = file_put_contents($file, $data);
            if($success){
                $return_data["Output"] = $name_file;
            } else {
                $return_data["IsError"] = true;
                $return_data["ErrorMessage"] = "File gagal disimpan";
            }
            return json_encode($return_data);
        }

		public function UploadFileName($args) {
		   	$data = base64_decode($args["form"]["Base64"]);
		   	$name_file = date("Y.m.d_H.i.s.").uniqid().".".$args["form"]["Ext"];
			$file = __DIR__."/../../../../../crowfunding_cdn/cdn/file_upload/";

            // Konfigurasi upload file 
            $targetDir = __DIR__."/|*|/|*|/|*|/|*|/|*|/crowfunding_cdn/cdn/file_upload/"; 
            $allowTypes = array('rar'); 
            $fileName = $args["form"]["NameFile"].".".$args["form"]["Ext"];
            $fileNamearray = explode('.', $fileName);
            $fileType = $fileNamearray[sizeof($fileNamearray) - 1];
            $fileNameFix = str_replace(".".$fileType, "", $fileName);
            $targetFileNameOnly = $targetDir.$fileNameFix;
            $targetFilePath = $targetDir.$fileName;
		   	if(file_exists(str_replace("|*|", "..", $targetFilePath))){
                $increment = 0;
                while(file_exists(str_replace("|*|", "..", $targetFilePath))) {
                    $increment++;
                    $targetFilePath = $targetFileNameOnly. $increment . '.' . $fileType;
                    $fileName = $fileNameFix. $increment . '.' . $fileType;
                }
                if(in_array($fileType, $allowTypes)){
                } else {
                    $success = file_put_contents($file.$fileName, $data);
                    if($success){
                        $return_data["Output"] = $fileName;
                    } else {
                        $return_data["IsError"] = true;
                        $return_data["ErrorMessage"] = "File gagal disimpan";
                    }
                    return json_encode($return_data);
                }
            } else {
                // memeriksa apakah tipe file valid 
                $fileType = pathinfo(str_replace("|*|", "..", $targetFilePath), PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){
                } else {
                    $success = file_put_contents($file.$fileName, $data);
                    if($success){
                        $return_data["Output"] = $fileName;
                    } else {
                        $return_data["IsError"] = true;
                        $return_data["ErrorMessage"] = "File gagal disimpan";
                    }
                    return json_encode($return_data);
                }
            }
        }
	}

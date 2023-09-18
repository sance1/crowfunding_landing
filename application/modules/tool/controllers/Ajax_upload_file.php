<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_upload_file extends MY_Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if(!empty($this->session->userdata("user"))) {
            $upload = ""; 
            if(!empty($_FILES['file'])){
                if($_FILES['file']['name'] == ""){
                    $upload = "";
                } else {
                    $upload = "err";
                }
                // Konfigurasi upload file 
                $targetDir = __DIR__."/|*|/|*|/|*|/|*|/|*|/crowfunding_cdn/cdn/file_upload/"; 
                $allowTypes = array('rar'); 
                
                $fileName = basename($_FILES['file']['name']);
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
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],str_replace("|*|", "..", $targetFilePath))){ 
                            $upload = str_replace("|*|", "..", $fileName); 
                        }
                    }
                } else {
                    // memeriksa apakah tipe file valid 
                    $fileType = pathinfo(str_replace("|*|", "..", $targetFilePath), PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){
                    } else {
                        if(move_uploaded_file($_FILES['file']['tmp_name'], str_replace("|*|", "..", $targetFilePath))){ 
                            $upload = $fileName; 
                        }
                    }
                }
            } 
            echo $upload;
        }
    }
}

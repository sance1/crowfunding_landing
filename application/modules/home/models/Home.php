<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	class Dashboard extends CI_Model {

		public function __construct() {
	      	parent::__construct();
	      	$this->load->database();
	      	$this->user = $this->session->userdata("user");
	    }

	    public function GetTotalData($param){
	    	if($this->db->table_exists("tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"])) {

		    } else {
		    	$this->load->dbforge();
		    	$tablename = "tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"];
		    	$fields = array(
			            'id' => array(
		                    'type' => 'INT',
		                    'constraint' => '11',
            				'auto_increment' => TRUE
			            ),
			            'id_admin' => array(
		                    'type' =>'INT',
		                    'constraint' => '11'
			            ),
			            'tgl' => array(
		                    'type' =>'DATETIME',
		                    'constraint' => '0'
			            ),
			            'keterangan' => array(
		                    'type' =>'TEXT',
		                    'constraint' => '0'
			            ),
			            'ip_address' => array(
		                    'type' =>'VARCHAR',
		                    'constraint' => '20',
                			'null' => TRUE,
			            ),

			    );
			    $this->dbforge->add_key('id', TRUE);
			    $this->dbforge->add_field($fields);
			    $this->dbforge->create_table($tablename);
			    $this->db->query("DROP VIEW IF EXISTS `v_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"]."`;");
			    $this->db->query("CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"]."` AS SELECT
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".id,
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".id_admin,
					tb_admin.nama AS nama_admin,
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".tgl,
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".keterangan,
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".ip_address
					FROM
					tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"]."
					LEFT JOIN tb_admin ON tb_aktifitas_admin_".$GLOBALS["tahun_ajaran_aktif"].".id_admin = tb_admin.id ;");
			}
			if($this->db->table_exists("tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"])) {

		    } else {
		    	$this->load->dbforge();
		    	$tablename = "tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"];
		    	$fields = array(
			            'id' => array(
		                    'type' => 'INT',
		                    'constraint' => '11',
            				'auto_increment' => TRUE
			            ),
			            'id_pengajar' => array(
		                    'type' =>'INT',
		                    'constraint' => '11'
			            ),
			            'id_kelas' => array(
		                    'type' =>'INT',
		                    'constraint' => '11'
			            ),
			            'tgl' => array(
		                    'type' =>'DATETIME',
		                    'constraint' => '0'
			            ),
			            'keterangan' => array(
		                    'type' =>'TEXT',
		                    'constraint' => '0'
			            ),
			            'ip_address' => array(
		                    'type' =>'VARCHAR',
		                    'constraint' => '20',
                			'null' => TRUE,
			            ),

			    );
			    $this->dbforge->add_key('id', TRUE);
			    $this->dbforge->add_field($fields);
			    $this->dbforge->create_table($tablename);
			    $this->db->query("DROP VIEW IF EXISTS `v_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"]."`;");
			    $this->db->query("CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"]."` AS SELECT
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".id,
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".id_pengajar,
					tb_pengajar.nama AS nama_pengajar,
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".id_kelas,
					tb_kelas.nama AS nama_kelas,
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".tgl,
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".keterangan,
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".ip_address
					FROM
					tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"]."
					LEFT JOIN tb_pengajar ON tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".id_pengajar = tb_pengajar.id
					LEFT JOIN tb_kelas ON tb_kelas.id = tb_aktifitas_pengajar_".$GLOBALS["tahun_ajaran_aktif"].".id_kelas;");
			}
			if($this->db->table_exists("tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"])) {

		    } else {
		    	$this->load->dbforge();
		    	$tablename = "tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"];
		    	$fields = array(
			            'id' => array(
		                    'type' => 'INT',
		                    'constraint' => '11',
            				'auto_increment' => TRUE
			            ),
			            'id_siswa' => array(
		                    'type' =>'INT',
		                    'constraint' => '11'
			            ),
			            'id_kelas' => array(
		                    'type' =>'INT',
		                    'constraint' => '11'
			            ),
			            'tgl' => array(
		                    'type' =>'DATETIME',
		                    'constraint' => '0'
			            ),
			            'keterangan' => array(
		                    'type' =>'TEXT',
		                    'constraint' => '0'
			            ),
			            'ip_address' => array(
		                    'type' =>'VARCHAR',
		                    'constraint' => '20',
                			'null' => TRUE,
			            ),

			    );
			    $this->dbforge->add_key('id', TRUE);
			    $this->dbforge->add_field($fields);
			    $this->dbforge->create_table($tablename);
			    $this->db->query("DROP VIEW IF EXISTS `v_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"]."`;");
			    $this->db->query("CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"]."` AS SELECT
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".id,
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".id_siswa,
					tb_siswa.nama AS nama_siswa,
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".id_kelas,
					tb_kelas.nama AS nama_kelas,
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".tgl,
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".keterangan,
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".ip_address
					FROM
					tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"]."
					LEFT JOIN tb_siswa ON tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".id_siswa = tb_siswa.id
					LEFT JOIN tb_kelas ON tb_kelas.id = tb_aktifitas_siswa_".$GLOBALS["tahun_ajaran_aktif"].".id_kelas;");
			}
			
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
			$return_data["data"] = $this->db->query("CALL sp_total_dashboard_pengajar(".$this->user->id.", ".$GLOBALS["tahun_ajaran_aktif"].")")->result();
		    return $return_data;
		}

		public function GetAktifitasBulanan($param){
			$args["search"] = "";
            $return_data["data"] = "";
            $return_data["paging"]["Count"] = "";
			$return_data["data"] = $this->db->query("CALL sp_aktifitas_pengajar(".$this->user->id.", ".$GLOBALS["tahun_ajaran_aktif"].")")->result();
		    return $return_data;
		}
	}

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	//Daftar Menu untuk roles
	$config["menu_list"] = [
		"Absensi" => array(
			"Dashboard", 
			"Absensi Kartu", 
			"Input Absensi", 
			"Laporan Absensi",
			"Kategori Absensi",
			"Mesin Absensi",
			"Pengaturan Absensi"
		),
		"Nilai" => array(
			"Dashboard",
			// "Tambah Nilai",
			"Daftar Nilai",
			"Laporan Nilai",
			"Kategori Nilai"
		),
		"Keuangan" => array(
			"Dashboard", 
			"Tagihan", 
			"Pembayaran", 
			"Tarif", 
			"Tarif Khusus",
			"Rekening Sekolah",
			"Kategori Tagihan"
		),
		"Kasus" => array(
			"Dashboard",
			// "Tambah Kasus",
			"Daftar Kasus",
			"Kategori Kasus"
		),
		"Pengumuman" => array(
			"Dashboard",
			// "Tambah Pengumuman",
			"Daftar Pengumuman",
			"Kategori Pengumuman"
		),
		"Berita" => array(
			"Dashboard",
			// "Tambah Berita",
			"Daftar Berita",
			"Kategori Berita"
		),/*
		"Chat" => array(),*/
		"Penerimaan Siswa Baru" => array(
			"Dashboard",
			"Periode Pendaftaran",
			"Pendaftaran Siswa Baru",
			"Pengaturan PSB",
		),
		"Master Data" => array(
			"Dashboard",
			"Siswa",
			"Kelas",
			"Mata Pelajaran"
		),
		"Administrator" => array(
			"Dashboard",
			"Karyawan",
			"Aktivitas Karyawan",
			"Pengaturan Hak Akses",
			"Pengaturan Profil Sekolah"
		)
	];

	$config["app_title"] = "| Back Office System - EzyPay";

	$config["kode_menu_list"] = [
		"Absensi" => array(
			"v1_1.1",// "Dashboard", 
			"v1_1.2",// "Absensi Kartu", 
			"v1_1.3",// "Input Absensi", 
			"v1_1.4",// "Laporan Absensi",
			"v1_1.5",// "Kategori Absensi",
			"v1_1.6",// "Mesin Absensi",
			"v1_1.7"// "Pengaturan Absensi"
		),
		"Nilai" => array(
			"v1_2.1",// "Dashboard",
			// "v1_2.2", "Tambah Nilai",
			"v1_2.2",// "Daftar Nilai",
			"v1_2.3",// "Laporan Nilai",
			"v1_2.4"// "Kategori Nilai"
		),
		"Keuangan" => array(
			"v1_3.1",// "Dashboard", 
			"v1_3.2",// "Tagihan", 
			"v1_3.3",// "Pembayaran", 
			"v1_3.4",// "Tarif", 
			"v1_3.5",// "Tarif Khusus",
			"v2_3.1",// "Rekening Sekolah",
			"v1_3.6"// "Kategori Tagihan"
		),
		"Kasus" => array(
			"v1_4.1",// "Dashboard",
			// "v1_4.2", "Tambah Kasus",
			"v1_4.2",// "Daftar Kasus",
			"v1_4.3"// "Kategori Kasus"
		),
		"Pengumuman" => array(
			"v1_5.1",// "Dashboard",
			// "v1_5.2", "Tambah Pengumuman",
			"v1_5.2",// "Daftar Pengumuman",
			"v1_5.3"// "Kategori Pengumuman"
		),
		"Berita" => array(
			"v1_6.1",// "Dashboard",
			// "v1_6.2", "Tambah Berita",
			"v1_6.2",// "Daftar Berita",
			"v1_6.3"// "Kategori Berita"
		),/*
		"Chat" => array(),*/
		"Penerimaan Siswa Baru" => array(
			"v2_9.1",// "Dashboard",
			"v2_9.2",// "Periode Pendaftaran",
			"v2_9.3",// "Pendaftaran Siswa Baru"
			"v2_9.5",// "Pengaturan PSB"
		),
		"Master Data" => array(
			"v1_7.1",// "Dashboard",
			"v1_7.2",// "Siswa",
			"v1_7.3",// "Kelas",
			"v1_7.4"// "Mata Pelajaran",
		),
		"Administrator" => array(
			"v1_8.1",// "Dashboard",
			"v1_8.2",// "Karyawan",
			"v2_8.1",// "Aktivitas Karyawan",
			"v1_8.3",// "Pengaturan Hak Akses",
			"v1_8.4"// "Pengaturan Profil Sekolah"
		)
	];
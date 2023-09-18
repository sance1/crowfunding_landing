<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	function date_indo($date_format = 'l, j F Y | H:i', $timestamp = '', $suffix = '') {
	    if (trim ($timestamp) == '') {
	            $timestamp = time ();
	    }
	    $date_format = preg_replace ("/S/", "", $date_format);
	    $pattern = array (
	        'Mon','Tue','Wed','Thu','Fri','Sat','Sun',
	        'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday',
	        'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',
	        'January','February','March','April','June','July','August','September','October',
	        'November','December',
	    );
	    $replace = array ('Sen','Sel','Rab','Kam','Jum','Sab','Min',
	        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
	        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
	        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
	        'Oktober','November','Desember',
	    );
	    
	    if(ctype_digit($timestamp)) {
	    	$date = date($date_format, $timestamp);
	    	$date = str_replace($pattern, $replace, $date);
	    } else {
	    	$date = str_replace($replace, $pattern, $timestamp);
	    	//$date = str_replace("Ags", "Aug", $timestamp);
	    	$date = date($date_format, strtotime($date));
	    }
	    
	    $date = "{$date} {$suffix}";
	    return $date;
	} 

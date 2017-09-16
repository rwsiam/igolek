<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

function thisTimestamp(){
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	return $date;
}

function thisDay(){
	date_default_timezone_set('Asia/Jakarta');
	$day = date('d');
	return $day;
}

function thisMonth(){
	date_default_timezone_set('Asia/Jakarta');
	$month = date('m');
	return $month;
}

function thisYear(){
	date_default_timezone_set('Asia/Jakarta');
	$year = date('Y');
	return $year;
}

function thisDate(){
	date_default_timezone_set('Asia/Jakarta');
	$date = date('d/m/Y');
	return $date;
}

function thisTime(){
	date_default_timezone_set('Asia/Jakarta');
	$time = date('H:i:s');
	return $time;
}

function greeting(){
	date_default_timezone_set('Asia/Jakarta');
	$time = date('G');
	if ($time <= 10) {
		return "Selamat Pagi";
	}elseif($time <= 14){
		return "Selamat Siang";
	}elseif($time <= 18){
		return "Selamat Sore";
	}elseif($time <= 24){
		return "Selamat Malam";
	}
}

function readAbleDateTime($string){
	return $date = date('H:i d/m/Y', strtotime($string));
}

function readAbleDate($string){
	return $date = date('d/m/Y', strtotime($string));
}

function toMonthIna($monthNum){
	$month[1] = 'Januari';
	$month[2] = 'Februari';
	$month[3] = 'Maret';
	$month[4] = 'April';
	$month[5] = 'Mei';
	$month[6] = 'Juni';
	$month[7] = 'Juli';
	$month[8] = 'Agustus';
	$month[9] = 'September';
	$month[10] = 'Oktober';
	$month[11] = 'November';
	$month[12] = 'Desember';
	$month['01'] = 'Januari';
	$month['02'] = 'Februari';
	$month['03'] = 'Maret';
	$month['04'] = 'April';
	$month['05'] = 'Mei';
	$month['06'] = 'Juni';
	$month['07'] = 'Juli';
	$month['08'] = 'Agustus';
	$month['09'] = 'September';
	return $month[$monthNum];
}
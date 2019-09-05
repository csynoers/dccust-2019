<?php
	function tgl_amerika($tgl){
			$tanggal = getTanggal(substr($tgl,8,2));
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $bulan.' '.$tanggal.', '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "January";
						break;
					case 2:
						return "February";
						break;
					case 3:
						return "March";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "June";
						break;
					case 7:
						return "July";
						break;
					case 8:
						return "August";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "October";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "December";
						break;
				}
			}
			
	function getTanggal($bln){
				switch ($bln){
					case 1: 
						return "1st";
						break;
					case 2:
						return "2nd";
						break;
					case 3:
						return "3rd";
						break;
					case 4:
						return "4th";
						break;
					case 5:
						return "5th";
						break;
					case 6:
						return "6th";
						break;
					case 7:
						return "7th";
						break;
					case 8:
						return "8th";
						break;
					case 9:
						return "9th";
						break;
					case 10:
						return "10th";
						break;
					case 11:
						return "11th";
						break;
					case 12:
						return "12th";
						break;
					case 13:
						return "13th";
						break;
					case 14:
						return "14th";
						break;
					case 15:
						return "15th";
						break;
					case 16:
						return "16th";
						break;
					case 17:
						return "17th";
						break;
					case 18:
						return "18th";
						break;
					case 19:
						return "19th";
						break;
					case 20:
						return "20th";
						break;
					case 21:
						return "21st";
						break;
					case 22:
						return "22nd";
						break;
					case 22:
						return "23rd";
						break;
					case 22:
						return "24th";
						break;
					case 25:
						return "25th";
						break;
					case 26:
						return "26th";
						break;
					case 27:
						return "27th";
						break;
					case 28:
						return "28th";
						break;
					case 29:
						return "29th";
						break;
					case 30:
						return "30th";
						break;
					case 31:
						return "31st";
						break;
				}
			}
?>

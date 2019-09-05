<?php
// create model buku tamu
class Navbar extends dbHelper
{
	function __construct()
	{
		parent::__construct();
	}
	
	// get name of program study
	public function navbar_prodi(){
		$data= $this->get_select("SELECT id_prodi,prodi FROM prodi");
		return $data['data'];
	}
	// end get name of program study

}
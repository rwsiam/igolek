<?php
/**
* Auth Controller
*/
class Home extends Page_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTitle("Homepage");
		$this->load->model('Pengumuman', 'barang');
		$this->load->helper('dates');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = $this->barang->get_item_from_page(0, 8, 'tgl_pengumuman', 'ASC'); 
		$this->loadView('page/home', $data);
	}
}
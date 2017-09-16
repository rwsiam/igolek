<?php
/**
* profil controller
*/
class Profil extends Page_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTitle("Profil");
		$this->load->model('User', 'user');
		$this->load->model('Pengumuman', 'pengumuman');
	}

	public function index()
	{
		$username = $this->input->get('uid');
		$data['user'] = $this->user->select_by_id($username);
		$data['jumlah'] = $this->pengumuman->get_count_by_uid($username);
		$this->loadView('page/profil', $data);
	}

	public function edit_profile()
	{
		$this->__is_login('', 'user');
		$username = $this->session->username;
		$data['user'] = $this->user->select_by_id($username);
		$data['jumlah'] = $this->pengumuman->get_count_by_uid($username);
		$this->loadView('page/edit_profil', $data);
	}

	public function save_profil()
	{
		$profil = file_get_contents($_FILES['profil']['tmp_name']);
	}
}
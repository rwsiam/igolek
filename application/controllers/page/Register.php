<?php
/**
* Register Controller
*/
class Register extends Page_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->setTitle("Register");
		$this->load->model('Login', 'login');
		$this->load->model('User', 'user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$config_saving = array(
	        array(
	                'field' => 'username',
	                'label' => 'Username',
	                'rules' => 'trim|required|is_unique[m_login.username]',
	                'errors'=> array(
	                        'required' => 'Data tidak boleh kosong.',
	                        'is_unique' => 'Username sudah ada.',
	                ),
	        ),
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'trim|required|is_unique[m_login.email]',
	                'errors'=> array(
	                        'required' => 'Data tidak boleh kosong.',
	                        'is_unique' => 'Email sudah ada.',
	                ),
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'trim|required',
	                'errors'=> array(
	                        'required' => 'Data tidak boleh kosong.',
	                ),
	        ),
		);

		$this->form_validation->set_rules($config_saving);

		if ($this->form_validation->run()) {
			$data_recived = $this->input->post(array(
				'username',
				'email',
				'password',
				'repassword', 
				),
			    true
			);

			if ($data_recived['password']==$data_recived['repassword']) {
				$data = array(
					'username'	=> $data_recived['username'],
					'email'	  	=> $data_recived['email'],
					'password'	=> sha1($data_recived['password']),
					'level'		=> 0,
					'status'	=> 1,
				);
				$this->login->insert($data);
				$this->user->insert(array('username' => $data_recived['username']));
				redirect(site_url("?error="));
			}else{
				redirect(site_url("?error=1"));
			}
		}else{
			redirect(site_url("?error=2"));
		}

	}
}
<?php
/**
* Login Controller
*/
class Action_login extends Page_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTitle("Register");
		$this->load->model('Login', 'login');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'trim|required',
	                'errors'=> array(
	                        'required' => 'Data tidak boleh kosong.',
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

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$email 		= $this->input->post('email', true);
			$password 	= $this->input->post('password', true);

			$login = $this->auth($email, $password);

			if ($login['status']) {
				$login_data = array(
					'login' 	=> true ,
					'level' 	=> $login['data']->level == 1? 'admin':'user',
					'username'  => $login['data']->username,
					'email'		=> $login['data']->email,
					'nama_user' => $login['data']->nama_user,
					'kontak'	=> $login['data']->kontak_user,
					'profil'	=> site_url("images/generate/user/{$login['data']->username}"),
				);

				$this->session->set_userdata($login_data);
				switch ($login['data']->level) {
					case 0:
						redirect(site_url('?login=0'));
						break;
					case 1:
						//redirect to admin dashboard
						break;
					default:
						redirect(site_url('?login=1'));
						break;
				}
			}else{
				redirect(site_url('?login=1'));	
			}
		}else{
			redirect(site_url('?login=1'));
		}
	}

	private function auth($email, $password)
	{
		$data = $this->login->get_auth($email, $password);
		if (!empty($data)) {
			return array('status' => true , 'data' => $data);
		}else{
			return array('status' => false , 'data' => null);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}
}
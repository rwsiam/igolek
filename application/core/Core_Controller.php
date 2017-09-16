<?php
/**
* Core Controller
*/
class Core_Controller extends CI_Controller
{
	var $m_layout;
	public function __construct()
	{
		parent::__construct();
		$this->m_layout	= "template/master_layout";
	}

	public function __is_login($uri, $role){
		if ($this->session->login == true AND $this->session->level == $role) {
			//nothing todo
		}else{
			redirect(site_url($uri),'auto');
		}
	}
}

/**
* page controller
*/
class Page_Controller extends Core_Controller
{
	var $title;
	function __construct()
	{
		parent::__construct();
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	protected function loadContent($data = array())
	{
		return $this->load->view($this->m_layout, $data);
	}

	public function loadView($content, $data = null)
    {
        $params = array(
            'title'     => $this->title,
            'content'   => $content,
            'data'      => $data
        );
        return $this->loadContent($params);
    }
}
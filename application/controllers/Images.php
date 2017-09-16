<?php
/**
* image builder
*/
class Images extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('User', 'user');
		$this->load->model('Pengumuman', 'data_pengumuman');
	}

	public function generate($mode, $id, $pic = null)
	{
		header("Content-Type:image/jpg");
		switch ($mode) {
			case 'user':
				$blank_user_profil = file_get_contents('https://ssl.gstatic.com/accounts/ui/avatar_2x.png');
				$blob = $this->user->select_by_id($id)->foto_user;
				if (empty($blob)) {
					echo $blank_user_profil;
				}else{
					echo $blob;
				}	
				break;
			case 'data_single':
				$blank_images = file_get_contents('http://bulma.io/images/placeholders/1280x960.png');
				$some = $this->data_pengumuman->select_by_id($id);
				$blob1 = $some->foto_satu;
				$blob2 = $some->foto_dua;
				$blob3 = $some->foto_tiga;
				switch ($pic) {
					case 1:
						echo empty($blob1)?$blank_images:$blob1;	
						break;
					case 2:
						echo empty($blob2)?$blank_images:$blob2;	
						break;
					case 3:
						echo empty($blob3)?$blank_images:$blob3;	
						break;
					default:
						echo $blank_images;
						break;
				}

				break;
			default:
				echo $blank_images;
				break;
		}
	}
}
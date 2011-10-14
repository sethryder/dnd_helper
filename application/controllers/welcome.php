<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
        
        $this->template->set_type($this->tank_auth->get_user_type());
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
            $data['user_type']  = $this->tank_auth->get_user_type();
            $data['cid']        = $this->tank_auth->get_cid();
            
            
            print_r($data);
            
            $this->template->set('nav', 'character');
			$this->template->load('template', 'welcome', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
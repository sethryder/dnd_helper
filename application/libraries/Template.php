<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
        var $user_type;
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
        
        function set_type($user_type)
        {
            $this->user_type =  $user_type;
        }
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
 
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
            $this->set('user_type', $this->user_type);
            
            if($this->user_type == 1)
            {
                $this->set('nav_list', array('dm/character' => 'Overview', 'dm/characters' => 'Characters', 'dm/notes' => 'Notes'));
            }
            else
            {
                $this->set('nav_list', array('player/overview' => 'Overview', 'player/stats' => 'Stats', 'player/backback' => 'Backback', 'player/notes' => 'Notes'));
            }
            	
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
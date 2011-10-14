<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Player extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->template->set_type($this->tank_auth->get_user_type());
        $this->load->model('Player_model');
    }


    function index()
    {
        //Load our form helper.
        $this->load->helper('form');

        //Load our form validation library.
        $this->load->library('form_validation');
 
        //Check to see if our user is logged in.
        if (!$this->tank_auth->is_logged_in())
        {
            redirect('/auth/login/');
        }
        else
        {

            //Set some of our validations rules.
            $this->form_validation->set_rules('quick_hp', 'Hitpoints', 'numeric|xss_clean');
            $this->form_validation->set_rules('quick_exp', 'Experience', 'numeric|xss_clean');
            $this->form_validation->set_rules('quick_gold', 'Gold', 'numeric|xss_clean');

            //Get our character id and grab our information.
            $cid = $this->tank_auth->get_cid();
            $data['character'] = $this->Player_model->getCharacter($cid);

            if ($this->form_validation->run() == false)
            {
                $data['character'] = $this->Player_model->getCharacter($cid);

                $this->template->set('nav', 'overview');
                $this->template->load('mobile', 'mobile/overview', $data);
            } 
            else
            {
                //Update our information.
                $quick_hp = $this->input->post('quick_hp', true)+$data['character']['hitpoints'];
                $quick_exp = $this->input->post('quick_exp', true)+$data['character']['experience'];
                $quick_gold = $this->input->post('quick_gold', true)+$data['character']['gold'];
                
                //Update our information.
                $this->Player_model->updateQuick($cid, $quick_hp, $quick_exp, $quick_gold);
                
                //Get our new information. (Could do this without another query, but meh.)
                $data['character'] = $this->Player_model->getCharacter($cid);
                
                $this->template->set('nav', 'overview');
                $this->template->load('mobile', 'mobile/overview', $data);
            }
        }
    }
    
    function backpack()
    {
        //Load our form helper.
        $this->load->helper('form');

        //Load our form validation library.
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('item_name[]', 'Item Name', 'xss_clean');
        $this->form_validation->set_rules('item_count[]', 'Item Count', 'numeric|xss_clean');
 
        //Check to see if our user is logged in.
        if (!$this->tank_auth->is_logged_in())
        {
            redirect('/auth/login/');
        }
        else
        {
            $cid = $this->tank_auth->get_cid();
            
            if ($this->form_validation->run() == false)
            {
                $data['character'] = $this->Player_model->getCharacter($cid);
                $data['backpack'] = $this->Player_model->getBackpack($cid);
                $this->template->load('mobile', 'mobile/backpack', $data);  
            }
            else
            {
                if($this->input->post('type') == 'add')
                {
                    $item_name = $this->input->post('item_name');
                    $item_count = $this->input->post('item_count');
                    
                    $this->Player_model->addItem($cid, $item_name ,$item_count);
                    
                    $data['character'] = $this->Player_model->getCharacter($cid);
                    $data['backpack'] = $this->Player_model->getBackpack($cid);
                    
                    $this->template->load('mobile', 'mobile/backpack', $data);
                }
                else
                {
                    $item_names = $this->input->post('item_name');
                    $item_counts = $this->input->post('item_count');
                    $item_ids = $this->input->post('item_id');
                    
                    $i = 0;
                    foreach ($item_ids as $item_id) 
                    {
                        if ($item_counts[$i] == 0) 
                        {
                            $this->Player_model->removeItem($item_ids[$i]);
                        }
                        else
                        {
                            $this->Player_model->updateItem($item_ids[$i], $item_names[$i], $item_counts[$i]);
                        }
                        $i++;
                    }

                    $data['character'] = $this->Player_model->getCharacter($cid);
                    $data['backpack'] = $this->Player_model->getBackpack($cid);
                    
                    $this->template->load('mobile', 'mobile/backpack', $data);                   
                }
            }           
        }
    }

	function journal($action=NULL, $jid=NULL)
	{
        //Load our form helper.
        $this->load->helper('form');

        //Load our form validation library.
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('journal_entry', 'Journal', 'xss_clean');
        $this->form_validation->set_rules('item_count[]', 'Item Count', 'numeric|xss_clean');
 
        //Check to see if our user is logged in.
        if (!$this->tank_auth->is_logged_in())
        {
            redirect('/auth/login/');
        }
        else
		{
			$cid = $this->tank_auth->get_cid();	
				
			if ($this->form_validation->run() == false)
            {
                $data['character'] = $this->Player_model->getCharacter($cid);
                $data['backpack'] = $this->Player_model->getBackpack($cid);
                $this->template->load('mobile', 'mobile/journal', $data);  
            }	
		}
		
	}

    function overview()
    {


    }

}

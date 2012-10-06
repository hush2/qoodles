<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>
        
class MY_Controller extends CI_Controller
{  
    public function load_view($view, $data = array())
    {                
        $content = $this->load->view($view, $data, TRUE);
        $this->load->view('base', array('content' => $content));
    }

}

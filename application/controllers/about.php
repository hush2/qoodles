<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class About extends MY_Controller
{
    public function index()
    {
        $data['quotes']  = number_format($this->db->count_all('quotes'));
        $data['authors'] = number_format($this->db->count_all('authors'));
        $data['nats']    = number_format($this->db->count_all('nats') - 1); // skip empty
        $data['cats']    = number_format($this->db->count_all('cats') - 1);

        $this->load_view('about', $data);
     }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class About extends MY_Controller
{
    public function index()
    {
        $data = array(
            'quotes'  => number_format($this->db->count_all('quotes')),
            'authors' => number_format($this->db->count_all('authors')),
            'nats'    => number_format($this->db->count_all('nats')),
            'cats'    => number_format($this->db->count_all('cats')),
        );
        $this->load_view('about', $data);
     }
}

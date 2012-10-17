<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Main extends MY_Controller
{
    public function index()
    {
        // Get 1 random quote.
        $quote = $this->quote->find_random('average', 1);
        $data['quote'] = $quote[0];

        // Get 3 random short quotes for bottom of main page.
        $data['quote_short']  = $this->quote->find_random('short', 3);;

        // Get 5 authors who were born or died on the current date.
        $data['authors_born'] = $this->author->find_dob_md(date('F j'), 5);
        $data['authors_died'] = $this->author->find_dod_md(date('F j'), 5);

        $this->load_view('main', $data);
    }
}

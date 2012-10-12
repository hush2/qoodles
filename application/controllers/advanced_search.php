<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Advanced_Search extends MY_Controller
{
    public function index()
    {
        $this->load_view('advanced_search');
    }

    public function authors($start=0, $count=50)
    {
        if ($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->session->set_userdata($post);
        }
        else
        {
            $post = $this->session->userdata;
        }

        $authors         = $this->author->find_names($post, $start, $count);
        $total_authors   = $this->author->find_names($post);
        $data['pages']   = $this->pagination->create('/advanced_search/authors/',
                                $total_authors, $count, 3);
        $data['title']   = "Found " . number_format($total_authors) . ' author(s).';
        $data['authors'] = $authors;

        $this->load_view('result_authors', $data);
    }

    public function quotes($start=0, $count=50)
    {
        $data = array();

        if ($this->input->post('submit'))
        {
            $all   = trim($this->input->post('all'));
            $exact = trim($this->input->post('exact'));
            $any   = trim($this->input->post('any'));
            $none  = trim($this->input->post('none'));

            $this->session->set_userdata(array(
                                'all'   => $all,
                                'exact' => $exact,
                                'any'   => $any,
                                'none'  => $none,
            ));
        }
        else
        {
            $all   = $this->session->userdata('all');
            $exact = $this->session->userdata('exact');
            $any   = $this->session->userdata('any');
            $none  = $this->session->userdata('none');
        }

        $text = '';

        if (!empty($all))
        {
            $all = explode(' ', $all);
            foreach ($all as $word)
            {
                $text .= "+$word ";
            }
        }
        if (!empty($exact))
        {
            $text .= "\"$exact\" ";
        }
        if (!empty($any))
        {
            $text .= "$any ";
        }
        if (!empty($none))
        {
            $none = explode(' ', $none);
            foreach ($none as $word)
            {
                $text .= "-$word ";
            }
        }
        $text = trim($text);
        
        $data['quotes'] = $this->quote->find_quotes($text, $start, $count);
        $matches        = $this->quote->find_quotes_count($text);
        
        $match_text     = "<span class='word'>$text</span>";
        
        $data['title']  = $matches
                          ? "Found " . number_format($matches) . " matches for $match_text"
                          : ($text ? "No match found for $match_text" : 'Nothing to search');
                          
        $data['pages']  = $this->pagination->create(
                            '/advanced_search/quotes/', $matches, $count, 3);
        $data['text']   = $text;

        $this->load_view('result_quotes', $data);

    }
}

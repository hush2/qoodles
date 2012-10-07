<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Advanced_Search extends MY_Controller
{
    public function index()
    {
        $this->load_view('advanced_search');
    }

    public function authors($page = 0, $per_page = 100)
    {
        if ($this->input->post('submit'))
        {
            $post = $this->input->post();
            $this->session->set_userdata($post);
        } else {
            $post = $this->session->userdata;
        }

        $authors         = $this->author->find_names($post, $page, $per_page);
        $total_authors   = $this->author->find_names($post);
        $data['pages']   = $this->pagination->create('/advanced_search/authors/',
                                             $total_authors,
                                             $per_page,
                                             3);
        $data['title']   = "Found " . number_format($total_authors) . ' authors.';
        $data['authors'] = $authors;

        $this->load_view('result_authors', $data);
    }

    public function quotes($page = 0, $per_page = 50)
    {
        $data = array();

        if ($this->input->post('submit'))
        {
            $kw_all   = trim($this->input->post('kw_all'));
            $kw_exact = trim($this->input->post('kw_exact'));
            $kw_any   = trim($this->input->post('kw_any'));
            $kw_none  = trim($this->input->post('kw_none'));

            $this->session->set_userdata(array(
                                'kw_all'   => $kw_all,
                                'kw_exact' => $kw_exact,
                                'kw_any'   => $kw_any,
                                'kw_none'  => $kw_none,
            ));
        } else {
            $kw_all   = $this->session->userdata('kw_all');
            $kw_exact = $this->session->userdata('kw_exact');
            $kw_any   = $this->session->userdata('kw_any');
            $kw_none  = $this->session->userdata('kw_none');
        }

        $text = '';

        if (!empty($kw_all)) {
            $kw_all = explode(' ', $kw_all);
            foreach ($kw_all as $kw) {
                $text .= "+$kw ";
            }
        }
        if (!empty($kw_exact)) {
            $text .= "\"$kw_exact\" ";
        }
        if (!empty($kw_any)) {
            $text .= "$kw_any ";
        }
        if (!empty($kw_none)) {
            $kw_none = explode(' ', $kw_none);
            foreach ($kw_none as $kw) {
                $text .= "-$kw ";
            }
        }

        $data['quotes'] = $this->quote->find_quotes($text, $page, $per_page);
        $matches        = $this->quote->find_quotes_count($text);
        $match_text     = "<span class='word'>$text</span>";
        $data['title']  = $matches
                          ? "Found " . number_format($matches) . " matches for $match_text"
                          : "No match found for $match_text";
        $data['pages']  = $this->pagination->create("/advanced_search/quotes/",
                                           $matches,
                                           $per_page,
                                           3);
        $data['text']   = $text;

        $this->load_view('result_quotes', $data);

    }
}

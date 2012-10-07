<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Search extends MY_Controller
{
    public function authors($group='A', $page=0, $per_page=160)
    {
        $data['pages'] = $this->pagination->create(
                                '/search/authors/' . $group,
                                $this->author->find_group_count($group),
                                $per_page);

        $authors = $this->author->find_group($group, $page, $per_page);

        $data['authors'] = $this->pagination->partition($authors, 2);
        $data['group']   = $group;

        $this->load_view('authors', $data);
    }

    public function author($name = 'Buddha')
    {
        $quotes = $this->author->find_quotes(urldecode($name));

        if (empty($quotes)) {
            show_error("No quotes found for $name.");
        }

        $author = $quotes[0];

        $dob = '';
        if (!empty($author->dob_md)) {
           $dob = "$author->dob_md, ";
        }
        $dob .= "$author->dob_yr $author->dob_suf";

        $dod = '';
        if (!empty($author->dod_md)) {
           $dod = "$author->dod_md, ";
        }
        $dod .= "$author->dod_yr $author->dod_suf";

        $data['author'] = $author;
        $data['dob']    = trim($dob);
        $data['dod']    = trim($dod);
        $data['quotes'] = $quotes;

        $this->load_view('author', $data);
    }

    public function random($length = '', $count = 20)
    {
        $data['quotes'] = $this->quote->find_random($length, $count);
        $data['title']  = 'Random Quotes';

        $this->load_view('random', $data);
    }

    public function cats($cat = '')
    {
        $data['categories']  = $this->pagination->partition($this->category->find_all($cat), 4);
        $data['title'] = 'Professions';
        $this->load_view('cats', $data);
    }

    public function cat($cat = 'Actor', $page = 0, $per_page = 160)
    {
        $cat             = urldecode($cat);
        $authors         = $this->category->find_authors($cat, $page, $per_page);
        $data['pages']   = $this->pagination->create(
                                        '/search/cat/' . $cat,
                                        $this->category->find_authors_count($cat),
                                        $per_page);
        $data['authors'] = $this->pagination->partition($authors, 4);
        $data['title']   = $cat;

        $this->load_view('cat', $data);
    }

    public function nats()
    {
        //$nationalities = $this->nationality->find_all();
        //$data['nationalities'] = $this->pagination->partition($nationalities, 4);
        //$data['title'] = 'Nationalities';
        //$this->load_view('nats', $data);
        echo 'Ok';
    }

    public function nat($nat = '', $page = 0, $per_page = 160)
    {
        $nat = urldecode($nat);

        $authors         = $this->nationality->find_authors($nat, $page, $per_page);
        $data['authors'] = $this->pagination->partition($authors, 4);
        $data['pages']   = $this->pagination->create(
                                '/search/nat/'. $nat,
                                $this->nationality->find_authors_count($nat),
                                $per_page);
        $data['nat']     = $nat;
        $data['title']   = $nat;

        // Use cat since it's the same template.
        $this->load_view('cat', $data);
    }

    public function natcat($nat='~', $cat='~')
    {
        $nat = urldecode($nat);
        $cat = urldecode($cat);

        if ($cat == '~') {
            return $this->nat($nat);
        }

        if ($nat == '~') {
            return $this->cat($cat);
        }

        $authors = $this->author->find_natcat($nat, $cat);

        $data['title'] = "$nat $cat";
        $data['authors'] = $this->pagination->partition($authors, 4);

        // Use cat since it's the same template.
        $this->load_view('cat', $data);

    }

    public function dob_yr($year = '1900')
    {
        $data['authors'] = $this->author->find_dob_yr($year);
        $data['title'] = "Born in $year";

        $this->load_view('dob_yr', $data);
    }

    // dob_md = Date of birth (Month Day)
    public function dob_md($md = '')
    {
        $md = $md ? urldecode($md) : date('F j');

        $data['authors'] = $this->author->find_dob_md($md);
        $data['title'] = "Born On $md";

        $this->load_view('dob_md', $data);
    }

    public function dod_yr($year = '1900')
    {
        $data['authors'] = $this->author->find_dod_yr($year);
        $data['title']   = "Died in $year";

        $this->load_view('dod_yr', $data);
    }

    public function dod_md($md = '')
    {
        $md = $md ? urldecode($md) : date('F j');

        $data['authors'] = $this->author->find_dod_md($md);
        $data['title']   = "Died On $md";

        $this->load_view('dod_md', $data);
    }
}

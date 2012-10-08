<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Search extends MY_Controller
{
    public function authors($group='A', $start=0, $count=100)
    {
        $data['pages'] = $this->pagination->create(
                                '/search/authors/' . $group,
                                $this->author->find_group_count($group),
                                $count);

        $authors = $this->author->find_group($group, $start, $count);

        $data['authors'] = $this->pagination->partition($authors, 2);
        $data['group']   = $group;

        $this->load_view('authors', $data);
    }

    public function author($name='Bruce Lee')
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

    public function random($length='average', $count=20)
    {
        $data['quotes'] = $this->quote->find_random($length, $count);
        $data['title']  = 'Random Quotes';
        $this->load_view('random', $data);
    }

    public function cats($cat='Actor')
    {
        $cats = $this->category->find_all($cat);
        $data['cats']  = $this->pagination->partition($cats, 4);
        $data['title'] = 'Professions';
        $this->load_view('cats', $data);
    }

    public function cat($cat='Actor', $start=0, $count=160)
    {
        $cat = urldecode($cat);
        $data['authors'] = $this->category->find_authors($cat, $start, $count);
        $data['pages']  = $this->pagination->create(
                                        "/search/cat/$cat",
                                        $this->category->find_authors_count($cat),
                                        $count);
        $data['title']  = $cat;
        $this->load_view('cat', $data);
    }

    public function nats()
    {
        $nationalities = $this->nationality->find_all();
        $data['nationalities'] = $this->pagination->partition($nationalities, 4);
        $data['title'] = 'Nationalities';
        $this->load_view('nats', $data);
    }

    public function nat($nat='Tibetan', $start=0, $count=100)
    {
        $nat = urldecode($nat);
        $data['authors'] = $this->nationality->find_authors($nat, $start, $count);
        $data['pages']   = $this->pagination->create(
                                '/search/nat/'. $nat,
                                $this->nationality->find_authors_count($nat),
                                $count);
        $data['nat']     = $nat;
        $data['title']   = $nat;
        $this->load_view('nat', $data);
    }

    public function natcat($nat='Tibetan', $cat='Leader', $start=0, $count=100)
    {
        $nat = urldecode($nat);
        $cat = urldecode($cat);
        $data['authors'] = $this->author->find_natcat($nat, $cat, $start, $count);
        $data['pages']   = $this->pagination->create(
                                "/search/natcat/$nat/$cat/",
                                $this->author->find_natcat_count($nat, $cat),
                                $count,
                                5);  // 5 = URI segments.
        $data['title'] = "$nat $cat";
        $this->load_view('natcat', $data);
    }

    public function dob_yr($year='1900')
    {
        $data['authors'] = $this->author->find_dob_yr($year);
        $data['title'] = "Born in $year";
        $this->load_view('dob_yr', $data);
    }

    // dob_md = Date of birth (Month Day)
    public function dob_md($md=null)
    {
        $md = $md ? urldecode($md) : date('F j');
        $data['authors'] = $this->author->find_dob_md($md);
        $data['title'] = "Born On $md";
        $this->load_view('dob_md', $data);
    }

    public function dod_yr($year='1945')
    {
        $data['authors'] = $this->author->find_dod_yr($year);
        $data['title'] = "Died in $year";
        $this->load_view('dod_yr', $data);
    }

    public function dod_md($md=null)
    {
        $md = $md ? urldecode($md) : date('F j');
        $data['authors'] = $this->author->find_dod_md($md);
        $data['title'] = "Died On $md";
        $this->load_view('dod_md', $data);
    }
}

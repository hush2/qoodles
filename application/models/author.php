<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Author extends CI_Model
{
    // Find all names from their last name initial.
    function find_group($ini, $start, $limit)
    {
        return $this->db->select('name, nat, cat')
                        ->from('authors')
                        ->join('nats', 'authors.nat_id = nats.id')
                        ->join('cats', 'authors.cat_id = cats.id')
                        ->where('ini', strtoupper($ini))
                        ->order_by('name')
                        ->limit($limit, $start)
                        ->get()
                        ->result();
    }

    // For pagination.
    function find_group_count($ini)
    {
        return $this->db->from('authors')
                        ->where('ini', strtoupper($ini))
                        ->count_all_results();
    }

    function find_quotes($name)
    {
        return $this->db->select('quote, name, cat, nat, dob_md, dob_yr, dob_suf, dod_md, dod_yr, dod_suf')
                        ->from('quotes')
                        ->join('authors', 'authors.id = quotes.author_id')
                        ->join('cats', 'authors.cat_id = cats.id')
                        ->join('nats', 'authors.nat_id = nats.id')
                        ->where('authors.name', $name)
                        ->get()
                        ->result();
    }

    function find_dob_md($md)
    {
        return $this->db->select('name, nat, cat, dob_yr')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('dob_md', $md)
                        ->order_by('dob_yr')
                        ->get()
                        ->result();
    }

    function find_dod_md($md)
    {
        return $this->db->select('name, nat, cat, dod_yr')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('dod_md', $md)
                        ->order_by('dod_yr')
                        ->get()
                        ->result();
    }

    function find_dob_yr($year)
    {
        // CI's AR adds wrong backtick on order_by.
        $this->db->_protect_identifiers = FALSE;

        return $this->db->select('name, nat, cat, dob_md')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('dob_yr', $year)
                        ->order_by("str_to_date(dob_md, '%M %E')")
                        ->get()->result();
    }

    function find_dod_yr($year)
    {
        $this->db->_protect_identifiers = FALSE;

        return $this->db->select('name, nat, cat, dod_md')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('dod_yr', $year)
                        ->order_by("str_to_date(dod_md, '%M %E')")
                        ->get()->result();
    }

    // Search for Nationality + Category (ex: American Musician)
    function find_natcat($nat, $cat, $start, $count)
    {
        return $this->db->select('name, nat, cat, dob_md, dob_yr, dob_suf, dod_md, dod_yr, dod_suf')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('nat', $nat)
                        ->where('cat', $cat)
                        ->limit($count, $start)
                        ->get()
                        ->result();
    }

    // For pagination.
    function find_natcat_count($nat, $cat)
    {
        return $this->db->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('nat', $nat)
                        ->where('cat', $cat)
                        ->count_all_results();
    }

    // This is called from Advanced Search.
    function find_names($kw, $start=0, $limit=0)
    {
        $this->db->select('name, ini, nat, cat, dob_md, dob_yr, dob_suf, dod_md, dod_yr, dod_suf')
                 ->from('authors')
                 ->join('nats', 'nats.id = authors.nat_id')
                 ->join('cats', 'cats.id = authors.cat_id');

        if (!empty($kw['name'])) {
            $kw_name = $this->db->escape("%{$kw['name']}%");
            $this->db->where("name LIKE $kw_name");
        }
        if (!empty($kw['nat'])) {
            $this->db->where('nat', $kw['nat']);
        }
        if (!empty($kw['cat'])) {
            $this->db->where('cat', $kw['cat']);
        }
        if (!empty($kw['dob_md'])) {
            $this->db->where('dob_md', $kw['dob_md']);
        }
        if (!empty($kw['dob_yr'])) {
            $this->db->where('dob_yr', $kw['dob_yr']);
        }
        if (!empty($kw['dod_md'])) {
            $this->db->where('dod_md', $kw['dod_md']);
        }
        if (!empty($kw['dod_yr'])) {
            $this->db->where('dod_yr', $kw['dod_yr']);
        }
        if ($start == 0 && $limit == 0) {
            return $this->db->count_all_results();
        }
        return $this->db->order_by('ini')
                        ->limit($limit, $start)
                        ->get()
                        ->result();
    }
}


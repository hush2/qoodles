<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Nationality extends CI_Model
{
    function find_nat($nat, $start, $limit)
    {
        return $this->db->select('nat')
                    ->from('nats')
                    ->where('nat', $nat)
                    ->order_by('nat')
                    ->limit($limit, $start)
                    ->get()
                    ->result();
    }

    // Return all Nationalities.
    public function find_all()
    {
        return $this->db->select('nat')
                    ->from('nats')
                    //->where('nat !=', '~')
                    ->order_by('nat')
                    ->get()
                    ->result();
    }

    public function find_authors($nat, $start, $limit)
    {
        return $this->db->select('name, ini, nat, cat, dob_md, dob_yr, dob_suf, dod_md, dod_yr, dod_suf')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('nats.nat', $nat)
                        ->order_by('name')
                        ->limit($limit, $start)
                        ->get()
                        ->result();

       //return $this->db->select('authors.name, authors.ini')
                   //->from('authors')
                   //->join('nats', 'authors.nat_id = nats.id')
                   //->where('nats.nat', $nat)
                   //->order_by('name')
                   //->limit($limit, $start)
                   //->get()
                   //->result();
    }

    // For pagination.
    public function find_authors_count($nat)
    {
        return $this->db->from('nats')
                        ->join('authors', 'authors.nat_id = nats.id')
                        ->where('nat', $nat)
                        ->count_all_results();
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Category extends CI_Model
{
    // Return all categories.
    public function find_all()
    {
        return $this->db->select('cat')
                    ->from('cats')
                    ->where('cat !=', '')  // Skip blank category
                    ->order_by('cat')
                    ->get()
                    ->result();
    }

    // Find authors from a certain Category (also called Profession in Navbar).
    public function find_authors($cat, $start, $limit)
    {
        return $this->db->select('name, nat, cat, dob_md, dob_yr, dob_suf, dod_md, dod_yr, dod_suf')
                        ->from('authors')
                        ->join('nats', 'nats.id = authors.nat_id')
                        ->join('cats', 'cats.id = authors.cat_id')
                        ->where('cats.cat', $cat)
                        ->order_by('name')
                        ->limit($limit, $start)
                        ->get()
                        ->result();
    }

    // For pagination.
    public function find_authors_count($cat)
    {
        return $this->db->from('cats')
                        ->join('authors', 'authors.cat_id = cats.id')
                        ->where('cat', $cat)
                        ->where('cat !=', '')
                        ->count_all_results();
    }

}

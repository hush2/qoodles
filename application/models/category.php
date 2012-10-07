<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Copyright (C) 2012 hush2 <hushywushy@gmail.com>

class Category extends CI_Model
{
    // Return all categories. Limit not needed since categories are few.
    public function find_all()
    {
        #$this->db->cache_on();
                
        return $this->db->select('cat')
                    ->from('cats')
                    //->where('cat !=', '~')
                    ->order_by('cat')
                    ->get()
                    ->result();
    }

    // Find authors from a certain Category (also called Profession in Navbar).
    public function find_authors($cat, $start, $limit)
    {
       return $this->db->select('authors.name')
                   ->from('authors')
                   ->join('cats', 'authors.cat_id = cats.id')
                   ->where('cats.cat', $cat)
                   ->order_by('name')
                   ->limit($limit, $start)
                   ->get()
                   ->result();
    }

    // For pagination.
    public function find_authors_count($cat)
    {
        #$this->db->cache_on();
        
        return $this->db->from('cats')
                        ->join('authors', 'authors.cat_id = cats.id')
                        ->where('cat', $cat)
                        ->count_all_results();
    }

}

<?php
// Copyright (C) 2012 hush2 <hushywushy@gmail.com>

class MY_Pagination extends CI_Pagination
{
    function create($url, $total_rows, $per_page, $uri_segment=4)
    {
        $this->initialize(array(
                'base_url'    => site_url($url),
                'total_rows'  => $total_rows,
                'per_page'    => $per_page,
                'num_links'   => 3,
                'uri_segment' => $uri_segment,
        ));
        return $this->create_links();
    }

    // http://php.net/manual/en/function.array-chunk.php
    function partition($list, $p)
    {
        $listlen = count($list);
        $partlen = floor($listlen / $p);
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice($list, $mark, $incr);
            $mark += $incr;
        }
        return $partition;
    }
}
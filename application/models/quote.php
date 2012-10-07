<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// (C) 2012 hush2 <hushywushy@gmail.com>

class Quote extends CI_Model
{   
    public function find_random($length, $count)
    {
        $where_length = "WHERE LENGTH(quote) ";

        switch ($length) {
            case 'short':
                $where_length .= '< 60';
                break;

            case 'average':
                $where_length .= 'BETWEEN 60 AND 120';
                break;

            case 'long':
                $where_length .= '> 120';
                break;

            default:
                $where_length = '';  
                break;
        }

        $count = (int) $count;
        if (($count > 30) || ($count < 1)) {
            $count = 14;
        }

        // This query is slow.
        $sql = "
SELECT quote, name, cat, nat
FROM (SELECT quote, author_id
FROM quotes
$where_length
ORDER BY rand()
LIMIT $count) AS quotes2
JOIN authors ON authors.id = quotes2.author_id
JOIN cats ON cats.id = authors.cat_id
JOIN nats ON nats.id = authors.nat_id";

        return $this->db->query($sql)->result();
    }

    // http://jan.kneschke.de/projects/mysql/order-by-rand/
    public function find_random_row()
    {
        $sql =
"SELECT quote, name, nat, cat
FROM quotes
JOIN (SELECT CEIL(RAND() * (SELECT MAX(id) FROM quotes)) AS id) AS r2
USING (id)
JOIN authors on authors.id = quotes.author_id
JOIN cats ON cats.id = authors.cat_id
JOIN nats ON nats.id = authors.nat_id";

        return $this->db->query($sql)->result();
    }

    // quotes table has FULLTEXT index. IN BOOLEAN MODE does not require
    // FULLTEXT, but slow without one.
    //
    // To disable stopwords and min char length, add these to .cnf (and reindex):
    //      ft_stopword_file = ""   
    //      ft_min_word_len  = 3

    public function find_quotes($text, $start, $limit)
    {
        $text = $this->db->escape($text);        
        return $this->db->select('quotes.quote, authors.name, nats.nat, cats.cat')
                    ->from('quotes')
                    ->join('authors', 'authors.id = quotes.author_id')
                    ->join('nats', 'authors.nat_id = nats.id')
                    ->join('cats', 'authors.cat_id = cats.id')
                    ->where("MATCH(quote) AGAINST ($text IN BOOLEAN MODE)", null)
                    //->order_by('name')
                    ->limit((int) $limit, (int) $start)
                    ->get()
                    ->result();
    }

    // For pagination.
    public function find_quotes_count($text)
    {
        $text = $this->db->escape($text);
        return $this->db->from('quotes')
                        ->where("MATCH(quote) AGAINST ($text IN BOOLEAN MODE)", null)
                        ->count_all_results();
    }
}



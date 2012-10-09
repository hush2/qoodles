<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/

$sections = array('benchmarks'        => FALSE,
                  'get'               => FALSE,
                  'memory_usage'      => FALSE,
                  'uri_string'        => FALSE,
                  'http_headers'      => FALSE,
                  'config'            => FALSE,
                  'controller_info'   => FALSE,
);

$ci = get_instance();
$ci->output->set_profiler_sections($sections);


/* End of file profiler.php */
/* Location: ./application/config/profiler.php */
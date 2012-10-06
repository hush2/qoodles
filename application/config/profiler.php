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

$sections = array(
    'benchmarks' => false,
    'get' => false,
    'memory_usage' => false,
    'uri_string' => false,
    'http_headers' => false,
    'config' => false,
    'controller_info' => false,         
);

$ci = get_instance();
$ci->output->set_profiler_sections($sections);


/* End of file profiler.php */
/* Location: ./application/config/profiler.php */
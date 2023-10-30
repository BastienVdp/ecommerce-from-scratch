<?php 
require 'config.php';

session_start();


/* including the file `_include.php` located in the `app/core` directory. 
This line is used to include any necessary core files for the PHP script to run properly. */
require_once dirname(__DIR__) . '/' . $config['alias']['core'] .'/_include.php';


/* including the file `_include.php` located in the `app/http` directory. 
This line is used to include any necessary http files. 
*/
require_once dirname(__DIR__) . '/' . $config['alias']['http'] .'/_include.php';


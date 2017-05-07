<?php
define('__ROOT__', dirname(__FILE__));
define('__SRC__', __ROOT__.'/_src');
define('__POST__', __ROOT__.'/_post');
define('__MD__', __ROOT__.'/php-markdown');

require_once(__ROOT__.'/config.php');
require_once(__SRC__.'/page.php');

function is_main($query)
{
    return count($query) === 0;
}

function is_category($query)
{
    return count($query) === 1;
}

function is_post($query)
{
    return count($query) === 2;
}

function route()
{
    $query = $_REQUEST['q'];
    $query = split('/', $query);
    $query = array_filter($query, function($v){ return !empty($v); });

    if(is_main($query))
    {
        \page\echo_main();
    }
    else if(is_category($query))
    {
        \page\echo_category($query[0]);
    }
    else if(is_post($query))
    {
        \page\echo_post($query[0], $query[1]);
    }
    else
    {
        \page\echo_not_found($query);
    }
}

route();

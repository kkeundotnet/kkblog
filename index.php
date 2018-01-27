<?php
define('__ROOT__', dirname(__FILE__));
define('__SRC__', __ROOT__.'/_src');
define('__POST__', __ROOT__.'/_post');
define('__MD__', __ROOT__.'/php-markdown');

require_once(__ROOT__.'/config.php');

if(substr(BASE_URL, -1) === '/')
{
    define('BASE_URL_S', BASE_URL);
    define('BASE_URL_NO_S', rtrim(BASE_URL, '/'));
}
else
{
    define('BASE_URL_S', BASE_URL.'/');
    define('BASE_URL_NO_S', BASE_URL);
}

require_once(__MD__.'/Michelf/MarkdownExtra.inc.php');
require_once(__SRC__.'/header.php');
require_once(__SRC__.'/title.php');
require_once(__SRC__.'/clist.php');
require_once(__SRC__.'/plist.php');
require_once(__SRC__.'/footer.php');
require_once(__SRC__.'/disqus.php');
require_once(__SRC__.'/kkoment.php');
require_once(__SRC__.'/page.php');
require_once(__SRC__.'/rss.php');

function is_rss($query)
{
    return count($query) === 1 && $query[0] === "rss";
}

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

function is_not_safe($query)
{
    foreach($query as $s)
    {
        if(preg_match('/\.\./', $s) || preg_match('/~/', $s))
        {
            return true;
        }
    }
    return false;
}

function route()
{
    $query = $_REQUEST['q'];
    $query = preg_split('/\//', $query);
    $query = array_filter($query, function($v){ return !empty($v); });
    $query = array_values($query);

    if(is_not_safe($query))
    {
        \page\echo_not_found();
        return;
    }
    if(is_rss($query))
    {
        \rss\echoo();
    }
    else if(is_main($query))
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
        \page\echo_not_found();
    }
}

route();

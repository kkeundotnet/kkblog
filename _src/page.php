<?php
namespace page;

function page_header($t_sub=NULL, $c_name=NULL)
{ ?>
<!DOCTYPE html>
<html lang="ko">
<head>
<?php \header\echoo($t_sub); ?>
</head>
<body>
<?php \title\echoo(); ?>
<?php \clist\echoo($c_name); ?>
<hr>
<?php }

function page_footer()
{ ?>
<hr>
<?php \footer\echoo(); ?>
</body>
</html>
<?php }

function echo_not_found()
{
    header('HTTP/1.0 404 Not Found');
    page_header();
?>
<p class="caution">404 Page not found.</p>
<?php
    page_footer();
}

function echo_main()
{
    page_header();
    \plist\echoo();
    page_footer();
}

function echo_category($c_name)
{
    if(!is_dir(__POST__.'/'.$c_name))
    {
        echo_not_found();
        return;
    }
    page_header($c_name, $c_name);
    \plist\echoo($c_name);
    page_footer();
}

function echo_post($c_name, $p_name)
{
    $p = __POST__.'/'.$c_name.'/'.$p_name.'.md';
    if(!file_exists($p))
    {
        echo_not_found();
        return;
    }
    $contents = file_get_contents($p);
    $p_date = substr($p_name, 0, 10);
    $p_title = \plist\get_title($p);

    page_header($p_title, $c_name);
    echo \Michelf\MarkdownExtra::defaultTransform($contents);
?>
    <p class="p-date"><?php echo $p_date; ?> 씀.</p>
<?php
    if ($c_name !== "draft") {
        if(ENABLE_DISQUS) {
            \disqus\echoo($c_name, $p_name);
        }
        if(ENABLE_KKOMENT) {
            \kkoment\echoo($c_name, $p_name);
        }
    }
    page_footer();
}

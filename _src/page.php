<?php
namespace page;

require_once(__SRC__.'/header.php');
require_once(__SRC__.'/title.php');
require_once(__SRC__.'/clist.php');
require_once(__SRC__.'/plist.php');
require_once(__SRC__.'/footer.php');
require_once(__MD__.'/Michelf/MarkdownExtra.inc.php');

function echo_not_found()
{
    header('HTTP/1.0 404 Not Found');
?>
<html lang="ko">
<head>
<?php \header\echoo(); ?>
</head>
<body>
<?php \title\echoo(); ?>
<?php \clist\echoo(); ?>
<hr>
<p class="caution">404 Page not found.</p>
<hr>
<?php \footer\echoo(); ?>
</body>
</html>
<?php }

function echo_main()
{ ?>
<html lang="ko">
<head>
<?php \header\echoo(); ?>
</head>
<body>
<?php \title\echoo(); ?>
<?php \clist\echoo(); ?>
<hr>
<?php \plist\echoo(); ?>
<hr>
<?php \footer\echoo(); ?>
</body>
</html>
<?php }

function echo_category($c_name)
{
    if(!is_dir(__POST__.'/'.$c_name))
    {
        echo_not_found();
        return;
    }
?>
<html lang="ko">
<head>
<?php \header\echoo($c_name); ?>
</head>
<body>
<?php \title\echoo(); ?>
<?php \clist\echoo($c_name); ?>
<hr>
<?php \plist\echoo($c_name); ?>
<hr>
<?php \footer\echoo(); ?>
</body>
</html>
<?php }

function echo_post($c_name, $p_name)
{
    $p = __POST__.'/'.$c_name.'/'.$p_name.'.md';
    $contents = file_get_contents($p);
    $p_date = substr($p_name, 0, 10);
    $p_title = trim(shell_exec("head -n 1 $p"));
?>
<html lang="ko">
<head>
<?php \header\echoo($p_title); ?>
</head>
<body>
<?php \title\echoo(); ?>
<?php \clist\echoo($c_name); ?>
<hr>
<?php echo \Michelf\MarkdownExtra::defaultTransform($contents); ?>
<p class="p-date"><?php echo $p_date; ?> 씀.</p>
<hr>
<?php \footer\echoo(); ?>
</body>
</html>
<?php }

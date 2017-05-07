<?php
namespace page;

require_once(__SRC__.'/header.php');
require_once(__SRC__.'/title.php');
require_once(__SRC__.'/clist.php');
require_once(__SRC__.'/plist.php');
require_once(__SRC__.'/footer.php');

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

function echo_category($query)
{

}

function echo_post($query)
{

}

function echo_not_found()
{

}

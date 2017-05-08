<?php
namespace title;

function echoo()
{ ?>
<p>
<a href="<?php echo BASE_URL_S; ?>"><?php echo BLOG_TITLE; ?></a> |
<?php echo BLOG_DESC; ?> |
<a href="<?php echo BASE_URL_S.'rss'; ?>">RSS</a>
</p>
<?php }

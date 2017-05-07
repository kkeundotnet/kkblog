<?php
namespace title;

function echoo()
{ ?>
<p>
<a href="<?php echo BASE_URL; ?>"><?php echo BLOG_TITLE; ?></a> |
<?php echo BLOG_DESC; ?> |
<a href="<?php echo BASE_URL.'rss'; ?>">RSS</a>
</p>
<?php }

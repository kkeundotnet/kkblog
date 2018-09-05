<?php
declare(strict_types=1);

namespace title;

function echoo(): void
{ ?>
<p>
<a href="<?php echo BASE_URL_S; ?>"><?php echo BLOG_TITLE; ?></a> |
<?php echo BLOG_DESC; ?> |
<a href="<?php echo BASE_URL_S.'rss'; ?>">RSS</a>
</p>
<?php }

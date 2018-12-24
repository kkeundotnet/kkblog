<?php
declare(strict_types=1);

namespace header;

function echoo(?string $t_sub=NULL): void
{
$t = BLOG_TITLE;
if(!is_null($t_sub))
{
    $t = $t.' - '.$t_sub;
}
 ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_S.'css/kkblog.css'; ?>">
<?php if (ENABLE_KKOMENT): ?>
<script src='https://cdn.rawgit.com/jackmoore/autosize/4.0.2/dist/autosize.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js'></script>
<script src="https://kkoment.kkeun.net/kkoment.js" charset="UTF-8"></script>
<?php endif; ?>
<title><?php echo $t; ?></title>
<?php }

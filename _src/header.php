<?php
namespace header;

function echoo($t_sub=NULL)
{
$t = BLOG_TITLE;
if(!is_null($t_sub))
{
    $t = $t.' - '.$t_sub;
}
 ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'css/kkblog.css'; ?>">
<title><?php echo $t; ?></title>
<?php }

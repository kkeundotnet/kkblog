<?php
namespace plist;

function is_not_draft($p)
{
    return basename(dirname($p)) !== 'draft';
}

function cmp_post($p1, $p2)
{
    $p1 = basename($p1);
    $p2 = basename($p2);
    return strcmp($p1, $p2);
}

function echoo($c_selected=null)
{
    if(is_null($c_selected))
    {
        $ps = glob(__POST__.'/*/*.md');
        $ps = array_filter($ps, '\plist\is_not_draft');
    }
    else
    {
        $ps = glob(__POST__.'/'.$c_selected.'/*.md');
    }
    usort($ps, '\plist\cmp_post');
?>
<ul class="plist-ul">
<?php foreach($ps as $p): ?>
<li class="plist-li">
<?php
$c_name = basename(dirname($p));
$p_name = substr(basename($p), 0, -3);
$p_link = BASE_URL.$c_name.'/'.$p_name;
$p_title = htmlspecialchars(trim(shell_exec("head -n 1 $p")));
$p_date = substr($p_name, 0, 10);
?>
<span class="plist-title">
<a href="<?php echo $p_link; ?>"><?php echo $p_title; ?></a>
</span>
<span class="plist-date">(<?php echo $p_date; ?>)</span>
</li>
<?php endforeach; ?>
</ul>
<?php }

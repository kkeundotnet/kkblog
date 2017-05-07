<?php
namespace clist;

function is_not_draft($c)
{
    return basename($c) !== 'draft';
}

function post_num_of($c)
{
    return count(glob($c.'/*.md'));
}

function echoo()
{
    $cs = glob(__POST__.'/*', GLOB_ONLYDIR);
    $cs = array_filter($cs, '\clist\is_not_draft');
?>
<ul class="clist-ul">
<?php foreach($cs as $c): ?>
<?php $c_name = basename($c); ?>
<li class="clist-li">
<a href="<?php echo BASE_URL.$c_name; ?>"><?php echo $c_name; ?></a>
(<?php echo post_num_of($c); ?>)
</li>
<?php endforeach; ?>
</ul>
<?php }

<?php
declare(strict_types=1);

namespace clist;

function is_not_draft(string $c): bool
{
    return basename($c) !== 'draft';
}

function post_num_of(string $c): int
{
    return count(glob($c.'/*.md'));
}

function echo_selected(string $c_name, ?string $c_selected): void
{
    if($c_name === $c_selected)
    {
        echo "clist-selected";
    }
}

function echoo(?string $c_selected=null): void
{
    $cs = glob(__POST__.'/*', GLOB_ONLYDIR);
    $cs = array_filter($cs, '\clist\is_not_draft');
?>
<ul class="clist-ul">
<?php foreach($cs as $c): ?>
<?php $c_name = basename($c); ?>
    <li class="clist-li <?php echo_selected($c_name, $c_selected); ?>">
<a href="<?php echo BASE_URL_S.$c_name; ?>"><?php echo $c_name; ?></a>
(<?php echo post_num_of($c); ?>)
</li>
<?php endforeach; ?>
</ul>
<?php }

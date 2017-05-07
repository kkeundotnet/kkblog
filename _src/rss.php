<?php
namespace rss;

/* Remove <script> from html
   CAUTION: This is a bad solution.  Read,
   http://stackoverflow.com/questions/7130867/remove-script-tag-from-html-content */

/* NOTE: http://php.net/manual/en/pcre.pattern.php */

function remove_non_rss($html)
{
    $html = preg_replace('%<script.*?>.*?</script>%is', '', $html);
    $html = preg_replace('%<a href="#.*?>(.*?)</a>%is', '$1', $html);
    return $html;
}

function gen_info($p)
{
    $info = array();
    $info['title'] = htmlspecialchars(trim(shell_exec("head -n 1 $p")));
    $c_name = basename(dirname($p));
    $p_name = substr(basename($p), 0, -3);
    $info['link'] = BASE_URL.$c_name.'/'.$p_name;
    $contents = file_get_contents($p);
    $contents = implode("\n", array_slice(explode("\n", $contents), 2));

    $info['contents'] = \Michelf\MarkdownExtra::defaultTransform($contents);
    return $info;
}

function last_ten()
{
    $ps = glob(__POST__.'/*/*.md');
    $ps = array_filter($ps, '\plist\is_not_draft');
    usort($ps, '\plist\cmp_post');
    $ps = array_slice($ps, 0, 5);
    return array_map('\rss\gen_info', $ps);
}

function echoo()
{
header('Content-Type: application/rss+xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title><?php echo BLOG_TITLE; ?></title>
<link><?php echo BASE_URL; ?></link>
<atom:link href="<?php echo BASE_URL.'rss'; ?>" rel="self"
           type="application/rss+xml" />
<description><?php echo BLOG_DESC; ?></description>
<?php foreach(last_ten() as $v): ?>
<item>
<title><?php echo $v["title"]; ?></title>
<link><?php echo $v["link"]; ?></link>
<guid><?php echo $v["link"]; ?></guid>
<description>
<![CDATA[<?php echo remove_non_rss($v["contents"]); ?>]]>
</description>
</item>
<?php endforeach; ?>
</channel>
</rss>
<?php }

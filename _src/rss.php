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
    $html = preg_replace('%<a href="javascript.*?>(.*?)</a>%is', '$1', $html);
    return $html;
}

function gen_info($p)
{
    $info = array();
    $info['title'] = \plist\get_title($p);
    $c_name = basename(dirname($p));
    $p_name = substr(basename($p), 0, -3);
    $info['link'] = BASE_URL_S.$c_name.'/'.$p_name;
    $contents = file_get_contents($p);
    if(substr($contents, 0, 1) === "#")
    {
        $title_lines = 1;
    }
    else
    {
        $title_lines = 2;
    }
    $contents = array_slice(explode("\n", $contents), $title_lines);
    $contents = implode("\n", $contents);

    $info['contents'] = \Michelf\MarkdownExtra::defaultTransform($contents);
    return $info;
}

function last_five()
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
<link><?php echo BASE_URL_S; ?></link>
<atom:link href="<?php echo BASE_URL_S.'rss'; ?>" rel="self"
           type="application/rss+xml" />
<description><?php echo BLOG_DESC; ?></description>
<?php foreach(last_five() as $v): ?>
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

<?php
namespace kkoment;

function echoo($c_name, $p_name)
{ ?>
<hr>
<div id="kkoment-div"></div>
<script>kkoment_load("kkoment-div", "<?php echo BASE_URL; ?>", "<?php echo $c_name."/".$p_name; ?>");</script>
<?php }

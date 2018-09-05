<?php
declare(strict_types=1);

namespace kkoment;

function echoo(string $c_name, string $p_name): void
{ ?>
<hr>
<div id="kkoment-div"></div>
<script>kkoment_load("kkoment-div", "<?php echo BASE_URL; ?>", "<?php echo $c_name."/".$p_name; ?>");</script>
<?php }

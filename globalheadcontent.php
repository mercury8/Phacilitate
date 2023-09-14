<?php
$tracking_code = get_field('tracking_code', 'option');
if ($tracking_code) :
    echo $tracking_code;
endif;
?>
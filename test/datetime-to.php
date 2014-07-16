<?php

require '../src/paper-cello.php';

$utc_now = pc\datetime_now();
$la_now = pc\datetime_to($utc_now, 'America/Los_Angeles', 'M j, Y g:ia');
echo "\$utc_now = $utc_now, \$la_now = $la_now";

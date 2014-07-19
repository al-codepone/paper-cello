<?php

require '../src/paper-cello.php';

$num_items = 87;
$items_per_page = 10;
$raw_current_page_num = 20;
 
list($num_pages, $current_page_num) = 
    pc\paginate($num_items, $items_per_page, $raw_current_page_num);
 
printf('$num_pages = %d, $current_page_num = %d',
    $num_pages, $current_page_num);

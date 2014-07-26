<?php

/**
 * @author Ry Ferguson
 * @license MIT
 */

namespace pc;

/**
 * Get the current UTC datetime in
 * YYYY-MM-DD HH:MM:SS format.
 *
 * @return string current UTC datetime
 */
function datetime_now() {
    date_default_timezone_set('UTC');
    return date('Y-m-d H:i:s');
}

/**
 * Convert a UTC datetime string to a
 * timezone and date format.
 *
 * @param string $datetime a UTC datetime.
 *     The format can be any format that
 *     strtotime() accepts.
 * @param string $timezone a valid PHP timezone
 *     identifier.
 * @param string $format the date and time
 *     format to use for the returned datetime
 *     string. The format can be any format
 *     that the PHP date() function accepts.
 * @return string the converted datetime
 */
function datetime_to($datetime, $timezone, $format) {
    $date = new \DateTime($datetime, new \DateTimeZone('UTC')); 
    date_default_timezone_set($timezone); 
    return date($format, $date->format('U'));
}

/**
 * Get a blowfish hash. This function uses
 * the PHP crypt() function internally.
 *
 * @param string $input the string to be hashed.
 * @param string $salt either an integer cost
 *     value or a previously obtained bcrypt_hash().
 *     The cost value must be between 4-31 inclusive.
 * @return string blowfish hash
 */
function bcrypt_hash($input, $salt) {
    if(is_int($salt)) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ./';
        $num_chars = strlen($chars);
        $salt = sprintf('$2a$%02d$', $salt);

        for($i = 0; $i < 22; ++$i) {
            $salt .= $chars[mt_rand(0, $num_chars - 1)];
        }
    }

    return crypt($input, $salt);
}

/**
 * Clamp a value to a range.
 *
 * @param mixed $value the value to clamp
 * @param mixed $min the minimum allowed value
 * @param mixed $max the maximum allowed value
 * @return mixed the clamped value
 */
function clamp($value, $min, $max) {
    return min(max($value, $min), $max);
}

/**
 * Compute pagination values.
 *
 * @param int $num_items the total number of items
 *     to paginate.
 * @param int $items_per_page the number of items per
 *     page.
 * @param int $current_page_num the raw current page
 *     number. This value will be normalized.
 * @return array an array with two elements: the total
 *     number of pages and the normalized current page
 *     number.
 */
function paginate($num_items, $items_per_page, $current_page_num) {
    $num_pages = (int)max(1, ceil($num_items/$items_per_page));
    $current_page_num = clamp($current_page_num, 1, $num_pages);
    return array($num_pages, $current_page_num);
}

function route(array $array, $key = false) {
    $key = ($key === false) ? $_GET['r'] : $key;
    return $array[$key];
}

/**
 * Get a random sha1 hash.
 *
 * @return string random sha1 hash
 */
function sha1_token() {
    return sha1(uniqid(mt_rand(), true));
}

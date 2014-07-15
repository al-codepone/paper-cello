<?php

/**
 * @author Ry Ferguson
 * @license MIT
 */

namespace pc;

function datetime_now() {
    date_default_timezone_set('UTC');
    return date('Y-m-d H:i:s');
}

function datetime_to($datetime, $timezone, $format) {
    $date = new DateTime($datetime, new DateTimeZone('UTC')); 
    date_default_timezone_set($timezone); 
    return date($format, $date->format('U'));
}

function bcrypt_hash($input, $salt) {
    if(is_int($salt)) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ./';
        $numChars = strlen($chars);
        $salt = sprintf('$2a$%02d$', $salt);

        for($i = 0; $i < 22; ++$i) {
            $salt .= $chars[mt_rand(0, $numChars - 1)];
        }
    }

    return crypt($input, $salt);
}

function clamp($value, $min, $max) {
    return min(max($value, $min), $max);
}

function paginate($numItems, $itemsPerPage, $currentPageNum) {
    $numPages = max(1, ceil($numItems/$itemsPerPage));
    $currentPageNum = clamp($currentPageNum, 1, $numPages);
    return array($numPages, $currentPageNum);
}

function route(array $array, $key = false) {
    $key = ($key === false) ? $_GET['r'] : $key;
    return $array[$key];
}

function sha1_token() {
    return sha1(uniqid(mt_rand(), true));
}

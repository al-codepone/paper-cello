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

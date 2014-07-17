<?php

require '../src/paper-cello.php';

$sign_up_password = 'password';
$login_password = 'password';
 
//store in database
$sign_up_hash = pc\bcrypt_hash($sign_up_password, 10);
 
//get hash using previous hash
$login_hash = pc\bcrypt_hash($login_password, $sign_up_hash);
 
$correct = ($sign_up_hash == $login_hash);
 
echo implode("<br/>\n", array(
    '$sign_up_hash = ' . $sign_up_hash,
    '$login_hash = ' . $login_hash,
    '$correct = ' . var_export($correct, true)));

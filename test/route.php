<?php

require '../src/paper-cello.php';

require './route/' . pc\route(array(
    null => 'home.php',
    'portfolio.php',
    'photos.php',
    'sports.php',
    'about.php'));

include './html/template.php';

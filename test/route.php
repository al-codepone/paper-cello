<?php

require '../src/paper-cello.php';

require './route/' . pc\route(array(
    null => 'home.php',
    'portfolio' => 'portfolio.php',
    'about' => 'about-me.php'));

include './html/template.php';

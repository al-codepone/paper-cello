<?php

require '../src/paper-cello.php';

echo implode(', ', array(
    pc\clamp(5, 1, 10),
    pc\clamp(0, 1, 10),
    pc\clamp(11, 1, 10),
    pc\clamp(11, 1, 10.4),
    pc\clamp('d', 'c', 'f'),
    pc\clamp('a', 'c', 'f'),
    pc\clamp('i', 'c', 'f')));

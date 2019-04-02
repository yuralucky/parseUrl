<?php
$content = 5;

try {
    if (is_string($content))

        echo 'nor';
} catch (Exception $exception) {
    throw new Exception('not');
}

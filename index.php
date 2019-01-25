<?php

use Project1\Commander;

require_once __DIR__ . '/vendor/autoload.php';
$option = getopt('h', ['parse:', 'report:', 'help:']);

$start = new Commander($option);
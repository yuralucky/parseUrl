<?php
namespace Project1;

require_once 'vendor/autoload.php';

$option = getopt('h', ['parse:', 'report:', 'help:']);
$start = new Commander($option);

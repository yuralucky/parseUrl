<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 15:01
 */
$url='https://football.ua';
$content=file_get_contents($url,false);
preg_match_all('/<a href=[\"|\'](.*?)[\"|\']/is', $content, $links, PREG_SET_ORDER);
var_dump($links);
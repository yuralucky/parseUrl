<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 16.01.19
 * Time: 15:59
 */

namespace Project1;


interface CheckUrl
{
    public function getDomain($url);

    public function check($url);
}
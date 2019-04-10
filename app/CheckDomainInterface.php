<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 25.03.19
 * Time: 10:59
 */

namespace Project1;


interface CheckDomainInterface
{
    public function getRightUrl(): string;

    public function getDomain(): string;

}
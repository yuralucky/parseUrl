<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 11.04.19
 * Time: 15:29
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class CheckDomainTest extends TestCase
{
    protected $obj;

    public function setUp()
    {
        $this->obj = new CheckDomain('php.net');
    }


    public function testGetRightUrl()
    {
        $this->assertIsString($this->obj->getRightUrl());

    }
}

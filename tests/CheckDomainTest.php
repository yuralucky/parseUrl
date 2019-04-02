<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.04.19
 * Time: 15:32
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class CheckDomainTest extends TestCase
{
    protected $instance;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->instance=new CheckDomain();
    }

    public function testCheckUrl()
    {
        $this->assertSt('');

    }

    public function testGetDomain()
    {
        $this->assertTrue(true);

    }

    public function test__construct()
    {

        $this->assertTrue($this->instance);

    }
}

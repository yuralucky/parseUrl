<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 24.01.19
 * Time: 15:37
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new Parser('php.net');
    }

    public function testSaveParseUrl()
    {
        $this->assertFileExists($this->instance->saveParseUrl());
    }


    public function testSaveParseImageUrl()
    {
        $this->assertTrue(true);
    }

    public function testGetContent()
    {
        $this->assertIsString($this->instance->getContent());
    }


}

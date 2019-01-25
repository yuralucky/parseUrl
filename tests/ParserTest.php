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

    public function testSaveParseUrl()
    {
        $strReg='~((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]~';
        $this->assertRegExp('/baz/','baza');
    }

    public function testGetDomain()
    {

    }

    public function testSaveParseImageUrl()
    {

    }

    public function testGetContent()
    {
        $instanse=new Parser();
    }

    public function testCheck()
    {

    }

    public function test__construct()
    {

    }
}

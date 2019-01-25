<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 24.01.19
 * Time: 15:11
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class ShowReportTest extends TestCase
{

    public function test__construct()
    {

    }

    public function testGetDomain()
    {

    }

    public function testCheck()
    {

    }

    public function testReport()
    {
        $this->assertFileIsReadable('result/dumskaya_net.csv');
    }
}

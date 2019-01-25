<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 24.01.19
 * Time: 14:14
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class CommanderTest extends TestCase
{

    public function test__construct()
    {
        $this->assertFileIsReadable('result/dumskaya_net.csv');
    }
}

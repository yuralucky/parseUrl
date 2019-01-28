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
    protected $instance;

    public function setUp()
    {
        $this->instance=new ShowReport('https://football.ua');
    }


    public function testReport()
    {
        $this->assertFileExists('result/'.$this->instance->getFilename().'.csv');
    }
}

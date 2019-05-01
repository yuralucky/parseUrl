<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 30.04.19
 * Time: 18:46
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class ShowReportTest extends TestCase
{
    private $getFileMock;
    private $file;

    public function setUp()
    {
        $this->getFileMock=$this->createMock(GetFilename::class);
        $this->getFileMock->method('getFileName')->willReturn('php.net');
        $this->file=new ShowReport($this->getFileMock);

    }

    public function testShowReport()
    {
       $this->assertInstanceOf(GetFilename::class,$this->getFileMock);
       $this->assertInstanceOf(ShowReport::class,$this->file);
        $this->assertIsString($this->file->getPathFile());
//        $this->assertFileIsReadable($this->file->getPathFile());

    }
}

<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 17.04.19
 * Time: 12:56
 */

namespace Project1;

use PHPUnit\Framework\TestCase;

class ContentRepositoryTest extends TestCase
{
    protected $filename;

    public function setUp()
    {
        $contentMock=$this->createMock(Content::class);
        $file=$this->createMock(GetFilename::class);
        $this->filename=new ContentRepository($contentMock,$file);

    }

    public function test__construct()
    {
        $this->assertInstanceOf(ContentRepository::class,$this->filename);

    }


}

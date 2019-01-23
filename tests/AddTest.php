<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 09.01.19
 * Time: 12:38
 */

//include 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Project1\Add;


/**
 * Class AddTest
 */
class AddTest extends TestCase
{

    public function testSumm()
    {
        $result=new Add();
        $culc=$result->summ(3,5);
        $this->assertEquals(8,$culc);


    }
}

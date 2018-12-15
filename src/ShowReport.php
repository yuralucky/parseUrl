<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 16:35
 */

namespace Project1;


class ShowReport
{
    /**
     * @var string
     */
    private $domain;

//    public function __construct()
//    {
//        $this->domain = parse_url($url);
//    }


    public function report()
    {
        $handle = fopen("result/dumskaya_net.csv", 'r');
        $row=1;
        if($handle!==false){
            while(($data=fgetcsv($handle,1000))!==false)
            {
                $num=count($data);
                for ( $i=0;$i<$num;$i++)
                {
                    echo $data[$i];
                }
            }
        }

        fclose($handle);
    }

    public function show($number)
    {
        return  $number;
    }

}

$obj = new ShowReport();

echo $obj->report();
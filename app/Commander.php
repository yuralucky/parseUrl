<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */

namespace Project1;
require_once 'vendor/autoload.php';

class Commander
{
    /**
     * Commander constructor.
     * @param $option
     */
    function __construct($option)
    {
        switch (key($option)) {


            case "parse":
                echo $option['report'];
//                $obj = new Parser($option['parse']);
//                $obj->saveParseImageUrl();
//                echo $obj->saveParseUrl();
                break;

            case "report":
//                echo $option['report'];
//                break;
                $url = new CheckDomain($option['report']);
                $file = new GetFilename($url);
//                echo $file->getFileName();
               $report = new ShowReport($file);
                 $report->showReport();
                break;

            case "help" || "h":
            default:
                echo '_____________Hello friend_______________. 
If you want to parse any resource in CLI,
enter php index.php --parse <your resource>.
To display information in cli, 
enter php index.php --report <your resource>
_'
                ;
        }
    }

}

$option = getopt('h', ['parse:', 'report:', 'help:']);
$start = new Commander($option);
//$obj=new CheckDomain('ukr.net');
//print $obj->getRightUrl();
//var_dump($start['parse']);
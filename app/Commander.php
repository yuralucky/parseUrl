<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */

namespace Project1;

use Project\Parser;
use Project\ShowReport;

class Commander
{
    /**
     * Commander constructor.
     * @param $option
     */
    function __construct($option='https://dumskaya.net')
    {
        switch (key($option)) {


            case "parse":
                $obj = new Parser($option['parse']);
                $obj->saveParseImageUrl();
                $obj->saveParseUrl();
                break;

            case "report":
                $report = new ShowReport($option['report']);
                echo $report->report();
                break;

            case "help" || "h":
            default:
                echo 'Hey. To parse any resource in cli, enter php src / Commander.php --parse <your resource>.
To display information in cli, enter php src / Commander.php --report <your resource>';
        }
    }

}

$option = getopt("p:r:h", ["parse:", "report:", "help:"]);
//new Commander($option);
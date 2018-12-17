<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */

namespace Project1;

require __DIR__ . '/../vendor/autoload.php';

class Commander
{
    function __construct($option)
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
new Commander($option);
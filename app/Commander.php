<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */

namespace Project1;

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
                echo 'Hi. To parse any resource in cli, enter php index.php --parse <your resource>.
                        To display information in cli, enter php index.php --report <your resource>';
        }
    }

}


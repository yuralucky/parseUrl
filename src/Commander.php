<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */

namespace Project1;

//require_once ('./vendor/autoload.php');


class Commander
{
    function __construct($key='parse')
    {
        switch ($key){


        case "parse":
            echo "parse";
            break;

            case "report":
                echo "report";
                break;

            case "help"||"h":
            default:
                echo 'Help';
    }}

}
$option=getopt("p:r:h",["parse:","report:","help:"]);
new Commander();
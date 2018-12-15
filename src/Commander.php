<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 15:32
 */
#!/usr/bin/php
namespace Project1;
include 'ShowReport.php';
include 'Parser.php';
//require_once ('./vendor/autoload.php');


class Commander
{
    function __construct($option)
    {
        switch (key($option)){


        case "parse":
            $obj=new Parser();
            $obj->saveParseImageUrl($option['parse']);
            $obj->saveParseUrl($option['parse']);

            break;

            case "report":
                $report=new ShowReport();
                echo $report->show($option['report']);
                break;

            case "help"||"h":
            default:
                echo 'Help';
    }}

}
$option=getopt("p:r:h",["parse:","report:","help:"]);
new Commander($option);
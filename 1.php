<?php

include 'P1.php';
include 'src/Parser.php';

class Commander
{
    function __construct(array $option)
    {
        switch (key($option)) {


            case "one":
                $t=new P1($option['one']);
                echo $t->getDomain();
                break;

            case "two":
//                $t=new Parser();
                echo 'Hi two';
                break;

            case "help" || "h":
            default:
                echo 'Help';
        }
    }

}

$option = getopt("o:t:h", ["one:", "two:", "help"]);

new Commander($option);
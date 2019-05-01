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
                $url = new CheckDomain($option['parse']);
                $content = new Content($url);
                $filename = new GetFilename($url);
                $object = new ContentRepository($content, $filename);
                $object->saveParseUrl();
                $object->saveParseImageUrl();
                print $object->getCsv();
                break;

            case "report":
                $url = new CheckDomain($option['report']);
                print_r($url->getDomain());
                $file = new GetFilename($url);
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
_';
        }
    }

}


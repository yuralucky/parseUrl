<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 16:35
 */

namespace Project1;
include 'CheckDomain.php';

class ShowReport
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var mixed
     */
    private $filename;


    public function __construct(CheckDomain $url)
    {
        $this->url = $url;

    }

    /**
     * @return string
     *
     * Tho method open report file
     */
    public function showReport()
    {
        $handle = fopen("result/test.csv", 'r');
        if ($handle !== false) {
            while (($data = fgetcsv($handle, 1000)) !== false) {
                $num = count($data);
                for ($i = 0; $i < $num; $i++) {
                    echo $data[$i]."_________________________";
                }
            }
        } else {
            print 'This url not  parse . Enter command --parse <your url>';
            exit();
        }
        fclose($handle);
        return '********The end';
    }


}

$url=new CheckDomain('football.ua');
$report=new ShowReport($url);
print $report->showReport();



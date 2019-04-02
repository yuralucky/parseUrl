<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 16:35
 */

namespace Project1;

interface CheckFilenameInterface
{
    public function getFileName();

}

class CheckDomain
{

    private $url;

    public function __construct($url)
    {
        $this->url = $url;

    }

    /**
     * @param $url
     * @return string
     */
    public function check(): string
    {
        return strpos($this->url, 'http') === false ? "https://{$this->url}" : $this->url;
    }

    /**
     * @param $url
     * @return mixed|string
     */
    public function getDomain(): string
    {
        return parse_url($this->check(), PHP_URL_HOST);
    }


}

class ShowReport implements CheckFilenameInterface
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
        $this->filename=$this->getFilename();

    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     *
     * Tho method open report file
     */
    public function showReport()
    {
        $handle = fopen("result/{$this->filename}.csv", 'r');
        if ($handle !== false) {
            while (($data = fgetcsv($handle, 1000)) !== false) {
                $num = count($data);
                for ($i = 0; $i < $num; $i++) {
                    echo $data[$i];
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
print $report->getFilename();



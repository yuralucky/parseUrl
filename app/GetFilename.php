<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.04.19
 * Time: 9:41
 */

namespace Project1;

include 'CheckFilenameInterface.php';
include 'CheckDomain.php';

class GetFilename implements CheckFilenameInterface
{

    private $url;

    public function __construct(CheckDomain $url)
    {
        $this->url=$url;
    }

    public function getHost()
    {
        return parse_url($this->url->getRightUrl(),PHP_URL_HOST);
    }

    public function getFileName()
    {
       $filename= str_replace('.', '_', $this->getHost());
       return $filename.'.csv';
    }

}
$obj = new CheckDomain('https://www.6pm.com/');

$obj=new GetFilename($obj);
print $obj->getFileName();
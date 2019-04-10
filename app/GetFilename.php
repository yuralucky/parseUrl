<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.04.19
 * Time: 9:41
 */

namespace Project1;


class GetFilename implements GetFilenameInterface
{

    private $url;

    /**
     * GetFilename constructor.
     * @param CheckDomain $url
     */
    public function __construct(CheckDomain $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return parse_url($this->url->getRightUrl(), PHP_URL_HOST);
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        $filename = str_replace('.', '_', $this->getHost());
        return $filename . '.csv';
    }

}
//$obj = new CheckDomain('https://www.6pm.com/');
//
//$obj=new GetFilename($obj);
//print $obj->getFileName();
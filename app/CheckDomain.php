<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 25.01.19
 * Time: 11:38
 */

namespace Project1;
include 'CheckDomainInterface.php';

class CheckDomain implements CheckDomainInterface
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
    public function getRightUrl(): string
    {
        return strpos($this->url, 'http') === false ? "https://{$this->url}" : $this->url;
    }

    /**
     * @param $url
     * @return mixed|string
     */
    public function getDomain(): string
    {
        return parse_url($this->getRightUrl(), PHP_URL_HOST);
    }


}

$obj = new CheckDomain('https://www.6pm.com/');
var_dump( $obj->getRightUrl());
<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 25.01.19
 * Time: 11:38
 */

namespace Project1;


class CheckDomain implements CheckDomainInterface
{

    private $url;

    public function __construct($url)
    {
        $this->url = $url;

    }

    /**
     * @return mixed|string
     *
     */
    public function getDomain(): string
    {
        return parse_url($this->getRightUrl(), PHP_URL_HOST);
    }


    /**
     * @return string
     */
    public function getRightUrl(): string
    {
        return strpos($this->url, 'http') === false ? "https://{$this->url}" : $this->url;
    }


}


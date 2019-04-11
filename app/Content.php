<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 01.04.19
 * Time: 12:47
 */

namespace Project1;

class Content
{

    private $url;

    public function __construct(CheckDomainInterface $url)
    {
        $this->url = $url;
    }

    public function getContent(): string
    {

        return file_get_contents($this->url->getRightUrl(), false);
    }
}

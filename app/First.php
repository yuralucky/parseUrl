<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 27.03.19
 * Time: 8:40
 */

namespace Project1;


class First
{
    private $url;

    private $data;

    public function __construct(CheckDomainInterface $url)
    {
        $this->url = $url;
        $this->data=$this->getData();
    }

    public function getData()
    {
        return file_get_contents($this->url, false);
    }

    public function getMatch(): array
    {
        preg_match_all('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#', $this->data, $matches, PREG_SET_ORDER);
        return $matches;

    }

}

$data = new First('https://football.ua/');
print_r($data->getMatch());
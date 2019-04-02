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

    public function __construct(CheckDomain $url)
    {
        $this->url = $url;
    }

    public function getContent()
    {

        try {
            return file_get_contents($this->url->checkUrl(), false);
        } catch (\Exception $e) {
            throw new Exception('Problem with parse url');
        }

    }
}

$url = new CheckDomain('duskaya.net/');

$obj = new Content($url);

print_r($obj->getContent());
echo "<br>";

//print_r($obj->getContent());
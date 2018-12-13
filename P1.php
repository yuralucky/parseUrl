<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 9:37
 */

class P1
{
    public $url;
    public $domain;

    public function __construct($url)
    {
        $this->url=$url;
        $this->domain=parse_url($url,PHP_URL_HOST);
    }

    public function getDomain()
    {

        return $this->domain;
    }

}
//$obj=new P1('https://utka.com');
//$name= $obj->getDomain();
//echo $name;
<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.04.19
 * Time: 9:41
 */

namespace Project1;



class GetFilename implements CheckFilenameInterface
{
    public function getHost()
    {
        return parse_url('https://football.ua',PHP_URL_HOST);
    }

    public function getFileName()
    {
       $filename= str_replace('.', '_', $this->getHost());
       return $filename.'.csv';
    }

}

$obj=new GetFilename();
print $obj->getFileName();
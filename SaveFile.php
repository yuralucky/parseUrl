<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 12.12.18
 * Time: 16:10
 */

namespace Project1;


class SaveFile
{
    private $handler;

    private $url;

    private $data;



    public function save_csv( $filename,array $data)
    {

        foreach ($data as $item)
        {

            fputcsv($filename,$item);
        }
    }
}

$item=new SaveFile();
$item->save_csv('text.csv',[10,20]);
dd ($item);

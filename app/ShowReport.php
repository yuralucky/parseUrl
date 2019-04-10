<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 16:35
 */

namespace Project1;


class ShowReport
{

    /**
     * @var string
     */
    private $url;


    /**
     * ShowReport constructor.
     * @param GetFilename $url
     */
    public function __construct(GetFilename $url)
    {
        $this->url = $url;

    }

    /**
     * @return string
     *
     * Tho method open report file
     */
    public function showReport()
    {
        $handle = fopen("result/{$this->url->getFileName()}", 'r');
        if ($handle == false) {
            throw new \Exception('Sorry, enter right url');
        }
        while (($data = fgetcsv($handle, 1000)) !== false) {
            $num = count($data);
            for ($i = 0; $i < $num; $i++) {
                echo $data[$i] . "_________________________";
            }
        }

        fclose($handle);
        return '********The end';
    }


}




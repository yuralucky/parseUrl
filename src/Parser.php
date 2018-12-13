<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 13.12.18
 * Time: 9:29
 */

namespace Project1;


/**
 * Class Parser
 * @package Project1
 */
/**
 * Class Parser
 * @package Project1
 */
/**
 * Class Parser
 * @package Project1
 */
class Parser
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $file;


    /**
     * @param $url
     */
    public function parseImage($url, $file)
    {
        $content = file_get_contents($url, false);
        preg_match_all('/<img[^>]+>/i', $content, $result);
        foreach ($result[0] as $img_tag) {
            preg_match_all('/(src)=("[^"]*")/i', $img_tag, $img, PREG_SET_ORDER);
            $this->saveImageUrl($file, $img);
        }

    }

    /**
     * @param $content
     * @param $url
     */
    public function parseUrl($url)
    {
        $content = file_get_contents($url, false);
        preg_match_all('/<a href=[\"|\'](.*?)[\"|\']/is', $content, $links, PREG_SET_ORDER);
        foreach ($links as $link) {
            if ($link !== false) {
                $this->saveDataCsv($link);
            }
        }

    }

    /**
     * @param $data
     */
    public function saveDataCsv($data)
    {

        $handler = fopen('two.csv', 'w');
        foreach ($data as $item) {
            fputcsv($handler, $item, ';');
        }
        fclose($handler);
    }


    /**
     * @param string $file
     * @param array $images
     */
    public function saveImageUrl(string $file, array $images)
    {
        $g = fopen($this->file, 'w');
        foreach ($images as $image) {
            if (!empty($image)) {

                fputcsv($g, $image, ";");
            }
        }
        fclose($g);
    }

    public function showResulCsv($file)
    {
        $row = 1;
        if (($g = fopen($this->file, 'r')) !== false) {
            while (($data = fgetcsv($g, 10000, ',')) !== false) {
                $num = count($data);

            }
        }
        return $num;
    }


    /**
     * @param $url
     */
    function getContent($url='https://football.ua')
    {
        $content = file_get_contents($url, false);


    }


}

$obj = new Parser();
//$show = $obj->parseImage('https://football.ua','one.csv');
//$obj->showResulCsv('one.csv');

//$obj = new Parser();

$obj->parseUrl('https://football.ua');

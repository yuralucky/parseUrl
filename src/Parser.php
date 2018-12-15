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
     * @var string
     */
    public $domain;


    /**
     * @return string
     */

//    public function __construct($url)
//    {
//        $this->url = $this->check($url);
//    }

    public function getDomain($url)
    {
        $this->domain = parse_url($this->check($url), PHP_URL_HOST);
        return $this->domain;
    }



    /**
     *
     * @param $url
     *
     * This method save all url csv-file
     */
    public function saveParseUrl($url)
    {
        $content = file_get_contents($url, false);
        preg_match_all('/<a href=[\"|\'](.*?)[\"|\']/is', $content, $links, PREG_SET_ORDER);
        if (is_array($links)) {
            $handler = fopen("result/{$this->name($url)}.csv", 'a');
            fputcsv($handler, str_split('Url '));

            foreach ($links as $item) {
                fputcsv($handler, $item, ';');
            }
            fclose($handler);
        }
        return "result/{$this->name($url)}.csv";

    }

    /**
     * @param $url
     *
     * This method save all image csv-file
     */
    public function saveParseImageUrl($url)
    {
        $data = $this->getContent($this->check($url));
        preg_match_all('/(src)=("[^"]*")/i', $data, $img, PREG_SET_ORDER);


        if (is_array($img)) {
            $handler = fopen("result/{$this->name($url)}.csv", 'a');
            fputcsv($handler, str_split('Image '));

            foreach ($img as $item) {
                fputcsv($handler, $item, ';');
            }
            fclose($handler);
        }
        return "result/{$this->name($url)}.csv";
    }

    public function name($url)
    {
        $validFilename = str_replace('.', '_', $this->getDomain($url));
        return $validFilename;

    }


    /**
     * @param $url
     * @return string
     */
    public function check($url)
    {
        return strpos($url, 'http') === false ? "http://{$url}" : $url;
    }


    /**
     * @param $url
     *
     * return content for parse
     */

    function getContent($url)
    {
        return file_get_contents($url, false);
    }
}

//$obj = new Parser();
//$t = $obj->saveImageUrl('http://dumskaya.net');
//
//echo $t;

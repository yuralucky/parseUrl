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
     * @var bool|string
     */
    public $data;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var mixed
     */
    public $filename;

    /**
     * @return string
     */

    public function __construct($url)
    {
        $this->url = $this->check($url);
        $this->domain = $this->getDomain($url);
        $this->data = $this->getContent($url);
        $this->filename = str_replace('.', '_', $this->domain);
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
     * @return mixed
     */
    public function getDomain($url)
    {
        return $this->domain = parse_url($this->check($url), PHP_URL_HOST);
    }


    /**
     * @param $url
     * @return bool|string
     *
     *
     */
    function getContent()
    {
        return file_get_contents($this->url, false);
    }


    /**
     * @param $url
     * @return string
     */
    public function saveParseUrl()
    {
        preg_match_all('/<a href=[\"|\'](.*?)[\"|\']/is', $this->data, $links, PREG_SET_ORDER);

        if (is_array($links)) {
            $handler = fopen("result/" . "{$this->filename}" . ".csv", 'a');
            fputcsv($handler, str_split('Url '));

            foreach ($links as $item) {
                fputcsv($handler, $item, ';');
            }
            fclose($handler);
        }
        return "report/{$this->filename}.csv";

    }


    /**
     * @param $url
     * @return string
     */
    public function saveParseImageUrl()
    {
        preg_match_all('/(src)=("[^"]*")/i', $this->data, $img, PREG_SET_ORDER);

        if (is_array($img)) {
            $handler = fopen("result/" ."{$this->filename}" . ".csv", 'a');
            fputcsv($handler, array('Image :'));

            foreach ($img as $item) {
                fputcsv($handler, $item, ';');
            }
            fclose($handler);
        }
        return "result/" . "{$this->filename}" . ".csv";
    }

}


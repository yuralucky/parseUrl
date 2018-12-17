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
    private $domain;

    /**
     * @var string
     */
    private $url;

    /**
     * @var mixed
     */
    private $filename;


    public function __construct($url)
    {
        $this->url = $this->check($url);
        $this->domain = $this->getDomain($url);
        $this->filename = str_replace('.', '_', $this->domain);
    }

    /**
     * @return string
     *
     * Tho method open report file
     */
    public function report()
    {
        $handle = fopen("result/{$this->filename}.csv", 'r');
        if ($handle !== false) {
            while (($data = fgetcsv($handle, 1000)) !== false) {
                $num = count($data);
                for ($i = 0; $i < $num; $i++) {
                    echo $data[$i];
                }
            }
        }
        fclose($handle);
        return 'The end';
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
     * @return mixed|string
     */
    public function getDomain($url)
    {
        return $this->domain = parse_url($this->check($url), PHP_URL_HOST);
    }

}




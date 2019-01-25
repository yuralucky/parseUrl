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
    use CheckDomain;
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
     * Parser constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $this->check($url);
        $this->domain = $this->getDomain($url);
        $this->data = $this->getContent();
        $this->filename = str_replace('.', '_', $this->domain);
    }

    /**
     *
     * @return bool|string
     */
    function getContent()
    {
        return file_get_contents($this->url, false);
    }

    /**
     * @return string
     *
     * parse and save all links
     */
    public function saveParseUrl()
    {
        preg_match_all('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#', $this->data, $links, PREG_SET_ORDER);

        if (is_array($links)) {
            $handler = fopen("result/" . "{$this->filename}" . ".csv", 'a');
            fputcsv($handler, array('Url:******'),';');

            foreach ($links as $item) {
                fputcsv($handler, array($item[1]), ';');
            }
            fclose($handler);
        }
        return "report/{$this->filename}.csv";

    }


    /**
     * @return string
     *
     * parse and save all image
     */
    public function saveParseImageUrl()
    {
        preg_match_all('~(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)~', $this->data, $img);

        if (is_array($img)) {
            $handler = fopen("result/" . "{$this->filename}" . ".csv", 'a');
            fputcsv($handler, array('Image :*********'),';');

            foreach ($img[0] as $item) {
                fputcsv($handler, array($item), ';');
            };

            fclose($handler);
        }
        return "result/" . "{$this->filename}" . ".csv";
    }

}


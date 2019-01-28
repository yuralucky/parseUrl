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
    use CheckDomain;

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
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
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
        else {
            print 'This url not  parse . Enter command --parse <your url>';
            exit();
        }
        fclose($handle);
        return '********The end';
    }


}



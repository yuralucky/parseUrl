<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 01.04.19
 * Time: 12:53
 */

namespace Project1;
include 'GetFilename.php';
include 'Content.php';
include 'CheckDomain.php';

class ContentRepository
{
    private $content;

    private $filename;

    public function __construct(Content $content,GetFilename $filename)
    {
        $this->content=$content;
        $this->filename=$filename;
    }


    public function saveParseUrl()
    {
        preg_match_all('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#', $this->content->getContent(), $links, PREG_SET_ORDER);

        if (is_array($links)) {
            $handler = fopen("result/{$this->filename->getFileName()}.csv", 'a');
            fputcsv($handler, array('Url:******'),';');

            foreach ($links as $item) {
                fputcsv($handler, array($item[1]), ';');
            }
            fclose($handler);
        }
        return "result/{$this->filename}.csv";

    }

    public function saveParseImageUrl()
    {
        preg_match_all('~(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)~', $this->content->getContent(), $img);

        if (is_array($img)) {
            $handler = fopen("result/{$this->filename->getFileName()}.csv", 'a');
            fputcsv($handler, array('Image :*********'),';');

            foreach ($img[0] as $item) {
                fputcsv($handler, array($item), ';');
            };

            fclose($handler);
        }
        return "result/{$this->filename}.csv";
    }

}
$obj=new CheckDomain('https://habr.com/ru/post/208442/');
$con=new Content($obj);
$name=new GetFilename($obj);
$nobj=new ContentRepository($con,$name);
$nobj->saveParseUrl();

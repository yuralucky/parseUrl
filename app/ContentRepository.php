<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 01.04.19
 * Time: 12:53
 */

namespace Project1;

class ContentRepository
{
    private $content;

    private $filename;

    /**
     * ContentRepository constructor.
     * @param Content $content
     * @param GetFilename $filename
     */
    public function __construct(Content $content, GetFilename $filename)
    {
        $this->content = $content;
        $this->filename = $filename;
    }

    /**
     * @return GetFilename
     */
    public function getFilename(): GetFilename
    {
        return $this->filename;
    }


    /**
     * @return string
     */
    public function saveParseUrl(): string
    {
        preg_match_all('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#', $this->content->getContent(), $links, PREG_SET_ORDER);

        if (is_array($links)) {
            $handler = fopen("result/{$this->filename}.csv", 'a');
            fputcsv($handler, array('Url:******'), ';');

            foreach ($links as $item) {
                fputcsv($handler, array($item[1]), ';');
            }
            fclose($handler);
        }
        return "result/{$this->filename}.csv";

    }

    public function saveParseImageUrl(): string
    {
        preg_match_all('~(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)~', $this->content->getContent(), $img);

        if (is_array($img)) {
            $handler = fopen("result/{$this->filename->getFileName()}.csv", 'a');
            fputcsv($handler, array('Image :*********'), ';');

            foreach ($img[0] as $item) {
                fputcsv($handler, array($item), ';');
            };

            fclose($handler);
        }
        return "result/{$this->filename}.csv";
    }

}
//
//$url = new CheckDomain('https://dumskaya.net/');
////
//$obj = new Content($url);
////$obj=new CheckDomain('https://habr.com/ru/post/208442/');
////$con=new Content(new CheckDomain('https://habr.com/ru/post/208442/'));
//
////var_dump($con);
//$name=new GetFilename($url);
//$nobj=new ContentRepository($obj,$name);
//print_r ($nobj->getFilename());

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

    public function __construct(Content $content)
    {
        $this->content=$content;
    }

    public function saveParseUrl()
    {
        preg_match_all('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#', $this->content->getContent(), $links, PREG_SET_ORDER);

        if (is_array($links)) {
            $handler = fopen("result/test.csv", 'a');
            fputcsv($handler, array('Url:******'),';');

            foreach ($links as $item) {
                fputcsv($handler, array($item[1]), ';');
            }
            fclose($handler);
        }
        return "report/test.csv";

    }

}
$con=new Content('https://odessa.online/odessa-gask-oshtrafoval-narushitelej-na-245-tysyach-griven/');
$obj=new ContentRepository($con);
$obj->saveParseUrl();

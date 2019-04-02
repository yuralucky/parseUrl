<?php
/**
 * Created by PhpStorm.
 * User: yura
 * Date: 02.04.19
 * Time: 11:43
 */

namespace Project1;


class ImageRepository
{
    private $content;

    /**
     * ImageRepository constructor.
     * @param Content $content
     */
    public function __construct(Content $content )
    {
        $this->content=$content;
    }

    /**
     * @return string
     */
    public function saveParseImage()
    {
        preg_match_all('~(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)~', $this->content->getContent(), $links, PREG_SET_ORDER);

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
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
     * @return string
     *
     * output filename
     */
    public function getCsv()
    {
        return "Save all image and URL into-> {$this->filename->getFileName()}";
    }


    /**
     * @return string
     *
     * save  all url into csv
     */
    public function saveParseUrl(): string
    {
        if (empty($this->content->getContent())) {
            throw  new \Exception('Unable to extract content. Enter the correct url');

        } else {
            preg_match_all
            ('#((http(s)?(\:\/\/))+(www\.)?([\w\-\.\/])*(\.[a-zA-Z]{2,3}\/?))[^\s\b\n|]*[^.,;:\?\!\@\^\$ -]#',
                $this->content->getContent(), $links, PREG_SET_ORDER);

            if (is_array($links)) {
                $handler = fopen("result/{$this->filename->getFileName()}", 'a');
                fputcsv($handler, array('.......URL.......... '), ';');

                foreach ($links as $item) {
                    fputcsv($handler, array($item[1]), ';');
                }
                fclose($handler);
            }
        }
        return false;

    }

    /**
     * @return string
     *
     * save all image into csv
     */
    public function saveParseImageUrl(): string
    {
        preg_match_all('~(http(s?):)([/|.|\w|\s|-])*\.(?:jpg|gif|png)~', $this->content->getContent(), $img);

        if (is_array($img)) {
            $handler = fopen("result/{$this->filename->getFileName()}", 'a');
            fputcsv($handler, array('.......IMAGE.......... '), ';');

            foreach ($img[0] as $item) {
                fputcsv($handler, array($item), ';');
            };

            fclose($handler);
        }
        return false;
    }

}

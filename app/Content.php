<?php


namespace Project1;

class Content
{

    private $url;

    /**
     * Content constructor.
     * @param CheckDomain $url
     */
    public function __construct(CheckDomain $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     *
     * get content from URL
     */
    public function getContent(): string
    {
        $content = file_get_contents($this->url->getRightUrl(), false);

        return $content;
    }
}

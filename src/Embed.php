<?php

namespace gist_it_php;

/**
 * Class with methods for template view pattern
 *
 */
class Embed
{

    private const EMBED_VIEW = 'embed';
    private const CODE_VIEW  = 'code';
    private const META_VIEW  = 'meta';

    /**
     * @var RequestFile
     */
    private $request_file;

    public function __construct(RequestFile $request_file)
    {

        $this->request_file = $request_file;
    }

    public function getEmbedCode():string
    {

        $view = new View(self::EMBED_VIEW, $this);

        return $view->parse();
    }

    public function getCode():string
    {

        $view = new View(self::CODE_VIEW, $this);

        return $view->parse();
    }

    public function getMeta():string
    {

        $view = new View(self::META_VIEW, $this);

        return $view->parse();
    }

    public function getSource():string
    {

        return $this->request_file->getSource();
    }

    public function getRawUrl():string
    {

        return $this->request_file->getRawUrl();
    }

    public function getBlobUrl():string
    {

        return $this->request_file->getBlobUrl();
    }

    public function getGutter():string
    {

        $line_number = $this->request_file->getFileLineNumber() + 1;

        $gutter = '';
        for ($i = 1; $i <= $line_number; $i++) {
            $gutter .= $i . '<br />';
        }

        return $gutter;
    }

    public function getFileName():string
    {

        return $this->request_file->getFileName();
    }

    public function getHost():string
    {

        $protocol = (443 === $_SERVER[ 'SERVER_PORT' ]) ? 'https' : 'http';
        $domain   = $_SERVER[ 'HTTP_HOST' ];

        return "{$protocol}://{$domain}";
    }
}

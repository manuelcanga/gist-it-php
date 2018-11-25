<?php

namespace gist_it_php;

/**
 * Class with methods for template view pattern
 *
 */
class Embed
{

    /**
     * @var RequestFile
     */
    private $request_file;

    public function __construct(RequestFile $request_file)
    {

        $this->request_file = $request_file;
    }

    public function getCode():string
    {

        $view = new View('code', $this);

        return $view->parse();
    }

    public function getMeta():string
    {

        $view = new View('meta', $this);

        return $view->parse();
    }

    public function get(): string {
        $view = new View('embed', $this);

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

    public function getGutter(): string
    {
        $line_number = $this->request_file->getFileLineNumber();

        $gutter = '';
        for ($i = 0; $i < $line_number; $i++) {
            $gutter .= $i.'<br />';
        }

        return $gutter;
    }

    public function getFileName():string
    {

        return $this->request_file->getFileName();
    }

    public function getHost():string
    {

        $protocol = ( 443 === $_SERVER[ 'SERVER_PORT' ] ) ? 'https' : 'http';
        $domain   = $_SERVER[ 'HTTP_HOST' ];

        return "{$protocol}://{$domain}";
    }
}

<?php

namespace gist_it_php;

class Template
{

    /**
     * @var RequestFile
     */
    private $request;

    public function __construct(RequestFile $request)
    {

        $this->request = $request;
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

    public function getSource():string
    {

        return $this->request->getSource();
    }

    public function getRawUrl():string
    {

        return $this->request->getRawUrl();
    }

    public function getBlobUrl():string
    {

        return $this->request->getBlobUrl();
    }

    public function getGutter(): string
    {
        $line_number = $this->request->getFileLineNumber();

        $gutter = '';
        for ($i = 0; $i < $line_number; $i++) {
            $gutter .= $i.'<br />';
        }

        return $gutter;
    }

    public function getFileName():string
    {

        return $this->request->getFileName();
    }

    public function getHost():string
    {

        $protocol = ( 443 === $_SERVER[ 'SERVER_PORT' ] ) ? 'https' : 'http';
        $domain   = $_SERVER[ 'HTTP_HOST' ];

        return "{$protocol}://{$domain}";
    }
}

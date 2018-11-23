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

    public function getCode(): string
    {

        $view = new View('code', $this);

        return $view->parse();
    }

    public function getMeta(): string
    {

        $view = new View('meta', $this);

        return $view->parse();
    }


    public function getSource(): string
    {

        $source = file_get_contents($this->getRawUrl())?: '';

        return $this->sanitize_source( $source );
    }

    private function sanitize_source( string $source ): string {
        $source = addslashes( $source );

        return htmlentities( $source, ENT_QUOTES | ENT_IGNORE, "UTF-8" );
    }

    public function getRawUrl(): string
    {
        return $this->request->getServiceUrl('raw');
    }

    public function getBlobUrl(): string
    {
        return $this->request->getServiceUrl('blob');
    }

    public function getFileName(): string
    {
        return $this->request->getFileName();
    }

    public function getHost(): string
    {
        $protocol = ( 443 === $_SERVER['SERVER_PORT'])? 'https' : 'http';
        $domain = $_SERVER['HTTP_HOST'];

        return "{$protocol}://{$domain}";
    }
}

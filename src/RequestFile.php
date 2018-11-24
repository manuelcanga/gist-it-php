<?php

namespace gist_it_php;

use function substr_count;

class RequestFile
{

    private const SERVICE_DOMAIN = "https://github.com/";

    private $user;
    private $repository;
    private $branch;
    private $filepath;
    private $filename;
    private $source      = '';
    private $line_number = 0;

    public function __construct(
        string $user,
        string $repository,
        string $branch,
        string $filepath,
        string $filename
    ) {

        $this->user       = $user;
        $this->repository = $repository;
        $this->branch     = $branch;
        $this->filepath   = $filepath;
        $this->filename   = $filename;
    }

    public function getUser():string
    {

        return $this->user;
    }

    public function getRepository():string
    {

        return $this->repository;
    }

    public function getBranch():string
    {

        return $this->branch;
    }

    public function getFilePath():string
    {

        return $this->filepath;
    }

    public function getFileName():string
    {

        return $this->filename;
    }

    public function getRawUrl():string
    {

        return $this->getUrl('raw');
    }

    public function getBlobUrl():string
    {

        return $this->getUrl('blob');
    }

    public function getUrl(string $type = 'blob'):string
    {

        $subpath = "{$this->user}/{$this->repository}/{$type}/{$this->branch}/{$this->filepath}";

        return self::SERVICE_DOMAIN . $subpath;
    }

    public function getFileLineNumber():string
    {

        if ($this->line_number) {
            return $this->line_number;
        }

        $source = $this->getSource();

        return $this->line_number = substr_count($source, "\n");
    }

    public function getSource():string
    {

        if ($this->source) {
            return $this->source;
        }

        $source = file_get_contents($this->getUrl('raw')) ?: '';

        return $this->source = $this->sanitizeSource($source);
    }

    private function sanitizeSource(string $source):string
    {

        $source = addslashes($source);

        return htmlentities($source, ENT_QUOTES | ENT_IGNORE, "UTF-8");
    }
}

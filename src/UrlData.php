<?php

namespace gist_it_php;

class UrlData {

    private $user;
    private $repository;
    private $branch;
    private $filepath;
    private $filename;

    public function __construct(
        string $user, string $repository, string $branch, string $filepath, string $filename
    ) {

        $this->user       = $user;
        $this->repository = $repository;
        $this->branch     = $branch;
        $this->filepath   = $filepath;
        $this->filename   = $filename;
    }

    public function getUser():string {

        return $this->user;
    }

    public function getRepository():string {

        return $this->repository;
    }

    public function getBranch():string {

        return $this->branch;
    }

    public function getFilePath():string {

        return $this->filepath;
    }

    public function getFileName():string {

        return $this->filename;
    }
}

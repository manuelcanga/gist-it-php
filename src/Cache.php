<?php

namespace gist_it_php;

class Cache
{

    private const _PATH_ = _APP_ . '/tmp/cache';
    /**
     * @var string
     */
    private $file = '';

    public static function fromRequestFIle(RequestFile $request_file):self
    {

        $cache_id = \md5($request_file->getRawUrl());

        return new self($cache_id);
    }

    public function __construct(string $cache_id)
    {

        $this->file = self::_PATH_ . '/' . $cache_id;
    }

    public function exists():bool
    {

        return \file_exists($this->file);
    }

    public function get():string
    {

        if ($this->exists()) {
            return \file_get_contents($this->file);
        }

        return '';
    }

    public function save(string $cache)
    {

        return \file_put_contents($this->file, $cache);
    }
}

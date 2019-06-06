<?php

namespace gist_it_php;

class Cache
{

    private const _PATH_ = _APP_ . '/tmp/cache';
    /**
     * @var string
     */
    private $file = '';

    /**
     * Named construct. Instance a cache from a RequestFile.
     *
     * @param RequestFile $request_file
     *
     * @return Cache
     */
    public static function fromRequestFIle(RequestFile $request_file):self
    {

        $cache_id = \md5($request_file->getRawUrl());

        return new self($cache_id);
    }

    public function __construct(string $cache_id)
    {

        $this->file = self::_PATH_ . '/' . $cache_id;
    }

    /**
     * Check if cache exists.
     *
     * @return bool
     */
    public function exists():bool
    {

        return \file_exists($this->file);
    }

    /**
     * Retrieve cache.
     *
     * @return string
     */
    public function get():string
    {

        if ($this->exists()) {
            return \file_get_contents($this->file);
        }

        return '';
    }

    /**
     * Save a content as cache.
     *
     * @param string $content_for_caching
     *
     * @return bool|int
     */
    public function save(string $content_for_caching)
    {

        return \file_put_contents($this->file, $content_for_caching);
    }
}

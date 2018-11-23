<?php

namespace gist_it_php;

/**
 * Transform url
 * Class Url
 */
class UrlParser
{

    /**
     * @var string
     */
    private const PATH_SEPARATOR = '/';

    /**
     * @var string
     */
    private $url;

    public function __construct(string $url)
    {

        $this->url = $this->sanitizeUrl($url);
    }

    private function sanitizeUrl(string $url):string
    {

        $url = \parse_url($url, PHP_URL_PATH);
        $url = \strip_tags($url);

        return $url;
    }

    /**
     * Named constructor using current url.
     *
     * @return UrlParser
     */
    public static function fromCurrentUrl():self
    {

        return new UrlParser($_SERVER[ 'REQUEST_URI' ]??'');
    }

    public function extractRequest():Request
    {

        $url_path = array_filter(\explode(self::PATH_SEPARATOR, $this->url));

        return $this->createRequest(...$url_path);
    }

    private function createRequest(
        string $user,
        string $repository,
        string $output,
        string $branch,
        string ...$splited_filepath
    ):Request {

        $filepath = implode(self::PATH_SEPARATOR, $splited_filepath);
        $filename = end($splited_filepath);

        return new Request($user, $repository, $branch, $filepath, $filename);
    }

    public function getUrl():string
    {

        return $this->url;
    }
}

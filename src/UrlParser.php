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

    public function getRequestFile():RequestFile
    {

        $url_path = array_filter(\explode(self::PATH_SEPARATOR, $this->url));

        return $this->extractRequestFile(...$url_path);
    }

    private function extractRequestFile(
        string $user,
        string $repository,
        string $output,
        string $branch,
        string ...$splited_filepath
    ):RequestFile {

        $filepath = implode(self::PATH_SEPARATOR, $splited_filepath);
        $filename = end($splited_filepath);

        return new RequestFile($user, $repository, $branch, $filepath, $filename);
    }

    public function getUrl():string
    {

        return $this->url;
    }
}

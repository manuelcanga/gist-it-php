<?php

namespace gist_it_php;

const _APP_ = __DIR__;

require(_APP_ . '/src/Cache.php');
require(_APP_ . '/src/UrlParser.php');
require(_APP_ . '/src/RequestFile.php');
require(_APP_ . '/src/Template.php');
require(_APP_ . '/src/View.php');

$request_file = UrlParser::fromCurrentUrl()->getRequestFile();

$cache = Cache::fromRequestFIle($request_file);

if (! $cache->exists()) {
    $template = new Template($request_file);

    $view = new View('embed', $template);

    $content = $view->parse();

    $cache->save($content);
} else {
    $content = $cache->get();
}

echo $content;

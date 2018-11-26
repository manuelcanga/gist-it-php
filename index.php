<?php

namespace gist_it_php;

const _APP_ = __DIR__;

require(_APP_ . '/src/Cache.php');
require(_APP_ . '/src/UrlParser.php');
require(_APP_ . '/src/RequestFile.php');
require(_APP_ . '/src/Embed.php');
require(_APP_ . '/src/View.php');

$request_file = UrlParser::fromCurrentUrl()->getRequestFile();

$cache = Cache::fromRequestFIle($request_file);

if ($cache->exists()) {
    $embed_code = $cache->get();
} else {
    $embed = new Embed($request_file);

    $embed_code = $embed->getEmbedCode();
}

echo $embed_code;

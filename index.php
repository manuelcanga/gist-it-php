<?php

const _APP_= __DIR__;

require(_APP_.'/src/UrlParser.php');
require( _APP_ . '/src/RequestFile.php' );
require(_APP_.'/src/Template.php');
require(_APP_.'/src/View.php');

use gist_it_php\{Template, View, RequestFile, UrlParser};

$url_data = UrlParser::fromCurrentUrl()->getRequestFile();

$template = new Template($url_data);

$view = new View('embed', $template);

echo $view->parse();

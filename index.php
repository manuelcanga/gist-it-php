<?php

const _APP_= __DIR__;

require(_APP_.'/src/UrlParser.php');
require(_APP_.'/src/Request.php');
require(_APP_.'/src/Template.php');
require(_APP_.'/src/View.php');

use gist_it_php\{Template, View, Request, UrlParser};

$url_data = UrlParser::fromCurrentUrl()->extractRequest();

$template = new Template($url_data);

$view = new View('embed', $template);

echo $view->parse();

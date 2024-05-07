<?php

require_once __DIR__.'/../app/autoload.php';

$app = new App;
# The boolean parameter in the start method define which will be the url parse type (true->htaccess; false->request_uri)
$app->start(false);
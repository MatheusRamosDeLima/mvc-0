<?php

require_once '../app/autoload.php';

$app = new App;
# The boolean parameter in the start method define which will be the url parse type (true->htaccess; false->require_uri)
$app->start(false);
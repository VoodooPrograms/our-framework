<?php

declare(strict_types=1)

spl_autoload_register( function ($path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (file_exists(get_include_path()."${path}.php")) {
        require_once("${path}.php");
    }
});

use Ourframework\Core\App;

App::run();
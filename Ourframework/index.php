<?php

declare(strict_types=1);

/*
 * These part will be changed to Autoload class, maybe Composer autoload.
 * For now everyone should create class in namespaces that reflect directory structure
 */
set_include_path(dirname(getcwd()).DIRECTORY_SEPARATOR);

spl_autoload_register(function ($path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (file_exists(get_include_path()."${path}.php")) {
        require_once("${path}.php");
    }
});

use Ourframework\Core\App;

App::run();

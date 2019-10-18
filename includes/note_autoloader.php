<?php
/**
 * original source: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md#class-example
 */
spl_autoload_register(function ($class) {
    $prefix = 'TinyMCE_Button\\';
    $baseDir = plugin_dir_path(dirname(__FILE__)) . 'src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
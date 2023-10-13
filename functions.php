<?php

// No need to edit this file
// Just add PHP files to /functions/ folder and this will detect'm

$functions_dir = get_template_directory() . '/functions/';

if (is_dir($functions_dir)) {
    $files = scandir($functions_dir);

    foreach ($files as $file) {
        $path = $functions_dir . $file;
        
        if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            require_once $path;
        }
    }
}

<?php

// Dynamically register all blocks in folder /acf-blocks/
function findBlocks() {
	// Scan all subfolders of 'acf-blocks'
	$path = dirname(__FILE__) . '/../acf-blocks/';
	function getDirectChildFolders($path) {
		$folders = [];
		$items = scandir($path);
	
		foreach ($items as $item) {
			if ($item !== '.' && $item !== '..' && is_dir($path . $item)) {
				$folders[] = $item;
			}
		}
	
		return $folders;
	}
	
	$childFolders = getDirectChildFolders($path);
	
	// Register blocks for each folder found
	foreach ($childFolders as $folder) {
		register_block_type_from_metadata( $path . $folder . '/block.json');
	}
}
add_action( 'init', 'findBlocks' );

// Dynamically register all JS files in folder /acf-blocks/
function findJSFiles($path) {
    $jsFiles = [];

    // Check if the provided path is a directory
    if (is_dir($path)) {
        $dirContents = scandir($path);

        foreach ($dirContents as $item) {
            if ($item !== '.' && $item !== '..') {
                $itemPath = $path . '/' . $item;

                if (is_file($itemPath) && pathinfo($itemPath, PATHINFO_EXTENSION) === 'js') {
                    $jsFiles[] = pathinfo($itemPath, PATHINFO_FILENAME);
                } elseif (is_dir($itemPath)) {
                    $jsFiles = array_merge($jsFiles, findJSFiles($itemPath));
                }
            }
        }
    }

    return $jsFiles;
}

// Dynamically enqueue all JS files in folder /acf-blocks/
function enqueueJSFiles() {
    $path = get_template_directory_uri() . '/acf-blocks/'; // Use template directory URI
    $jsFiles = findJSFiles(get_template_directory() . '/acf-blocks/'); // Use absolute path

    foreach ($jsFiles as $file) {
        $file_path = $path . '/' . $file . '/' . $file . '.js';
        wp_register_script($file, $file_path, array(), null, true);
        wp_enqueue_script($file); // Enqueue the script
    }
}
add_action('wp_enqueue_scripts', 'enqueueJSFiles');
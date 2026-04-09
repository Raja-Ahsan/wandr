<?php

declare(strict_types=1);

/**
 * imdhemy/* uses PHP 8.3 typed class constants; strip types for PHP 8.2.
 * Runs from Composer pre-autoload-dump so patches apply before package:discover.
 */

$imdhemyRoot = dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'imdhemy';

if (! is_dir($imdhemyRoot)) {
    exit(0);
}

$replacements = [
    'public const string ' => 'public const ',
    'private const string ' => 'private const ',
    'protected const string ' => 'protected const ',
    'public const int ' => 'public const ',
    'private const int ' => 'private const ',
    'protected const int ' => 'protected const ',
];

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($imdhemyRoot, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if ($file->getExtension() !== 'php') {
        continue;
    }
    $path = $file->getPathname();
    $content = file_get_contents($path);
    if ($content === false) {
        continue;
    }
    $new = str_replace(array_keys($replacements), array_values($replacements), $content);
    if ($new !== $content) {
        file_put_contents($path, $new);
    }
}

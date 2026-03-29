<?php

(function () {
    $dropinSource = dirname(__DIR__) . '/public/wp-content/mu-plugins/sqlite-database-integration/db.copy';

    if (! file_exists($dropinSource)) {
        throw new RuntimeException('SQLite database integration DB dropin file does not exists - did you run "composer install"?');
    }

    $contents = file_get_contents($dropinSource);

    if (false === $contents) {
        throw new RuntimeException('Unable to read SQLite database integration DB dropin file');
    }

    $prepared = str_replace(
        ['{SQLITE_IMPLEMENTATION_FOLDER_PATH}', '{SQLITE_PLUGIN}'],
        [dirname(__DIR__) . '/public/wp-content/mu-plugins/sqlite-database-integration', 'sqlite-database-integration/load.php'],
        $contents,
    );

    $dropinDestination = dirname(__DIR__) . '/public/wp-content/db.php';

    $success = file_put_contents(dirname(__DIR__) . '/public/wp-content/db.php', $prepared);

    if (false === $success) {
        throw new RuntimeException("Unable to write DB dropin to {$dropinDestination}");
    }
})();

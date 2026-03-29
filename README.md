# wp-sqlite-starter

Get a local WordPress environment up and running quickly with Composer and SQLite.

## Usage

Installation is demonstrated below with WP-CLI but you can just as easily make manual updates to `composer.json` and `public/wp-config.php`, configure and start your server, and run the standard web installer.

```shell
$ composer create-project ssnepenthe/wp-sqlite-starter /path/to/project
```

It is important to update salts before going any further:

```shell
$ wp config shuffle-salts
```

Optionally you may want to make some other updates to your site config. For example:

 * `WP_SQLITE_AST_DRIVER` can be used to enable the new AST-based SQLite driver.
 * `SQLITE_JOURNAL_MODE` can be used to set the SQLite journal mode.
 * `WP_DEBUG` can be used enable debug mode. When set to `true` the default `wp-config.php` file will also set `WP_DEBUG_LOG`, `SAVEQUERIES`, `WP_DEBUG_DISPLAY`, `WP_DISABLE_FATAL_ERROR_HANDLER`, and `SCRIPT_DEBUG`.

```shell
$ wp config set WP_SQLITE_AST_DRIVER true --raw
$ wp config set SQLITE_JOURNAL_MODE WAL
$ wp config set WP_DEBUG true --raw
```

Run the WordPress installer and enable pretty permalinks (substitute your preferred permalink structure):

```shell
$ wp core install --url=localhost:8080 --title='My Title' --admin_user=admin --admin_email=admin@example.com --skip-email
$ wp rewrite structure /%postname%/
```

And finally start the server:

```shell
$ wp server
```

## Notes

* If you need to modify the host or port to the install and server commands above, make sure to update the `WP_HOME`, `WP_SITEURL`, and `WP_CONTENT_URL` constants in `public/wp-config.php`.
* It can be beneficial to run the WP-CLI server with multiple workers: `PHP_CLI_SERVER_WORKERS=4 wp server`
* For the moment, all composer dependencies are installed with the loosest version constraint (`*`). This will likely change in the future as this repo is finalized. In the meantime, you may wish to modify the version constraints in `composer.json` before running `composer install`.
# wp-sqlite-starter

Get a local WordPress environment up and running quickly with SQLite.

## Usage

Installation is demonstrated below with WP-CLI but you can just as easily make manual updates to `composer.json` and `public/wp-config.php`, configure and start your server, and run the standard web installer.

```shell
$ cd ~/my-projects-dir
$ git clone https://github.com/ssnepenthe/wp-sqlite-starter my-project
$ cd my-project
$ composer config name 'my-vendor/my-project'
$ composer install
$ wp config shuffle-salts
# The user password will automatically be generated for you.
# OPTIONALLY: specify the password with --admin_password=password or use --prompt=admin_password and input a password when prompted.
$ wp core install --url=localhost:8080 --title='My Title' --admin_user=admin --admin_email=admin@example.com --skip-email
# Sub in your preferred permalink structure.
$ wp rewrite structure /%postname%/
$ wp server
```

## Notes

* If you need to modify the host or port to the install and server commands above, make sure to update the `WP_HOME`, `WP_SITEURL`, and `WP_CONTENT_URL` constants in `public/wp-config.php`.
* It can be beneficial to run the WP-CLI server with multiple workers: `PHP_CLI_SERVER_WORKERS=4 wp server`
* For the moment, all composer dependencies are installed with the loosest version constraint (`*`). This will likely change in the future as this repo is finalized. In the meantime, you may wish to modify the version constraints in `composer.json` before running `composer install`.
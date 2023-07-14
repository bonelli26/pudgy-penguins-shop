<?php
/****************************************************
 * This is the configuration file,
 * the only necessary Prismic change is the repository
 * URL, other changes are optional
 ****************************************************/

/*
 * Change this for the URL of your repository
 */
define("CONTENT_URL", "https://pudgypenguinsshop.cdn.prismic.io/api/v2");
define("CONTENT_TOKEN", "MC5aTEJ2SGhJQUFDSUFiQ0ZJ.77-9VO-_ve-_ve-_vR3vv73vv73vv73vv71SSB_vv73vv73vv70KV--_vT7vv71e77-9Dxrvv73vv73vv70C77-9aTw");

/*
 * Webhook Secret
 *  - Generate a 32-bit string for this
 *	- go here: https://randomkeygen.com/
 *  - scroll down to "CodeIgniter Encryption Keys", select one
 *  - make sure to add secret to the webhook on prismic
 */
define("PRISMIC_WEBHOOK_SECRET", "uKL4JsyFYxcA3jQn8eRBZfuTo6UQI5XZ");

/*
 * Your site metadata
 */
define("SITE_TITLE", "Pudgy Penguins Shop");
define("SITE_DESCRIPTION", "Pudgy Penguins Shop Web");

/*
 * Set to true to display error details
 */
define("DISPLAY_ERROR_DETAILS", true);

/*
 * Cache Settings
 */
define("ENABLE_CACHE", true);
define("FILE_CACHE", __DIR__ . "/cache/");

if(!file_exists(FILE_CACHE)){
	mkdir(FILE_CACHE, 775);
	chmod(FILE_CACHE, 0775);
}

/*
 * Protocols
 */
$protocol = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" || $_SERVER["SERVER_PORT"] == 443) ? "https://" : "http://";
define("PROTOCOL", $protocol);
define("HOST", $_SERVER["HTTP_HOST"]);
define("URI", $_SERVER["REQUEST_URI"]);
define("SITE_DOMAIN", PROTOCOL . HOST);

/*
 * Site Salt
 *  - Generate a 32-bit string for this
 *	- go here: https://randomkeygen.com/
 *  - scroll down to "CodeIgniter Encryption Keys", select one
 */
define("SALT", "stPf1iAlPGvj0IvnI56WxsGM6CvF0yXg");

/*
 * Klaviyo
 */
// define("KLAVIYO_API_KEY", "pk_c7b6fc81883e4481f2a306e722e3d39105");

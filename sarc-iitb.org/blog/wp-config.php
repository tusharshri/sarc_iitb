<?php
/** WordPress's config file **/
/** http://wordpress.org/   **/

// ** MySQL settings ** //
define('DB_NAME', 'sarc_iitb_org_1');     // The name of the database
define('DB_USER', 'sarciitborg1');     // Your MySQL username
define('DB_PASSWORD', 'LhfWKZbc'); // ...and password
define('DB_HOST', 'mysql.sarc-iitb.org');     // ...and the server MySQL is running on


/*define('DB_NAME', 'sarc_iitb_org_1');     // The name of the database
define('DB_USER', 'root');     // Your MySQL username
define('DB_PASSWORD', 'root'); // ...and password
define('DB_HOST', 'localhost');     // ...and the server MySQL is running on
*/
// Change the prefix if you want to have multiple blogs in a single database.

$table_prefix  = 'wp_fk0j4k_';   // example: 'wp_' or 'b2' or 'mylogin_'

// Turning off Post Revisions. Comment this line out if you would like them to be on.

define('WP_POST_REVISIONS', false );

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-includes/languages.
// For example, install de.mo to wp-includes/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', '');

/* Stop editing */

$server = DB_HOST;
$loginsql = DB_USER;
$passsql = DB_PASSWORD;
$base = DB_NAME;

define('ABSPATH', dirname(__FILE__).'/');

// Get everything else
require_once(ABSPATH.'wp-settings.php');
?>

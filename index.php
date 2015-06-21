<?php

/*
 * Bludit
 * http://www.bludit.com
 * Author Diego Najar
 * All Bludit code is released under the GNU General Public License.
*/

// Check installation
if( !file_exists('content/databases/site.php') )
{
	header('Location:./install.php');
	exit('<a href="./install.php">First, install Bludit</a>');
}

// DEBUG:
$loadTime = microtime(true);

// Security constant
define('BLUDIT', true);

// Directory separator
define('DS', DIRECTORY_SEPARATOR);

// PHP paths
define('PATH_ROOT', __DIR__.DS);
define('PATH_BOOT',	PATH_ROOT.'kernel'.DS.'boot'.DS);

// Init
require(PATH_BOOT.'init.php');

// Admin area
if($Url->whereAmI()==='admin')
{
	require(PATH_BOOT.'admin.php');
}
// Site
else
{
	require(PATH_BOOT.'site.php');
}

// DEBUG:
// Print all variables/objects
//print_r(get_defined_vars());

//var_dump($_SESSION);
//var_dump($Login->fingerPrint());

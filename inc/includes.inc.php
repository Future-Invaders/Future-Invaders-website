<?php /***************************************************************************************************************/
/*                                                                                                                   */
/*                            THIS PAGE CAN ONLY BE RAN IF IT IS INCLUDED BY ANOTHER PAGE                            */
/*                                                                                                                   */
// Include only /*****************************************************************************************************/
if(substr(dirname(__FILE__),-8).basename(__FILE__) === str_replace("/","\\",substr(dirname($_SERVER['PHP_SELF']),-8).basename($_SERVER['PHP_SELF']))) { exit(header("Location: ./../404")); die(); }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// These files should be included in every single page of the website
// It is more convenient to include one file (this one) which will then proceed to include all other files

include_once "settings.inc.php";           # Global settings, the local configuration is imported within this file
include_once "sql.inc.php";                # Initializes the connexion to MySQL
include_once "sanitization.inc.php";       # Functions related to data sanitization
include_once "users.inc.php";              # User related stuff
include_once $path."lang/common.lang.php"; # Translations of strings required for the other included pages
include_once "functions_common.inc.php";   # Common functions required by most pages
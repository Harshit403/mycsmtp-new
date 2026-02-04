<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined("APP_NAMESPACE") || define("APP_NAMESPACE", "App");

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined("COMPOSER_PATH") ||
    define("COMPOSER_PATH", ROOTPATH . "vendor/autoload.php");

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined("SECOND") || define("SECOND", 1);
defined("MINUTE") || define("MINUTE", 60);
defined("HOUR") || define("HOUR", 3600);
defined("DAY") || define("DAY", 86400);
defined("WEEK") || define("WEEK", 604800);
defined("MONTH") || define("MONTH", 2_592_000);
defined("YEAR") || define("YEAR", 31_536_000);
defined("DECADE") || define("DECADE", 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined("EXIT_SUCCESS") || define("EXIT_SUCCESS", 0); // no errors
defined("EXIT_ERROR") || define("EXIT_ERROR", 1); // generic error
defined("EXIT_CONFIG") || define("EXIT_CONFIG", 3); // configuration error
defined("EXIT_UNKNOWN_FILE") || define("EXIT_UNKNOWN_FILE", 4); // file not found
defined("EXIT_UNKNOWN_CLASS") || define("EXIT_UNKNOWN_CLASS", 5); // unknown class
defined("EXIT_UNKNOWN_METHOD") || define("EXIT_UNKNOWN_METHOD", 6); // unknown class member
defined("EXIT_USER_INPUT") || define("EXIT_USER_INPUT", 7); // invalid user input
defined("EXIT_DATABASE") || define("EXIT_DATABASE", 8); // database error
defined("EXIT__AUTO_MIN") || define("EXIT__AUTO_MIN", 9); // lowest automatically-assigned error code
defined("EXIT__AUTO_MAX") || define("EXIT__AUTO_MAX", 125); // highest automatically-assigned error code

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_LOW instead.
 */
define("EVENT_PRIORITY_LOW", 200);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_NORMAL instead.
 */
define("EVENT_PRIORITY_NORMAL", 100);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_HIGH instead.
 */
define("EVENT_PRIORITY_HIGH", 10);

defined("PUBLIC_PATH") || define("PUBLIC_PATH", ROOTPATH . "public");

define("APP_NAME", "MY CS MTP");

// define('EMAIL_ID', 'donotreply@mycsmtp.com');//enter your email address
// define('EMAIL_PASSWORD', 'Ankit+123.');//enter your password
// define('SMTP_HOST', 'mail.mycsmtp.com');
// define('SMTP_PORT',  587);
// define('FROM_NAME', 'donotreply@mycsmtp.com');//Enter your email from name

define("EMAIL_ID", "mycsmtp.com@gmail.com"); //enter your email address
define("EMAIL_PASSWORD", "hjqillbkgguomvje"); //enter your password
define("SMTP_HOST", "smtp.googlemail.com");
define("SMTP_PORT", 587);
define("FROM_NAME", "mycsmtp.com@gmail.com");

// UPI PAYMENT TAKEN HANDLED
define("UPI_ID", "anks.its@okicici"); //enter your UPI ID
define("UPI_AC_NAME", "MY CS MTP"); //enter your UPI ACCOUNT NAME

define("EXAM_DATE", "2026-06-01");

// Cashfree payment info test
// define("SERVER_URL", "https://sandbox.cashfree.com");
// define("CLIENT_ID", "TEST102720515bc4bf412a308d5db20d15027201");
// define("SECRET_KEY", "cfsk_ma_test_aa9a83e2f082dfe28190fa75ad6a98bf_c620806f");
// define("API_VERSION", "2023-08-01");
// define("CASHFREE_MODE", "sandbox");

// Cashfree payment info prod
define('SERVER_URL', 'https://api.cashfree.com');
define('CLIENT_ID', '7299161820a2a8db2fb34e593e619927');
define('SECRET_KEY', 'cfsk_ma_prod_969dc5231ba591f2f6167dc2c15ed4bf_4c81e390');
define('API_VERSION', '2023-08-01');

// gateway
// define('PAYMENTGATEWAY', 'PHONEPE');
define("PAYMENTGATEWAY", "CASHFREE");

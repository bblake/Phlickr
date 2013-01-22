<?php

/**
 * Runner for all tests.
 *
 * To run all test suite (assuming the Phlickr installation is in the include path)
 * run "phpunit Phlickr_Tests_AllTests"
 *
 * @version $Id$
 * @copyright 2005
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', '_Tests_AllTests::main');
}

require_once dirname(__FILE__) . 'PHPUnit/Framework/TestSuite.php';
require_once dirname(__FILE__) . 'PHPUnit/TextUI/TestRunner.php';

// sub-directories
require_once dirname(__FILE__) . '/Tests/Online/AllTests.php';
require_once dirname(__FILE__) . '/Tests/Offline/AllTests.php';


class Phlickr_Tests_AllTests {
    public static function main() {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('PHPUnit');

        $suite->addTest(Phlickr_Tests_Offline_AllTests::suite());
        $suite->addTest(Phlickr_Tests_Online_AllTests::suite());

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == '_Tests_AllTests::main') {
    Phlickr_Tests_AllTests::main();
}


?>

<?php

/**
 * Runner for all offline TextUi tests.
 *
 * To run the offline test suites (assuming the Phlickr installation is in the
 * include path) run:
 *      phpunit Phlickr_Tests_Offline_TextUi_AllTests
 *
 * @version $Id$
 * @copyright 2005
 */


if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', '_Tests_Offline_TextUi_AllTests::main');
}

require_once dirname(__FILE__) . 'PHPUnit/Framework/TestSuite.php';
require_once dirname(__FILE__) . 'PHPUnit/TextUI/TestRunner.php';
require_once dirname(__FILE__) . 'PHPUnit/Util/Filter.php';

require_once dirname(__FILE__) . '/Tests/Offline/TextUi/UploadBatchViewer.php';
require_once dirname(__FILE__) . '/Tests/Offline/TextUi/UploadListener.php';

class Phlickr_Tests_Offline_TextUi_AllTests {
    public static function main() {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite(' Offline Import Tests');

        $suite->addTestSuite('_Tests_Offline_TextUi_UploadBatchViewer');
        $suite->addTestSuite('_Tests_Offline_TextUi_UploadListener');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == '_Tests_Offline_TextUi_AllTests::main') {
    Phlickr_Tests_Offline_TextUi_AllTests::main();
}

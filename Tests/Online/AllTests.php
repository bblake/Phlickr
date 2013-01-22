<?php

/**
 * Runner for all tests.
 *
 * To run the online test suites (assuming the Phlickr installation is in the
 * include path) run:
 *      phpunit Phlickr_Tests_Online_AllTests
 *
 * @version $Id$
 * @copyright 2005
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', '_Tests_Online_AllTests::main');
}

require_once dirname(__FILE__) . 'PHPUnit/Framework/TestSuite.php';
require_once dirname(__FILE__) . 'PHPUnit/TextUI/TestRunner.php';
require_once dirname(__FILE__) . 'PHPUnit/Util/Filter.php';

require_once dirname(__FILE__) . '/Tests/Online/Api.php';
require_once dirname(__FILE__) . '/Tests/Online/Request.php';
//require_once dirname(__FILE__) . '/Tests/Online/Uploader.php';

require_once dirname(__FILE__) . '/Tests/Online/AuthedGroup.php';
require_once dirname(__FILE__) . '/Tests/Online/AuthedPhoto.php';
require_once dirname(__FILE__) . '/Tests/Online/AuthedPhotoset.php';
require_once dirname(__FILE__) . '/Tests/Online/AuthedPhotosetList.php';
require_once dirname(__FILE__) . '/Tests/Online/AuthedUser.php';
require_once dirname(__FILE__) . '/Tests/Online/Group.php';
require_once dirname(__FILE__) . '/Tests/Online/Photo.php';
require_once dirname(__FILE__) . '/Tests/Online/PhotoList.php';
require_once dirname(__FILE__) . '/Tests/Online/Photoset.php';
require_once dirname(__FILE__) . '/Tests/Online/PhotosetList.php';
require_once dirname(__FILE__) . '/Tests/Online/User.php';


class Phlickr_Tests_Online_AllTests {
    public static function main() {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite(' Online Tests');

        // core
        $suite->addTestSuite('_Tests_Online_Api');
        $suite->addTestSuite('_Tests_Online_Request');
        $suite->addTestSuite('_Tests_Online_Uploader');

        // wrappers
        $suite->addTestSuite('_Tests_Online_AuthedGroup');
        $suite->addTestSuite('_Tests_Online_AuthedPhoto');
        $suite->addTestSuite('_Tests_Online_AuthedPhotoset');
        $suite->addTestSuite('_Tests_Online_AuthedPhotosetList');
        $suite->addTestSuite('_Tests_Online_AuthedUser');
        $suite->addTestSuite('_Tests_Online_Group');
        $suite->addTestSuite('_Tests_Online_Photo');
        $suite->addTestSuite('_Tests_Online_PhotoList');
        $suite->addTestSuite('_Tests_Online_Photoset');
        $suite->addTestSuite('_Tests_Online_PhotosetList');
        $suite->addTestSuite('_Tests_Online_User');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == '_Tests_Online_AllTests::main') {
    Phlickr_Tests_Online_AllTests::main();
}


?>

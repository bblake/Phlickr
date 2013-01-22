<?php

/**
 * Runner for all offline tests.
 *
 * To run the offline test suites (assuming the Phlickr installation is in the
 * include path) run:
 *      phpunit Phlickr_Tests_Offline_AllTests
 *
 * @version $Id$
 * @copyright 2005
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', '_Tests_Offline_AllTests::main');
}

require_once dirname(__FILE__) . 'PHPUnit/Framework/TestSuite.php';
require_once dirname(__FILE__) . 'PHPUnit/TextUI/TestRunner.php';
require_once dirname(__FILE__) . 'PHPUnit/Util/Filter.php';

// sub-directories
require_once dirname(__FILE__) . '/Tests/Offline/Import/AllTests.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotoSortStrategy/AllTests.php';
require_once dirname(__FILE__) . '/Tests/Offline/TextUi/AllTests.php';

// core
require_once dirname(__FILE__) . '/Tests/Offline/Api.php';
require_once dirname(__FILE__) . '/Tests/Offline/Cache.php';
require_once dirname(__FILE__) . '/Tests/Offline/Request.php';
require_once dirname(__FILE__) . '/Tests/Offline/Response.php';
require_once dirname(__FILE__) . '/Tests/Offline/Uploader.php';

// wrappers
require_once dirname(__FILE__) . '/Tests/Offline/AuthedGroup.php';
require_once dirname(__FILE__) . '/Tests/Offline/AuthedPhoto.php';
require_once dirname(__FILE__) . '/Tests/Offline/AuthedPhotoset.php';
require_once dirname(__FILE__) . '/Tests/Offline/AuthedPhotosetList.php';
require_once dirname(__FILE__) . '/Tests/Offline/AuthedUser.php';
require_once dirname(__FILE__) . '/Tests/Offline/Group.php';
require_once dirname(__FILE__) . '/Tests/Offline/GroupList.php';
//require_once dirname(__FILE__) . '/Tests/Offline/Note.php';
require_once dirname(__FILE__) . '/Tests/Offline/Photo.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotoList.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotoListIterator.php';
require_once dirname(__FILE__) . '/Tests/Offline/Photoset.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotosetPhotoList.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotosetList.php';
require_once dirname(__FILE__) . '/Tests/Offline/PhotoSorter.php';
require_once dirname(__FILE__) . '/Tests/Offline/User.php';
require_once dirname(__FILE__) . '/Tests/Offline/UserList.php';

class Phlickr_Tests_Offline_AllTests {
    public static function main() {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite(' Offline Tests');

        // sub-directories
        $suite->addTest(Phlickr_Tests_Offline_Import_AllTests::suite());
        $suite->addTest(Phlickr_Tests_Offline_PhotoSortStrategy_AllTests::suite());
        $suite->addTest(Phlickr_Tests_Offline_TextUi_AllTests::suite());

        // core
        $suite->addTestSuite('_Tests_Offline_Api');
        $suite->addTestSuite('_Tests_Offline_Cache');
        $suite->addTestSuite('_Tests_Offline_Request');
        $suite->addTestSuite('_Tests_Offline_Response');
        $suite->addTestSuite('_Tests_Offline_Uploader');

        // wrappers
        $suite->addTestSuite('_Tests_Offline_AuthedGroup');
        $suite->addTestSuite('_Tests_Offline_AuthedPhoto');
        $suite->addTestSuite('_Tests_Offline_AuthedPhotoset');
#        $suite->addTestSuite('_Tests_Offline_AuthedPhotosetList');
        $suite->addTestSuite('_Tests_Offline_AuthedUser');
        $suite->addTestSuite('_Tests_Offline_Group');
        $suite->addTestSuite('_Tests_Offline_GroupList');
        $suite->addTestSuite('_Tests_Offline_Note');
        $suite->addTestSuite('_Tests_Offline_Photo');
        $suite->addTestSuite('_Tests_Offline_PhotoList');
        $suite->addTestSuite('_Tests_Offline_PhotoListIterator');
        $suite->addTestSuite('_Tests_Offline_Photoset');
        $suite->addTestSuite('_Tests_Offline_PhotosetPhotoList');
#        $suite->addTestSuite('_Tests_Offline_PhotosetList');
        $suite->addTestSuite('_Tests_Offline_PhotoSorter');
        $suite->addTestSuite('_Tests_Offline_User');
        $suite->addTestSuite('_Tests_Offline_UserList');
        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == '_Tests_Offline_AllTests::main') {
    Phlickr_Tests_Offline_AllTests::main();
}

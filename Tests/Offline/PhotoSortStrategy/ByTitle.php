<?php

/**
 * PhotoSortStrategy ByTitle Offline Tests
 *
 * @version $Id$
 * @copyright 2005
 */

require_once dirname(__FILE__) . 'PHPUnit/Framework/TestCase.php';
require_once dirname(__FILE__) . '/Tests/constants.inc';

require_once dirname(__FILE__) . '/Photo.php';
require_once dirname(__FILE__) . '/PhotoSortStrategy/ByTitle.php';

class Phlickr_Tests_Offline_PhotoSortStrategy_ByTitle extends PHPUnit_Framework_TestCase {
    var $photo;

    function setUp() {
        $this->api = new Phlickr_Api(TESTING_API_KEY, TESTING_API_SECRET);
	$this->strategy = new Phlickr_PhotoSortStrategy_ByTitle();
    	$this->photo = new Phlickr_Photo($this->api, simplexml_load_string(
<<<XML
<photo id="23155946" secret="7f6672db61" server="16"
    title="Spaceman and The Family arrive" isprimary="0"/>
XML
));
    }
    function tearDown() {
        unset($this->api);
	unset($this->strategy);
	unset($this->photo);
    }

    function testGetSortString() {
	$result = $this->strategy->stringFromPhoto($this->photo);
	$this->assertEquals('Spaceman and The Family arrive', $result,
	    'the photo title should have been returned.');
    }
}

?>

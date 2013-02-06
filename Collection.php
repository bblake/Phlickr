<?php

/**
 * @version $Id$
 * @author  William O'Beirne <wbobeirne@gmail.com>
 * @license http://opensource.org/licenses/lgpl-license.php
 *          GNU Lesser General Public License, Version 2.1
 * @package Phlickr
 */

/**
 * Phlickr_Api includes the core classes.
 */
require_once dirname(__FILE__) . '/Api.php';
/**
 * This class extends Phlickr_ObjectBase.
 */
require_once dirname(__FILE__) . '/Framework/ObjectBase.php';

/**
 * Phlickr_Collection allows the manipuation of a Flickr collection. Uses
 * unofficial flickr.collections.* methods. May be unstable.
 *
 * @package Phlickr
 * @author  William O'Beirne <wbobeirne@gmail.com>
 */
class Phlickr_Collection extends Phlickr_Framework_ObjectBase {
    /**
     * The name of the XML element in the response that defines the object.
     *
     * @var string
     */
    const XML_RESPONSE_ELEMENT = 'collection';
    /**
     * The name of the Flickr API method that provides the info on this object.
     *
     * @var string
     */
    const XML_METHOD_NAME = 'flickr.collections.getInfo';
    
    /**
     * Constructor.
     *
     * You can construct a collection from an Id or XML. In its current state,
     * the flickr api only allows collections to be handled by their owners.
     *
     * @param   object Phlickr_API $api
     * @param   mixed $source string Id, object SimpleXMLElement
     * @throws  Phlickr_Exception, Phlickr_ConnectionException, Phlickr_XmlParseException
     */
    function __construct(Phlickr_Api $api, $source) {
        assert($api->isAuthValid());
        parent::__construct($api, $source, self::XML_RESPONSE_ELEMENT);
    }
    
    public function __toString() {
        return $this->getTitle() . ' (' . $this->getId() . ')';
    }

    static function getRequestMethodName() {
        return self::XML_METHOD_NAME;
    }

    static function getRequestMethodParams($id) {
        return array('collection_id' => (string) $id);
    }

    public function getId() {
        return (string) $this->_cachedXml['id'];
    }
    
    public function buildUrl() {
      return "http://flickr.com/photos/{$this->getUserId()}/collections/{$this->getPublicId()}/";
    }
    
    /**
     * Return the Collection's title.
     *
     * @return  string
     */
    public function getTitle() {
        if (!isset($this->_cachedXml->title)) {
            $this->load();
        }
        return (string) $this->_cachedXml->title;
    }
    
    /**
     * Return the user id of the collection owner. In its current state,
     * collections get info does not return owner ID. Since collection's get
     * info can only be run by the owner, we just get the authd ID.
     *
     * @return  string
     */
    public function getUserId() {
        return $this->getApi()->getUserId();
    }
    
    /**
     * Returns the id of the collection, minus the part behind the dash.
     * This is the ID publically displayed, used in URLs etc.
     *
     * @return  string
     */
    public function getPublicId() {
      $ids = explode('-', $this->getId());
      return $ids[1];
    }

    /**
     * Return the Collection's description.
     *
     * @return  string
     * @see     Phlickr_AuthedPhotoset::setMeta()
     */
    public function getDescription() {
        if (!isset($this->_cachedXml->description)) {
            $this->load();
        }
        return (string) $this->_cachedXml->description;
    }
}
<?php

/**
 * @version $Id$
 * @author  William O'Beirne <wbobeirne@gmail.com>
 * @license http://opensource.org/licenses/lgpl-license.php
 *          GNU Lesser General Public License, Version 2.1
 * @package Phlickr
 */

/**
 * This class extends Phlickr_Photoset.
 */
require_once dirname(__FILE__) . '/Collection.php';

/**
 * Phlickr_AuthedCollection represents a Flickr photoset.
 *
 * @package Phlickr
 * @author  William O'Beirne <wbobeirne@gmail.com>
 * @see     Phlickr_Collection
 */
class Phlickr_AuthedCollection extends Phlickr_Collection {
    /**
     * Constructor.
     *
     * You can construct a photoset from an Id or XML.
     *
     * @param   object Phlickr_Api $api This object must have valid
     *          authentication information or an exception will be thrown.
     * @param   mixed $source integer Id, object SimpleXMLElement
     * @throws  Phlickr_Exception, Phlickr_ConnectionException,
     *          Phlickr_XmlParseException
     */
    function __construct(Phlickr_Api $api, $source) {
        assert($api->isAuthValid());
        parent::__construct($api, $source);
    }
    
    
    /**
     * Edit sets in the collection.
     *
     * @param   array $ids Array of flickr IDs.
     * @throws  Phlickr_Exception, Phlickr_ConnectionException,
     *          Phlickr_XmlParseException
     */
    function editSets($ids) {
        $resp = $this->getApi()->executeMethod(
            'flickr.collections.editSets',
            array(
                'collection_id' => $this->getId(),
                'photoset_ids' => implode(',', $ids),
                'do_remove' => 0,
                'src' => 'js'
            ),
            FALSE,
            TRUE
        );
        $this->refresh();
    }
    
    /**
     * Removes a set from the collection.
     *
     * @param   int $id ID of set to remove.
     * @throws  Phlickr_Exception, Phlickr_ConnectionException,
     *          Phlickr_XmlParseException
     */
    function removeSet($id) {
        $resp = $this->getApi()->executeMethod(
            'flickr.collections.removeSet',
            array('collection_id' => $this->getId(),
                'photoset_id' => $id
            )
        );
        $this->refresh();
    }
     
}

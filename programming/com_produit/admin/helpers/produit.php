<?php
/**
 * @module		com_ola
 * @script		ola.php
 * @author-name Christophe Demko
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * Ola component helper.
 */
abstract class ProduitHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu)
    {
        
        JHtmlSidebar::addEntry(JText::_('Categories'),
                                 'index.php?option=com_categories&view=categories&extension=com_produit',
                                 $submenu == 'categories');
        // set some global property
        $document = JFactory::getDocument();
        $document->addStyleDeclaration('.icon-48-produit ' .
                                       '{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
        if ($submenu == 'categories')
        {
            $document->setTitle(JText::_('COM_PRODUIT_ADMINISTRATION_CATEGORIES'));
        }
    }

	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($messageId)) {
			$assetName = 'com_produit';
		}
		else {
			$assetName = 'com_produit.message.'.(int) $messageId;
		}
 
		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);
 
		foreach ($actions as $action) {
			$result->set($action,$user->authorise($action, $assetName));
		}
 
		return $result;
	}
}

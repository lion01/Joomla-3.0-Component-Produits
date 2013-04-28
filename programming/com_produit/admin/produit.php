<?php
/**
 * @module		com_produit
 * @script		produit.php
 * @author-name Clément Lesaulnier
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Clément Lesaulnier
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_produit')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

if(!defined('DS')){
define('DS',DIRECTORY_SEPARATOR);
}
 
// require helper file
JLoader::register('ProduitHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'produit.php');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Produit
$controller = JControllerLegacy::getInstance('Produit');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();

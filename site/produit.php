<?php
/**
 * @module		com_produit
 * @author-name Christophe Demko
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Produit
$controller = JControllerLegacy::getInstance('Produit');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();

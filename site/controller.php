<?php
/**
 * @module		com_produits
 * @author-name Clement Lesaulnier
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * Produit Component Controller
 */
class ProduitController extends JControllerLegacy
{
	function __construct(){
	parent::__construct();
		}
	function display($cachable = false, $urlparams = false)
	{	// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Produits'));
 
		// call parent behavior
		parent::display();
 
		
	}

}

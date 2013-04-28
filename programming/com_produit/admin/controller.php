<?php
/**
 * @module		com_ola
 * @script		controller.php
 * @author-name Christophe Demko
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of Ola component
 */
class ProduitController extends JControllerLegacy
{
	/**
	 * display task
	 *
	 * @return void
	 */
	 function __construct(){
	 parent::__construct();
	 }
	 
	function display($cachable = false)
	{	// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Produits'));
 
		// call parent behavior
		parent::display($cachable);
 
		// Set the submenu
		ProduitHelper::addSubmenu('messages');
      
	}
    
    function add(){
        $this->setRedirect(JRoute::_('index.php?option=com_produit&view=produit&layout=add',false));
        
    }
}

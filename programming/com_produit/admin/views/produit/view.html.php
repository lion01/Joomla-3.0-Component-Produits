<?php
/**
 * @module		com_produit
 * @author-name Clement Lesaulnier
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * Ola View
 */
class ProduitViewProduit extends JViewLegacy
{
	/**
	 * display method of Ola view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');
                $state;
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;
        $this->state	= $this->get('State');
        $this->canDo	= ProduitHelper::getActions($this->state->get('filter.category_id'));
       
		// Set the toolbar
		$this->addToolBar();
 
		// Display the template
		parent::display($tpl);
 
		// Set the document
		$this->setDocument();
	}
 
	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$input = JFactory::getApplication()->input;
                $input->set('hidemainmenu', true);
                $user	= JFactory::getUser();
		$userId	= $user->get('id');
                $isNew = ($this->item->id == 0);
                JToolBarHelper::title($isNew ? JText::_('Nouveau Produit')
                                             : JText::_('COM_PRODUIT_EDIT'));
                $checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $userId);

                $canDo	= ProduitHelper::getActions($this->item->catid, $this->item->id);

                       // If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||(count($user->getAuthorisedCategories('com_produit', 'core.create')))))
		{
			JToolBarHelper::apply('produit.apply');
			JToolBarHelper::save('produit.save');
		}
		if (!$checkedOut && (count($user->getAuthorisedCategories('com_produit', 'core.create')))){
			JToolBarHelper::save2new('produit.save2new');
		}
		// If an existing item, can save to a copy.
		if (!$isNew && (count($user->getAuthorisedCategories('com_produit', 'core.create')) > 0)) {
			JToolBarHelper::save2copy('produit.save2copy');
		}

    
    if (empty($this->item->id)) {
        JToolBarHelper::cancel('produit.cancel');
    }
    else {
        JToolBarHelper::cancel('produit.cancel', 'JTOOLBAR_CLOSE');
    }
        JToolBarHelper::divider();
		JToolBarHelper::help('JHELP_COMPONENTS_COM_PRODUITS_EDIT');

	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$isNew = $this->item->id == 0;
              
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('CREATION PRODUIT') : JText::_('PRODUIT_EDITION'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_produit"
                                                  ."/views/produit/submitbutton.js");
		JText::script('COM_PRODUIT_PRODUIT_ERROR_UNACCEPTABLE');
	}
}

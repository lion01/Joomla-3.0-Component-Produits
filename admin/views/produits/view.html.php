<?php
/**
 * @module		com_ola
 * @author-name Christophe Demko
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
class ProduitViewProduits extends JViewLegacy
{
	/**
	 * Ola view display method
	 * @return void
	 */
	protected $state;
	protected $items;
        protected $pagination;
	function display($tpl = null) 
	{
		// Get data from the model
	global $mainframe, $option;
        if ($this->getLayout() !== 'modal')
		{
        ProduitHelper::addSubmenu('messages');
        $this->sidebar = JHtmlSidebar::render();
        }
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');
 		$form = $this->get('Form');
 		$this->state= $this->get('State');
                $app            = JFactory::getApplication();
                $app->isAdmin();
                $app->getMenu('administration');
                
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
                
                // Levels filter.
		$options	= array();
		$options[]	= JHtml::_('select.option', '1', JText::_('J1'));
		$options[]	= JHtml::_('select.option', '2', JText::_('J2'));
		$options[]	= JHtml::_('select.option', '3', JText::_('J3'));
		$options[]	= JHtml::_('select.option', '4', JText::_('J4'));
		$options[]	= JHtml::_('select.option', '5', JText::_('J5'));
		$options[]	= JHtml::_('select.option', '6', JText::_('J6'));
		$options[]	= JHtml::_('select.option', '7', JText::_('J7'));
		$options[]	= JHtml::_('select.option', '8', JText::_('J8'));
		$options[]	= JHtml::_('select.option', '9', JText::_('J9'));
		$options[]	= JHtml::_('select.option', '10', JText::_('J10'));

		$this->f_levels = $options;

 		$this->sidebar = JHtmlSidebar::render();
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
		JFactory::getApplication()->input->set('hidemainmenu', true);
		$user= JFactory::getUser();
		$state	= $this->get('State');
		$canDo = ProduitHelper::getActions($state->get('filter.category_id'));
		//titre du composant back-end//
		JToolBarHelper::title(JText::_('Gestion de catalogue'), 'produit');
		
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();

				if ($canDo->get('core.create'))  {
			JToolBarHelper::addNew('produit.add', 'JTOOLBAR_NEW');
			}
			// For new records, check the create permission.
		

	
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('produit.edit', 'JTOOLBAR_EDIT');
			JToolBarHelper::save('produit.save');
		}
		if ($canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'produit.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_produit');
		}

		JHtmlSidebar::setAction('index.php?option=com_produit&view=produits');
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_state',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true)
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_weblinks'), 'value', 'text', $this->state->get('filter.category_id'))
		);
                JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_MAX_LEVELS'),
			'filter_level',
			JHtml::_('select.options', $this->f_levels, 'value', 'text', $this->state->get('filter.level'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_ACCESS'),
			'filter_access',
			JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access'))
		);

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_LANGUAGE'),
			'filter_language',
			JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('filter.language'))
		);
	}
protected function getSortFields()
	{
		return array(
			'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'a.state' => JText::_('JSTATUS'),
			'a.title' => JText::_('JGLOBAL_TITLE'),
			'a.access' => JText::_('JGRID_HEADING_ACCESS'),
			'a.hits' => JText::_('JGLOBAL_HITS'),
			'a.language' => JText::_('JGRID_HEADING_LANGUAGE'),
			'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
	
 protected function setDocument(){
     
     $document=  JFactory::getDocument();
     //$document->render();
 }
 
}


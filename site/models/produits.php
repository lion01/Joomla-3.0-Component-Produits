<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
 
/**
 * Ola Model
 */
class ProduitModelProduits extends JModelItem
{
	/**
	 * @var object item
	 */
	protected $items;
 
	/**
	 * Method to auto-populate the model state.
	 *
	 * This method should only be called once per instantiation and is designed
	 * to be called on the first call to the getState() method unless the model
	 * configuration flag to ignore the request is set.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return	void
	 * @since	1.6
	 */
	protected function populateState() 
	{
		$app = JFactory::getApplication();
		// Get the message id
		$catid = JRequest::getInt('catid');
		$this->setState('message.catid', $catid);
 
		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
		parent::populateState();
	}
 
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Produit', $prefix = 'ProduitTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}

    /**
     * Load an JSON string into the registry into the given namespace [or default if a namespace is not given]
     *
     * @param    string    JSON formatted string to load into the registry
     * @return    boolean True on success
     * @since    1.5
     * @deprecated 1.6 - Oct 25, 2010
     */
    public function loadJSON($data)
    {
        return $this->loadString($data, 'JSON');
    }
 
	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getItems() 
	{

		if (!isset($this->items)) 
		{
			$catid = $this->getState('message.catid');
			$this->_db->setQuery($this->_db->getQuery(true)
				->select('h.title, h.description, h.id, m.image_url, c.title as category')
				->from('#__produit as h')
				->leftJoin('#__categories as c ON h.catid=c.id')
                ->leftJoin('#__produit_media as m ON h.mediaid=m.id')
				->where('h.catid=' . (int)$catid)
				->group('h.id', 'h.title'));
			if (!$this->items = $this->_db->loadObject()) 
			{
				$this->setError($this->_db->getError());
			}
			else
			{
				// Load the JSON string
/*
				$params = new JRegistry;
				$params->loadJSON($this->item->params);
				$this->item->params = $params;
*/
				$params = new JRegistry;
				$params->loadString($this->items->description);
				$this->items->description = $params;
 
				// Merge global params with item params
				$params = clone $this->getState('params');
				$params->merge($this->items->description);
				$this->items->description = $params;
			}
		}
		$this->items= $this->_db->loadRowList();
		return $this->items;
	
	
}
}
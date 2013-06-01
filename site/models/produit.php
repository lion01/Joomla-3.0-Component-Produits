<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// Include dependancy of the main model form
jimport('joomla.application.component.modelform');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
// Include dependancy of the dispatcher
jimport('joomla.event.dispatcher');
 
class ProduitModelProduit extends JModelForm
{
	/**
	 * @var object item
	 */
	protected $item;
        
       
 
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
        public function getForm($data = array(), $loadData = true)
        {
 
        $app = JFactory::getApplication('site');
 
        // Get the form.
                $form = $this->loadForm('com_produit.produit', 'produit', array('control' => 'jform', 'load_data' => true));
                if (empty($form)) {
                        return false;
                }
                return $form;
 
        }
 
        
       
        
   
	protected function populateState() 
	{
		$app = JFactory::getApplication();
		// Get the message id
		$id = JRequest::getInt('id');
		$this->setState('message.id', $id);
 
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
	public function getItem() 
	{

		if (!isset($this->item)) 
		{
			$db = &JFactory::getDbo();
                      
                        $id = $this->getState('message.id');
			$db->setQuery($db->getQuery(true)
				->from('#__produit as h')
				->leftJoin('#__categories as c ON h.catid=c.id')
				->leftJoin('#__produit_media as m ON h.mediaid=m.id')
				->select('h.title, h.description, h.id, h.intitule, c.title as category, m.image_url, m.pdf_url')
				->where('h.id=' . (int)$id));
			if (!$this->item = $db->loadObject()) 
			{
				$this->setError($db->getError());
			}
			else
			{
				// Load the JSON string
/*
				$params = new JRegistry;
				$params->loadJSON($this->item->params);
				$this->item->params = $params;
*/
				
			}
		}
		return $this->item;
	}
	/**
	function message suivant l'option choisie **/
	public function getMsg(){
		if(!isset($this->msg)){
			if(!get_magic_quotes_gpc) {
			 $id = JFactory::getApplication()->input->get('id',1,'INT');
			}
			else {
			  $id = JRequest::getInt('id');
			
			}
			switch ($id)
			{
				case 2:
						$this->msg= 'Enlever du devis';
				break;
				default:
				case 1:
						$this->msg = 'Ajouter au devis';
				break;
			
			}
		
		}
	 return $this->msg;
	
	}
}

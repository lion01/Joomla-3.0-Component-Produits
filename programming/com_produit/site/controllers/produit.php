<?php
 
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controllerform');

class ProduitControllerProduit extends JControllerForm{
    
   
    
   public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true))
        {
                return parent::getModel($name, $prefix, array('ignore_request' => false));
        }
        
        	protected function allowAdd($data = array())
	{
		$user = JFactory::getUser();
		$allow		= true;
                return $allow;
	}
    
	/**
	 * Method to check if you can add a new record.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key.
	 *
	 * @return  boolean
	 * @since   1.6
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		$recordId = (int) isset($data[$key]) ? $data[$key] : 0;
		$categoryId = 0;
        
		if ($recordId)
		{
			$categoryId = (int) $this->getModel()->getItem($recordId)->catid;
		}
        
		if ($categoryId)
		{
			// The category has been set. Check the category permissions.
			return JFactory::getUser()->authorise('core.edit', $this->option . '.category.' . $categoryId);
		}
		else
		{
			// Since there is no asset tracking, revert to the component permissions.
			return parent::allowEdit($data, $key);
		}
	}
 
        public function submit()
        {
                // Check for request forgeries.
                JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
 
                // Initialise variables.
                $app    = JFactory::getApplication();
                $model  = $this->getModel('produit');
 
                // Get the data from the form POST
                $data = JRequest::getVar('jform', array(), 'post', 'array');
                session_start();
                $_SESSION['produit']= $data['produitOpt'];
        // Now update the loaded data to the database via a function in the model
         echo "<h2>Product added</h2>".var_dump($data);
        
 
                return true;
        }
}
        
?>

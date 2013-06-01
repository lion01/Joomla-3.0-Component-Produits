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
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 
/**
 * Olas Controller
 */
class ProduitControllerProduits extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	private $params= null;

	public function __construct(){
		parent::__construct();
		$this->registerTask('add','edit','delete');
		$this->params=&JComponentHelper::getParams('com_produit');
        
	}
	public function getModel($name = 'Produit', $prefix = 'ProduitModel') 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	public function add() {

		$input = JFactory::getApplication()->input;
		$pks= $input->post->get('cid',array(),'array');
		JArrayHelper::toInteger($pks);
		$model=$this->getModel();
		$return = $model->addproduit($pks);
		$this->setRedirect(JRoute::_('index.php?option=com_produit&view=produit&layout=add',false));
	}
}

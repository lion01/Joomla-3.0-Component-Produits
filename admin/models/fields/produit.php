<?php
/**
 * @module		com_produit
 * @script		produit.php
 * @author-name Clément Lesaulnier
 * @copyright	Copyright (C) 2013 Clément Lesaulnier
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Ola Form Field class for the Ola component
 */
class JFormFieldProduit extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Produit';
 	public $idsmedias = array();
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
//		$query = new JDatabaseQuery;
		$query = $db->getQuery(true);
		$query->select('#__produit.id as id,#__produit.title,#__categories.description as category,catid,#__produit_media.id as mediapid, #__produit_media.slug as mediap');
		$query->from('#__produit,#__produit_media');
		$query->leftJoin('#__categories on catid=#__categories.id');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->title . ($message->catid ? ' (' . $message->category . ')' : ''),$message->mediapid ? '(' .$message->mediap  .')' : '');
				array_push($idsmedias, array($messages->mediap=>$messages->mediapid));
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
    
    
}

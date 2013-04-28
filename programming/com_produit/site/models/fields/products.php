<?php

defined ('_JEXEC') or die ('Restricted access');

jimport('joomla.form.formfield');

class JFormProducts extends JFormField {
    
    protected $type = 'Products';
    
    public function getInput() {
        
        $id = $this->id;
        $db = &JFactory::getDbo();
        $query=$db->getQuery(true);
        $query->select("p.id, p.title");
        
        $query->from("#__produit as p");
        $db->setQuery($query);
        
        if (!$this->item = $db->loadObject()) 
			{
				$this->setError($db->getError());
			}
			else
			{
				
				
			}
        return '<select name=produitOpt>'.
                '<option value="'.$this->item->id.'">"'.$this->item->title.'"</option>'.
                '</select>';
    }
    
    public function getOptions(){
        
    }
    
} 
?>

<?php
/**
 * @module		com_ola
 * @author-name Christophe Demko
 * @adapted by  Ribamar FS
 * @copyright	Copyright (C) 2012 Christophe Demko
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
$params = $this->form->getFieldsets('params');
    $app=JFactory::getApplication();
    $input=$app->input;
?>
<script type="text/javascript">
Joomla.submitbutton = function(task)
{
    if (task == 'produit.cancel' || document.formvalidator.isValid(document.id('produit-form'))) {
        <?php echo $this->form->getField('description')->save(); ?>
        Joomla.submitform(task, document.getElementById('produit-form'));
    }
    else {
        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
    }
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_produit&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="produit-form" class="form-validate" enctype="multipart/form-data">
    <div class="row-fluid">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_( 'Ajouter un produit' ); ?></legend>
			<ul class="nav">
<?php foreach($this->form->getFieldset('details') as $field): ?>
				<li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>
			</ul>
	</div>
 
	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start', 'produit-slider'); ?>
<?php foreach ($params as $name => $fieldset): ?>
		<?php echo JHtml::_('sliders.panel', JText::_($fieldset->label), $name.'-params');?>
	<?php if (isset($fieldset->description) && trim($fieldset->description)): ?>
		<p class="tip"><?php echo $this->escape(JText::_($fieldset->description));?></p>
	<?php endif;?>
		<fieldset class="panelform" >
			<ul class="adminformlist">
	<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<li><?php echo $field->label; ?><?php echo $field->input; ?></li>
	<?php endforeach; ?>
				
			</ul>
		</fieldset>
<?php endforeach; ?>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000" />
		<?php echo JHtml::_('sliders.end'); ?>
	</div>
        <?php if ($this->canDo->get('core.admin')): ?>
						<div class="tab-pane" id="permissions">
							<fieldset>
								<?php echo $this->form->getInput('rules'); ?>
							</fieldset>
						</div>
<?php endif; ?>
    <div class="control-group form-inline">
    
	<div>
		<input type="hidden" name="task" value="edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
    </div>

</div>
</form>

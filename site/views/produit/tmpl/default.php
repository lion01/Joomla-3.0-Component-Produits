<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
JHtml::_('formbehavior.chosen', 'select');
?>
<section class=state_order">
	<article>
		<h4><?php echo $this->msg; ?></h4>
	</article>

</section>
<section class="module_produits">
	<h1><?php echo $this->item->title; ?></h1>
	<hr>
	<div><img src="<?php echo $this->baseurl."/".$this->item->image_url ?>" class="product-img" width="160" height="auto" align="center" /></div>
	<div class="intitule"><?php echo $this->item->intitule; ?></div>
	<br />
    <div class="produitdesc">
    <?php echo $this->item->description; ?>
    <div>
        <?php $pdfname= preg_replace('/pdf/', '', $this->item->pdf_url); ?>
	<h3><img src="<?php echo $this->baseurl; ?>/images/icon_pdf.gif"><a href="mailto:contact@inovia-group.com?subject=<?php echo $pdfname; ?>">Télécharger la fiche technique</a>
            <!-- <a href="echo $this->item->pdf_url; ">Télécharger la fiche technique</a></h3> -->
</section>



<?php if(isset($_SESSION['produit'])) { echo "panier=>produit".$_SESSION['produit']; }; ?>
<form action="<?php JRoute::_('index.php?option=com_produit&task=produit.submit'); ?>" method="post" name="panierForm" id="panierForm" class="form-validate">
<!-- JRoute::_('index.php?option=com_produit&view=produit&id='.(int) $this->item->id);  -->    
<?php JFormHelper::addFieldPath(JPATH_COMPONENT . '/models/fields');
$products = JFormHelper::loadFieldType('Products', false);
 ?>
    
    <?php foreach($this->form->getFieldset('produit') as $field): ?>
    <?php echo $field->label; ?>
    <?php echo $field->input; ?>
    <?php     endforeach; ?>

    <select name="jform[produitOpt]" id="jform_produitOpt">
        <option value="<?php echo $this->item->id; ?>"><?php echo $this->item->intitule;?></option>
        
    </select>
    <input type="hidden" name="option" value="com_produit" />
    <input type="hidden" name="task" value="produit.submit" />
    
   <button type="submit" class="button"><?php echo JText::_('Submit'); ?></button>
    <?php echo JHtml::_('form.token'); ?>
     <div class="clr"></div>
</fieldset
</form> 
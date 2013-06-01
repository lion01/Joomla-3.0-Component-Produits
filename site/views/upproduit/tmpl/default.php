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
	
</section>

<?php if(isset($_SESSION['produit'])){ echo "panier".$_SESSION['produit']; } ?>
<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
 
?>
    <h2>Adding Product to order</h2>
 
    <form class="form-validate" action="<?php echo JRoute::_('index.php'); ?>" method="post" id="upproduit" name="upproduit">
                <fieldset>
                <dl>
                    <dt><?php echo $this->form->getLabel('id'); ?></dt>
                <dd><?php echo $this->form->getInput('id'); ?></dd>
                <dt></dt><dd></dd>
                    <dt><?php echo $this->form->getLabel('title'); ?></dt>
                    <dd><?php echo $this->form->getInput('title'); ?></dd>
                <dt></dt><dd></dd>
                <dt></dt>
                <dd><input type="hidden" name="option" value="com_produit" />
                    <input type="hidden" name="task" value="upproduit.submit" />
                </dd>
                <dt></dt>
                <dd><button type="submit" class="button"><?php echo JText::_('Submit'); ?></button>
                                        <?php echo JHtml::_('form.token'); ?>
                </dd>
                </dl>
        </fieldset>
    </form>
    <div class="clr"></div>
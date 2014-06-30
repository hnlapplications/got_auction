<?php
defined("_JEXEC") or die();
JHtml::_('script', 'system/core.js', false, true);
?>

<h1>Manage Client</h1>
<form action="<?php echo JRoute::_('index.php?option=com_gottodo&layout=edit'); ?>" method="POST" enctype="multipart/form-data" name="adminForm" id="adminForm" class=form-validate">
	<div class="btn-toolbar">
		<div class="btn-group">
			<button tyoe="button" class="btn btn-primary" onclick="Joomla.submitbutton('settings.save');">
				<i class="icon-new"></i> Save and Close
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('settings.apply');">
				<i class="icon-new"></i> <?php echo JText::_('JSAVE'); ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('settings.cancel');">
				<i class="icon-cancel"></i> <?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
	</div>
	


	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>
				
				<?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details',JText::_('COM_GOTAUCTION_SETTINGS', true)); ?>
				
					<!-- the data rendered below comes from models/forms/designer.xml -->
					<?php foreach($this->form->getFieldset('settings_fields') as $field): ?>						
							<div class="control-group" style="<?php echo $style; ?>">
								<div class="control-label">
									<?php echo $field->label; ?>
								</div>
								<div class="controls">
									<?php echo $field->input; ?>
								</div>
							</div>	
					<?php endforeach;?>
					
					
					
				<?php echo JHtml::_('bootstrap.endPanel'); ?>
				
				<input type="hidden" name="task" value="" />
				<?php echo JHtml::_('form.token'); ?>
				
				<?php echo JHtml::_('bootstrap.endPane'); ?>
			</fieldset>
		</div>
	</div>

</form>




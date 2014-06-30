<?php
defined("_JEXEC") or die();
JHtml::_('script', 'system/core.js', false, true);
?>

<h1>GotAuction Settings</h1>
<form action="<?php echo JRoute::_('index.php?option=com_gotauction&view=setting&layout=edit&id=1'); ?>" method="POST" enctype="multipart/form-data" name="adminForm" id="adminForm" class=form-validate">
	<div class="btn-toolbar">
		<div class="btn-group">
			<button tyoe="button" class="btn btn-primary" onclick="Joomla.submitbutton('setting.save');">
				<i class="icon-new"></i> Save and Close
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('setting.apply');">
				<i class="icon-new"></i> <?php echo JText::_('JSAVE'); ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('setting.cancel');">
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
					
					<?php 					
					foreach($this->form->getFieldset('settings_fields') as $field): 
					//~ echo "<pre>" . print_r($field, true) . "</pre>";
					if ($field->value==null) //$field->value=="")
					{
						switch($field->fieldname)
						{
							case "street_number":
								$field->value=$this->item->street_number;
								break;
							case "street_name":
								$field->value=$this->item->street_name;
								break;
							case "suburb":
								$field->value=$this->item->suburb;
								break;
							case "city":
								$field->value=$this->item->city;
								break;
							case "post_code":
								$field->value=$this->item->post_code;
								break;
							case "gps_x":
								$field->value=$this->item->gps_x;
								break;
							case "gps_y":
								$field->value=$this->item->gps_y;
								break;
							default:
								//do nothing
								break;
						}
					}
					?>						
						
						<div class="control-group" style="<?php echo $style; ?>">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>	
					<?php 
						endforeach;
					?>
					
					
					
				<?php echo JHtml::_('bootstrap.endPanel'); ?>
				
				<input type="hidden" name="task" value="" />
				<?php echo JHtml::_('form.token'); ?>
				
				<?php echo JHtml::_('bootstrap.endPane'); ?>
			</fieldset>
		</div>
	</div>

</form>

<div class="row-fluid">
	<div class="span10 form-horizontal">
		Auction Types
	</div>
</div>
<div class="row-fluid">
	<div class="span10 form-horizontal">
		Auction Categories
	</div>
</div>
<div class="row-fluid">
	<div class="span10 form-horizontal">
		Lot Types
	</div>
</div>




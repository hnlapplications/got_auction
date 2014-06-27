<?php
defined ('_JEXEC') or die();
JHtml::_('script', 'system/core.js', false, true);
class GotauctionViewSettings extends JViewLegacy
{

	
	public function display($tpl=null)
	{		
		$app=JFactory::getApplication();
		$params=$app->getParams();
		$fields=$this->loadFields();
		
		parent::display($tpl);
	}
	
	public function addToolbar()
	{
		//do nothing yet
	}
	
	private function loadFields()
	{
		
	}
}

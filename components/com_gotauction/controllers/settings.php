<?php

defined("_JEXEC") or die();

//this is the controller for the settings view
class GotauctionControllerSettings extends JControllerForm
{
	function __construct()
	{
		parent::__construct();
	}
	
	function save()
	{
		JFactory::getApplication()->enqueueMessage("Still hav to implement save method for settings controller");
		
		
		
		$this->setRedirect("index.php?option=com_gotauction&view=settings&layout=edit");
	}
	
}

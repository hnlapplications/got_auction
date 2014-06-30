<?php

defined("_JEXEC") or die();

//this is the controller for the settings view
class GotauctionControllerSetting extends JControllerForm
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function save()
	{
		$app=JFactory::getApplication();
		//get the form data
		$data=JRequest::getVar('jform', array(), 'post', 'array');		
		$db=JFactory::getDbo();
		$query=$db->getQuery(true);
		//check if a first record for the settings exists (id will be 1)
		//if no such record exists, insert one.  Otherwise, update it.
		$query->select("id, address")->from("#__gotauction_settings")->setLimit(1);
		$db->setQuery($query);
		$results=$db->loadObjectList();
		$settings_exist=false;
		if (count($results)>0) //if there is more than 0 rows
		{
			$settings_exist=true;
		}
		
		if ($settings_exist) //update settings
		{
			$query=$db->getQuery(true);
			//get the address id
			$address_id=$results[0]->address;
			$settings_id=$results[0]->id;

			
			
			$query=$db->getQuery(true);
			$address=new stdClass();
			$address->id			= $address_id;
			$address->street_number	= $data['street_number'];
			$address->street_name	= $data['street_name'];
			$address->suburb		= $data['suburb'];
			$address->city			= $data['city'];
			$address->post_code		= $data['post_code'];
			$address->gps_x			= $data['gps_x'];
			$address->gps_y			= $data['gps_y'];
			
			//$app->enqueueMessage("New Address: <pre>" . print_r($address, true) . "</pre>");
			
			$result=$db->updateObject("#__gotauction_address", $address,"id");
											
			$settings=new stdClass();
			$settings->id				=	$settings_id;
			$settings->company_name		=	$data['company_name'];
			$settings->director			=	$data['director'];
			$settings->contact_no		=	$data['contact_number'];
			$settings->email			=	$data['email'];
			$settings->logo				=	$data['logo'];
			$settings->address			=	$address_id;
			
			$db->updateObject("#__gotauction_settings", $settings,"id");
			$app->enqueueMessage("Settings updated.");
		}
		else //insert settings
		{
			$query=$db->getQuery(true);
			$address=new stdClass();
			$address->street_number	= $data['street_number'];
			$address->street_name	= $data['street_name'];
			$address->suburb		= $data['suburb'];
			$address->city			= $data['city'];
			$address->post_code		= $data['post_code'];
			$address->gps_x			= $data['gps_x'];
			$address->gps_y			= $data['gps_y'];
			$db->insertObject("#__gotauction_address", $address);
			
			//get last insert id for the address
			$address_id=$db->insertid();
			
			$settings=new stdClass();
			$settings->company_name		=	$data['company_name'];
			$settings->director			=	$data['director'];
			$settings->contact_no		=	$data['contact_number'];
			$settings->email			=	$data['email'];
			$settings->logo				=	$data['logo'];
			$settings->address			=	$address_id;
			
			$db->insertObject("#__gotauction_settings", $settings);
			$app->enqueueMessage("Settings saved.");
			
		}
		
		$this->setRedirect("index.php?option=com_gotauction&view=setting&layout=edit&id=1");	
	}
	
}

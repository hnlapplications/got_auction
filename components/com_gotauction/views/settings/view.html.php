<?php
defined ('_JEXEC') or die();
JHtml::_('script', 'system/core.js', false, true);
class GotauctionViewSettings extends JViewLegacy
{
	public $fields;
	
	public function display($tpl=null)
	{		
		$app=JFactory::getApplication();
		$params=$app->getParams();
		$this->fields=$this->loadFields();
		parent::display($tpl);
	}
	
	public function addToolbar()
	{
		//do nothing yet
	}
	
	private function loadFields()
	{
		$db=JFactory::getDbo();
		$query=$db->getQuery(true);
		$query->select($db->quoteName(array("company_name", "director", "logo", "contact_no", "address", "email")));
		$query->from($db->quoteName("#__gotauction_settings"));
		$query->where($db->quote("id") . ' = 1');
		$db->setQuery($query);
		$results=$db->loadObject();
		$settings=new stdClass();
		if (count($results)==0)
		{
			//we have no results... Just create some default object
			$settings=new stdClass();
			$settings->company_name="";
			$settings->director="";
			$settings->logo="";
			$settings->contact_no="";
			$settings->address=new stdClass();
			$settings->address->id=null;
			$settings->address->street_number="";
			$settings->address->street_name="";
			$settings->address->suburb="";
			$settings->address->city="";
			$settings->address->post_code="";
			$settings->address->gps_x="";
			$settings->address->gps_y="";
			$settings->email="";
		}
		else
		{
			$settings=$results;
			if ($settings->address!=0)
			{
				//load the address
				$query=$db->getQuery(true);
				$query->select($db->quoteName(array("id", "street_number", "street_name", "suburb", "city", "post_code", "gps_x", "gps_y")))
						->from($db->quoteName("#__gotauction_address"))
						->where($db->quote("id") . ' = ' . $settings->address);
				$db->setQuery($query);
				$settings->address=$db->loadObject();
			}
		}
		
		return $settings;
	}
}

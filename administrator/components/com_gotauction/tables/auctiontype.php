<?php
defined("_JEXEC") or die();

class GotauctionTableAuctiontype extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct("#__gotauction_auction_type", "id", $db);
	}
	
	public function bind($array, $ignore='')
	{
		return parent::bind($array, $ignore);
	}
	
	public function store($updateNulls = false)
	{
		return parent::store($updateNulls);
	}
	
	
}

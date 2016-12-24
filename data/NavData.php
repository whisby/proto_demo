<?php
namespace Proto\Data;
use Proto;

class NavData {
	
	private static $items = null;
	
	public static function getItems(){
		
		if(!isset(self::$items)){
			self::$items = [
			new Proto\NavItem('Dashboard', 'root','index'),
			new Proto\NavItem('Product', 'product','index'),
			new Proto\NavItem('Framing', 'framing','index'),
			new Proto\NavItem('Orders', 'orders','index'),
			new Proto\NavItem('Content', 'content','index'),
			new Proto\NavItem('Assets', 'assets','index'),
			new Proto\NavItem('Settings', 'settings','index')
			];
		}
		return self::$items;
	}
	
}

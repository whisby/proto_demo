<?php

namespace Proto;


class NavItem {
	
	public function __construct($title, $controller = null, $action = null, $id = null){
		$this->Title = $title;
		$this->Controller = $controller ?? 'root';
		$this->Action = $action ?? 'index';
		$this->ID = $id;

	}
	
	public $Title;
	public $Action;
	public $Controller;
	public $ID;
	
	public function GetURL(){
		return join(DIRECTORY_SEPARATOR,  [$this->Controller == 'root' ? null : $this->Controller, $this->Action == 'index' ? '' : $this->Action ]);
	}
	
	
	public static function Create($title, $controller = null, $action = null, $id = null){
		return new NavItem($title, $controller, $action, $id);
	}
	
}

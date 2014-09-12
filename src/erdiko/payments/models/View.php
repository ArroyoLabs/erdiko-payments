<?php
/**
 * Drupal View
 * 
 * @category  	erdiko
 * @package   	drupal
 * @copyright 	Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author		John Arroyo, john@arroyolabs.com
 */
namespace erdiko\payments\models;

use \Erdiko;

class View extends \erdiko\payments\Model
{	
	/**
	 * 
	 */
	public function getView($name, $display)
	{
		$view = \views_get_view($name);
  		$view->set_display($display);
  
  		$view->pre_execute();
  		$view->execute();
  		return $view->render();
	}
}
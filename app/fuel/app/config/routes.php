<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'welcome/index',

	'login' => 'users/login',
	'logout' => 'users/logout',
	'register' => 'users/register',
	'hotel' => 'hotel/index',
	'hotel/create' => 'hotel/create',
	'hotel/edit/(:any)' => 'hotel/edit/$1',
	'hotel/delete/(:any)' => 'hotel/delete/$1',
	'hotel/update/(:any)' => 'hotel/update/$1',
	'test' => 'users/test',
	'upload/process' => 'upload/process',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);

<?php

/**
 * The main site settings page
 */

return array(

	/**
	 * Settings page title
	 *
	 * @type string
	 */
	'title' => 'ecommerce.php file',

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'field' => array(
			//'title' => 'TEST Name',
			//'type' => 'text',
			//'limit' => 50,
		)
	),

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'test' => 'max:50',
	),

	/**
	 * This is run prior to saving the JSON form data
	 *
	 * @type function
	 * @param array		$data
	 *
	 * @return string (on error) / void (otherwise)
	 */
	'before_save' => function(&$data)
	{
		$data['site_name'] = $data['site_name'] . ' - Yay 2';
	},

	/**
	 * The permission option is an authentication check that lets you define a closure that should return true if the current user
	 * is allowed to view this settings page. Any "falsey" response will result in a 404.
	 *
	 * @type closure
	 */
	'permission'=> function()
	{
		return true;
		//return Auth::user()->hasRole('developer');
	},

	/**
	 * This is where you can define the settings page's custom actions
	 */

);
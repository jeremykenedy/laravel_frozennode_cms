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
		'Left Page Content' => array(
		    'type' => 'wysiwyg',
		    'title' => 'Entry',
		),
		'hex' => array(
		    'type' => 'color',
		    'title' => 'Main Font Color',
		),
		'season' => array(
		    'type' => 'enum',
		    'title' => 'Season',
		    'options' => array('Winter', 'Spring', 'Summer', 'Fall'), //must be an array
		),
		'image' => array(
		    'title' => 'Image',
		    'type' => 'image',
		    //'location' => public_path() . '/uploads/products/originals/',
		    'location' => public_path(),
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 2,
		    'sizes' => array(
		        array(65, 57, 'crop', public_path() . '/uploads/products/thumbs/small/', 100),
		        array(220, 138, 'landscape', public_path() . '/uploads/products/thumbs/medium/', 100),
		        array(383, 276, 'fit', public_path() . '/uploads/products/thumbs/full/', 100)
		    )
		),		
		'media_document' => array(
		    'title' => 'File',
		    'type' => 'file',
		    //'location' => storage_path() . '/media_documents/',
		    'location' => public_path(),
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 2,
		    'mimes' => 'pdf,psd,doc',
		),
		'name' => array(
		    'type' => 'text', //optional, default is 'text'
		    'title' => 'Name',
		    'limit' => 30, //optional, defaults to no limit
		),
		'password' => array(
		    'type' => 'password',
		    'title' => 'Password',
		),
		'textarea' => array(
		    'type' => 'textarea',
		    'title' => 'Name',
		    'limit' => 300, //optional, defaults to no limit
		    'height' => 130, //optional, defaults to 100
		),
		'markdown' => array(
		    'type' => 'markdown',
		    'title' => 'Name',
		    'limit' => 300, //optional, defaults to no limit
		    'height' => 130, //optional, defaults to 100
		),
		'number' => array(
		    'type' => 'number',
		    'title' => 'Price',
		    'symbol' => '$', //optional, defaults to ''
		    'decimals' => 2, //optional, defaults to 0
		    'thousands_separator' => ',', //optional, defaults to ','
		    'decimal_separator' => '.', //optional, defaults to '.'
		),
		'is_good' => array(
		    'type' => 'bool',
		    'title' => 'Is Good',
		),







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
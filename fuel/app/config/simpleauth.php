<?php 
return array(
	'groups' => array(
		'-1' => array('name' => 'banned', 'roles' => array('banned')),
		'0' => array('name' => 'Guests', 'roles' => array()),
		'1' => array('name' => 'Users', 'roles' => array('user')),
		'1000' => array('name' => 'Administrators', 'roles' => array('user','admin')), 
	),

	'roles' => array(
		'#' => array('user' => array('login','post_login')),
		'banned' => false,
		'user' => array(
			'user' => array('login','dashboard','post_login'),
			'welcome' => array('hello')
		),
		'admin' => array('website' => 'crud', 'admin' => 'cru'),
		'super' => true
	),
	'table_name' => 'users',
);
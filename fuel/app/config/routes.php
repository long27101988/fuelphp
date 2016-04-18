<?php
return array(
	'_root_'  => 'user/login',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'signup' => 'user/signup',
	'login' => array('user/login', 'name' => ''),
	'post_login' => array(array('POST', new Route('user/post_login'))),
	/*'login' => array(
		array('GET', new Route('user/login')),
	),*/
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'admin/welcome(/:any)' => array(
										array('GET', new Route('admin/welcome/index')),
										array('POST', new Route('admin/welcome/create'))
									),

	'admin/authentical(/:any)' => array(
										array('GET', new Route('admin/authentical/index')),
										array('POST', new Route('admin/authentical/login'))
									),

	/*'admin/user(/:any)' => array(
										array('GET', new Route('admin/user/index')),
										array('POST', new Route('admin/user/login'))
									),*/

	'admin/index(/:any)' => array(
										array('GET', new Route('admin/index/index')),
										array('POST', new Route('admin/index/login'))
									),


);



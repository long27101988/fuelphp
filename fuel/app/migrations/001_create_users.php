<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'username' => array('constraint' => 100, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int'),
			'password' => array('constraint' => 50, 'type' => 'varchar'),
			'email' => array('constraint' => 250, 'type' => 'varchar'),
			'last_login' => array('constraint' => 25, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_field' => array('type' => 'text')

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}
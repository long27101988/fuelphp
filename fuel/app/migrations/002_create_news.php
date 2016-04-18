<?php

namespace Fuel\Migrations;

class Create_news
{
	public function up()
	{
		\DBUtil::create_table('news', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 100, 'type' => 'varchar'),
			'content' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('news');
	}
}
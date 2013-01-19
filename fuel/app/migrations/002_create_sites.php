<?php

namespace Fuel\Migrations;

class Create_sites
{
	public function up()
	{
		\DBUtil::create_table('sites', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
			'alias' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'url' => array('type' => 'text'),
			'pattern' => array('type' => 'text'),
			'account' => array('constraint' => 200, 'type' => 'varchar', 'null' => true),
			'password' => array('constraint' => 200, 'type' => 'varchar', 'null' => true),
			'is_camouflage_referer' => array('constraint' => 1, 'type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sites');
	}
}
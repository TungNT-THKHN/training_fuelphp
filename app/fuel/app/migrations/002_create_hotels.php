<?php

namespace Fuel\Migrations;

class Create_hotels
{
	public function up()
	{
		\DBUtil::create_table('hotels', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'hotel_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'address' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'phone' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'email' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'description' => array('type' => 'text', 'null' => true),
			'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
            'updated_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')],
			'deleted_at' => ['type' => 'timestamp', 'null' => true, 'default' => null],
		), array('id'));		
	}

	public function down()
	{
		\DBUtil::drop_table('hotels');
	}
}
<?php

namespace Fuel\Migrations;

class Add_column_image_to_hotels_table
{
	public function up()
	{
		\DBUtil::add_fields('hotels', array(
			'image' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('hotels', 'image');
	}
}
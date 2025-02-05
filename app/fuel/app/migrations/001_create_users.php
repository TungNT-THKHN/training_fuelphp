<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', [
            'id'         => ['type' => 'int', 'auto_increment' => true],
            'username'   => ['type' => 'varchar', 'constraint' => 50],
            'email'      => ['type' => 'varchar', 'constraint' => 100],
            'password'   => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
            'updated_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')],
        ], ['id']);
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}
<?php

use Fuel\Core\DB;

class Model_User extends \Orm\Model
{
	const INSERT_NEW_ID_IDX = 0;

	protected static $_properties = array(
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    );

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
	);

	public static function register(array $data)
	{
		$column = [
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => $data['password'],
		];

		$column_keys = array_keys($column);

		$sql  = 'INSERT INTO ' . self::table() . ' (' . PHP_EOL;
		$sql .= '    ' . implode(',' . PHP_EOL . '    ', $column_keys);
		$sql .= ') VALUES (' . PHP_EOL;
		$sql .= '    :' . implode(',' . PHP_EOL . '    :', $column_keys);
		$sql .= ')' . PHP_EOL;

		return DB::query($sql, DB::INSERT)->parameters($column)->execute()[self::INSERT_NEW_ID_IDX];
	}

	public static function check_login(array $data)
	{
		$params = [
			'username' => $data['username'],
			'password' => $data['password'],
		];

		$sql = 'SELECT' . PHP_EOL;
		$sql .= '	username,' . PHP_EOL;
		$sql .= '	password' . PHP_EOL;
		$sql .= 'FROM ' . self::table() . PHP_EOL;
		$sql .= 'WHERE username = :username' . PHP_EOL;
		$sql .= 'AND password = :password' . PHP_EOL;

		$user = DB::query($sql, DB::SELECT)->parameters($params)->execute()->current();

		return $user ? true : false;
	}
}

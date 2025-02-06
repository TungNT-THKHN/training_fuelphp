<?php

class Model_Hotel extends \Orm\Model_Soft
{
	const INSERT_NEW_ID_IDX = 0;
	protected static $_properties = array(
		'id',
		'hotel_name',
		'address',
		'phone',
		'email',
		'description',
		'created_at',
		'updated_at',
		'deleted_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'property' => 'created_at',
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'property' => 'updated_at',
			'mysql_timestamp' => true,
		),
	);

	protected static $_soft_delete = array(
		'deleted_field' => 'deleted_at',
		'mysql_timestamp' => true,
	);

	protected static $_table_name = 'hotels';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
	);

	public static function create_hotel(array $data)
	{
		$params = [
			'hotel_name' => $data['hotel_name'],
			'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'description' => $data['description'],
		];

		$column_keys = array_keys($params);

		$sql  = 'INSERT INTO ' . self::table() . ' (' . PHP_EOL;
		$sql .= '    ' . implode(',' . PHP_EOL . '    ', $column_keys);
		$sql .= ') VALUES (' . PHP_EOL;
		$sql .= '    :' . implode(',' . PHP_EOL . '    :', $column_keys);
		$sql .= ')' . PHP_EOL;
	
		return DB::query($sql, DB::INSERT)->parameters($params)->execute()[self::INSERT_NEW_ID_IDX];
	}
}

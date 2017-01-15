<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.12.2016
 * Time: 13:22
 */
class Migration_users extends CI_Migration {
	
	public function up() {
		// Структура таблицы `users`
		//
		// Создание: Дек 19 2016 г., 00:04
		// Последнее обновление: Дек 19 2016 г., 00:32
		//
		$this->dbforge->add_field(array(
			'use_id'           => array(
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'null'           => false,
				'auto_increment' => true,
			),
			'use_id_country'   => array(
				'type'       => 'INT',
				'constraint' => 11,
				'unsigned'   => true,
				'null'       => true,
			),
			'use_id_city'      => array(
				'type'       => 'INT',
				'constraint' => 11,
				'unsigned'   => true,
				'null'       => true,
			),
			'use_organization' => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_last_name'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_name'         => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_father_name'  => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_birthday'     => array(
				'type' => 'Date',
				'null' => true,
			),
			'use_male'         => array(
				'type'       => 'INT',
				'constraint' => 1,
				'unsigned'   => true,
				'null'       => false,
			),
			
			'use_street'      => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_building'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_room'        => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_intercom'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_destonation' => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_phone'       => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_email'       => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_password'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
			'use_comments'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
		));
		
		$this->dbforge->add_key('use_id', true);
		$this->dbforge->create_table('users', true);
		$this->db->query('ALTER TABLE `users` ADD FOREIGN KEY(`use_id_city`) REFERENCES `city`(`cit_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
		$this->db->query('ALTER TABLE `users` ADD FOREIGN KEY(`use_id_country`) REFERENCES `country`(`cou_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
		
	}
	
	public function down() {
		$this->dbforge->drop_table('users');
	}
}
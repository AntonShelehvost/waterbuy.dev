<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.12.2016
 * Time: 13:33
 */
class Migration_products extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `products`
        //
        // Создание: Дек 19 2016 г., 00:04
        // Последнее обновление: Дек 19 2016 г., 00:32
        //
        $this->dbforge->add_field(array(
            'prd_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'prd_id_providers' => array(
	            'type' => 'INT',
	            'constraint' => 11,
	            'unsigned' => TRUE,
	            'null' => FALSE,
            ),
            'prd_title' => array(
	            'type'       => 'VARCHAR',
	            'constraint' => 255,
	            'null'       => true,
            ),
            'prd_description' => array(
	            'type'       => 'VARCHAR',
	            'constraint' => 255,
	            'null'       => true,
            ),
            'prd_title_producer' => array(
	            'type'       => 'VARCHAR',
	            'constraint' => 255,
	            'null'       => true,
            ),
            'prd_comments'    => array(
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => true,
			),
            'prd_volume_price'    => array(
				'type'       => 'Float',
				'constraint' => '10,2',
				'null'       => true,
			),
            'prd_price'    => array(
				'type'       => 'Float',
				'constraint' => '10,2',
				'null'       => true,
			),
            'prd_file'    => array(
	            'type'       => 'VARCHAR',
	            'constraint' => 255,
	            'null'       => true,
            ),
            'prd_file_certificates'    => array(
	            'type'       => 'VARCHAR',
	            'constraint' => 255,
	            'null'       => true,
            ),
        ));

        $this->dbforge->add_key('prd_id', TRUE);
        $this->dbforge->create_table('products', TRUE);
	    $this->db->query('ALTER TABLE `products` ADD FOREIGN KEY (`prd_id_providers`) REFERENCES `providers` (`pro_id`) ON UPDATE CASCADE ON DELETE CASCADE;');

    }

    public function down()
    {
        $this->dbforge->drop_table('delivery_city');
    }
}
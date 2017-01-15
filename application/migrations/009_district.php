<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * cour: Администратор
 * Date: 19.12.2016
 * Time: 13:22
 */

class Migration_district extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `district`
        //
        // Создание: Янв 07 2017 г., 16:31
        // Последнее обновление: Янв 07 2017 г., 16:31
        //
        $this->dbforge->add_field(array(
            'dis_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'dis_id_country' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,

            ),
            'dis_id_region' => array(
                'type' => 'BIGINT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'dis_id_city' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'dis_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'dis_active' => array(
                'type' => 'INT',
                'constraint' => 1,
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('dis_id', TRUE);
        $this->dbforge->create_table('district', TRUE);
        $this->db->query('ALTER TABLE `district` ADD FOREIGN KEY (`dis_id_country`)   REFERENCES `country`(`cou_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `district` ADD FOREIGN KEY (`dis_id_city`)      REFERENCES `city` (`cit_id`) ON UPDATE CASCADE ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE `district` ADD FOREIGN KEY (`dis_id_region`) REFERENCES `region` (`reg_id`) ON UPDATE CASCADE ON DELETE CASCADE;');

    }

    public function down()
    {
        $this->dbforge->drop_table('district');
    }
}
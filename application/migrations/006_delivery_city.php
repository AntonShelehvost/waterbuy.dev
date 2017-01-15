<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.12.2016
 * Time: 13:33
 */
class Migration_delivery_city extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `users`
        //
        // Создание: Дек 19 2016 г., 00:04
        // Последнее обновление: Дек 19 2016 г., 00:32
        //
        $this->dbforge->add_field(array(
            'dci_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'dci_id_country' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,

            ),
            'dci_id_city' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'dci_id_providers' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'dci_active' => array(
                'type' => 'INT',
                'constraint' => 1,
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('dci_id', TRUE);
        $this->dbforge->create_table('delivery_city', TRUE);
        $this->db->query('ALTER TABLE `delivery_city` ADD FOREIGN KEY (`dci_id_country`)   REFERENCES `country`(`cou_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `delivery_city` ADD FOREIGN KEY (`dci_id_city`)      REFERENCES `city` (`cit_id`) ON UPDATE CASCADE ON DELETE CASCADE;');
        $this->db->query('ALTER TABLE `delivery_city` ADD FOREIGN KEY (`dci_id_providers`) REFERENCES `providers` (`pro_id`) ON UPDATE CASCADE ON DELETE CASCADE;');

    }

    public function down()
    {
        $this->dbforge->drop_table('delivery_city');
    }
}
<?php
/**
 * Created by PhpStorm.
 * pror: Антон
 * Date: 24.12.2016
 * Time: 19:09
 */
class Migration_Providers_add_table extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `prors`
        //
        // Создание: Дек 19 2016 г., 00:04
        // Последнее обновление: Дек 19 2016 г., 00:32
        //
        $this->dbforge->add_field(array(
            'pro_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'pro_id_country' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE
            ),
            'pro_id_city' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE
            ),
            'pro_organization' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_father_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_last_name_logist'=>array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_name_logist'=>array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_father_name_logist'=>array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_phone_logist' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_email_logist' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_comments' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_street' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_building' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_room' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_intercom' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'pro_destonation' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('pro_id', TRUE);
        $this->dbforge->create_table('providers', TRUE);
        $this->db->query('ALTER TABLE `providers` ADD FOREIGN KEY(`pro_id_city`) REFERENCES `city`(`cit_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `providers` ADD FOREIGN KEY(`pro_id_country`) REFERENCES `country`(`cou_id`) ON DELETE CASCADE ON UPDATE CASCADE;');

    }

    public function down()
    {
        $this->dbforge->drop_table('providers');
    }
}
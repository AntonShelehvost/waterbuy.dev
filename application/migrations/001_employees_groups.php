<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.12.2016
 * Time: 9:04
 */
class Migration_employees_groups extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `employees_groups`
        //
        // Создание: Дек 19 2016 г., 00:04
        // Последнее обновление: Дек 19 2016 г., 00:32
        //
        $this->dbforge->add_field(array(
            'emg_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'emg_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE
            ),
            'emg_option' => array(
                'type' => 'TEXT',
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('emg_id', TRUE);
        $this->dbforge->create_table('employees_groups', TRUE);


        //
        // Дамп данных таблицы `employees_groups`
        //
        $this->db->query("INSERT IGNORE INTO `employees_groups` (`emg_id`, `emg_name`, `emg_option`) VALUES
                            (1, 'Гости', '{}'),
                            (2, 'Поставщики', '{}'),
                            (3, 'Клиент', '{}'),
                            (4, 'Менеджер', '{}'),
                            (5, 'Админ', '{}')");

    }

    public function down()
    {
        $this->dbforge->drop_table('employees_groups');
    }
}
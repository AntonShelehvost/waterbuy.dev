<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.12.2016
 * Time: 9:04
 */
class Migration_employee extends CI_Migration
{

    public function up()
    {
        // Структура таблицы `employees_groups`
        //
        // Создание: Дек 19 2016 г., 00:04
        // Последнее обновление: Дек 19 2016 г., 00:32
        //
        $this->dbforge->add_field(array(
            'emp_id' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'null'=>FALSE,
                'auto_increment'=>TRUE
            ),
            'emp_employees_groups_id'=>array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'null'=>FALSE
            ),
            'emp_fname'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>TRUE
            ),
            'emp_lname'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>TRUE
            ),
            'emp_email'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>FALSE
            ),
            'emp_password'=>array(
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>FALSE
            ),
            'emp_online_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'emp_online'=>array(
                'type'=>'tinyint',
                'constraint'=>4,
                'null'=>FALSE,
                'default' =>'0'
            ),

        ));

        $this->dbforge->add_key('emp_id',TRUE);
        $this->dbforge->create_table('employee', TRUE);

        $this->db->query('ALTER TABLE `employee` ADD FOREIGN KEY(`emp_employees_groups_id`) REFERENCES `employees_groups`(`emg_id`) ON DELETE CASCADE ON UPDATE CASCADE;');

        $this->db->query("INSERT INTO employee (emp_id, emp_employees_groups_id, emp_fname, emp_lname, emp_email, 
                            emp_password, emp_online_date, emp_online, emp_salt, emp_confirm) 
                            VALUES (1, 5, 'Admin', '', 'admin@waterbuy.net', 'd54bbdef05bdc249ff19f05045dc9ba6', '2017-01-15 14:34:30', 0, '6fb6b846e', 1)");

    }

    public function down()
    {
        $this->dbforge->drop_table('employee');
    }
}
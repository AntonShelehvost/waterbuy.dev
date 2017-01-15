<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * cour: Администратор
 * Date: 19.12.2016
 * Time: 13:22
 */
class Migration_employee_add_field extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'emp_salt' => array('type' => 'text'),
            'emp_confirm' => array('type' => 'smallint','default' =>0),
        );
        $this->dbforge->add_column('employee', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('employee', 'emp_salt');
        $this->dbforge->drop_column('employee', 'emp_confirm');
    }
}
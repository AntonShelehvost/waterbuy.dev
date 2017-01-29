<?php

/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 29.01.2017
 * Time: 17:11
 */
class Migration_phone_addon extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'use_phone_addon' => array('type' => 'varchar(100)'),
        );

        $this->dbforge->add_column('users', $fields);

        $fields2 = array(
            'use_phone_logist_addon' => array('type' => 'varchar(100)')
        );

        $this->dbforge->add_column('users', $fields2);
    }

    public function down()
    {
        $this->dbforge->drop_column('users', 'use_phone_addon');
        $this->dbforge->drop_column('users', 'use_phone_logist_addon');
    }
}
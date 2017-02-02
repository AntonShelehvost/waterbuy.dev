<?php

/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 29.01.2017
 * Time: 17:11
 */
class Migration_delivery_product extends CI_Migration
{

    public function up()
    {
        $attributes = array('ENGINE' => 'InnoDB');

        $fields = array(
            'dep_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'dep_id_delivery' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'dep_id_product' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            )
        );
        $this->dbforge->add_field($fields);

        $this->dbforge->add_key('dep_id', TRUE);
        $this->dbforge->add_key('dep_id_delivery');
        $this->dbforge->add_key('dep_id_product');

        $this->dbforge->create_table('delivery_product', FALSE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('delivery_product');
    }
}
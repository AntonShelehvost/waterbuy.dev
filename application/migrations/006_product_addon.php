<?php

/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 02.02.2017
 * Time: 10:39
 */
class Migration_product_addon extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'prd_trademark' => array('type' => 'text'),
        );
        $this->dbforge->add_column('products', $fields);

        $fields = array(
            'prd_amount' => array('type' => 'INT'),
        );
        $this->dbforge->add_column('products', $fields);

        $fields = array(
            'prd_amount_min' => array('type' => 'INT'),
        );
        $this->dbforge->add_column('products', $fields);


    }

    public function down()
    {
        $this->dbforge->drop_column('products', 'prd_trademark');
    }
}
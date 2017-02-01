<?php

/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 29.01.2017
 * Time: 17:11
 */
class Migration_category_addon extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'cat_description' => array('type' => 'text'),
        );

        $this->dbforge->add_column('category', $fields);

    }

    public function down()
    {
        $this->dbforge->drop_column('category', 'cat_description');
    }
}
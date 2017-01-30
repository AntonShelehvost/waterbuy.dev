<?php

/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 29.01.2017
 * Time: 17:11
 */
class Migration_country_addon extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'cou_sort' => array('type' => 'INT'),
        );

        $this->dbforge->add_column('country', $fields);
        $this->db->query('SET @row_number = 0;');
        $this->db->query('update country set cou_sort=(@row_number:=@row_number + 1);');
        $this->db->query('UPDATE `country` SET `cou_sort`=-2 WHERE  `cou_id`=9908;');
        $this->db->query('UPDATE `country` SET `cou_sort`=-1 WHERE  `cou_id`=3159;');
    }

    public function down()
    {
        $this->dbforge->drop_column('country', 'cou_sort');
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * cour: Администратор
 * Date: 19.12.2016
 * Time: 13:22
 */
class Migration_providers_add_field extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'pro_time_receive_orders_begin' => array('type' => 'time'),
            'pro_time_receive_orders_end' => array('type' => 'time'),
            'pro_time_delivery_orders_begin' => array('type' => 'time'),
            'pro_time_delivery_orders_end' => array('type' => 'time'),
            'pro_days_reception_orders' => array('type' => 'text'),
            'pro_days_delivery_orders' => array('type' => 'text'),
        );
        $this->dbforge->add_column('providers', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('providers', 'pro_time_receive_orders_begin');
        $this->dbforge->drop_column('providers', 'pro_time_receive_orders_end');
        $this->dbforge->drop_column('providers', 'pro_time_delivery_orders_begin');
        $this->dbforge->drop_column('providers', 'pro_time_delivery_orders_end');
        $this->dbforge->drop_column('providers', 'pro_days_reception_orders');
        $this->dbforge->drop_column('providers', 'pro_days_delivery_orders');
    }
}
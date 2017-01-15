<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 15.01.2017
 * Time: 22:43
 */
class Migration_providers_add_region extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'pro_region' => array('type' => 'bigint'),
        );
        $this->dbforge->add_column('providers', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('providers', 'pro_region');
    }
}
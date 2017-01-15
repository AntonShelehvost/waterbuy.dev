<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * cour: Администратор
 * Date: 19.12.2016
 * Time: 13:22
 */
class Migration_district_add_field extends CI_Migration
{

    public function up()
    {
        $fields = array(
            'dci_id_region' => array('type' => 'int')
        );
        $this->dbforge->add_column('delivery_city', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('delivery_city', 'dci_id_region');
    }
}
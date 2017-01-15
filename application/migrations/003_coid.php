<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 02.01.2017
 * Time: 13:33
 */
class Migration_coid extends CI_Migration
{

    public function up()
    {
        set_time_limit(0);
        //cit_id_region
        $fields = array(
            'cit_id_region' => array('type' => 'int')
        );
        //$this->dbforge->add_column('city', $fields);
        //cou_id_city
        $fields1 = array(
            'cou_id_city' => array('type' => 'int')
        );
        //$this->dbforge->add_column('country', $fields1);
        $_ci = &get_instance();
        $txt = file_get_contents("./uploads/rocid.sql");
        $arr = explode(';',$txt);
        //echo 'All querys array = '.count($arr);
        foreach($arr as $item=>$query) {
            $_ci->db->query($query);
          //  echo $item. " / date('y-m-d H:i:s') - ".$_ci->db->last_query().'<br>'.PHP_EOL;
        }
    }

    public function down()
    {
        $_ci = &get_instance();
        $_ci->db->truncate('city');
    }
}
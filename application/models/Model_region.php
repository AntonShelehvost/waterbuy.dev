<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_region extends CI_Model
{

    var $table = 'region';

    public function find($id)
    {
        return $this->db->where('reg_id', $id)->get('region');
    }

    public function get_all()
    {
        return $this->db->get('region')->result();
    }

    public function insert()
    {
        $_ci = &get_instance();
        return $this->db->insert('region', $_ci->input->post());
    }

    public function getFields()
    {
        return $this->db->field_data('region');
    }

    public function update($data, $id)
    {
        $this->db->where('reg_id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id){
        $this->db->where('reg_id', $id);
        return $this->db->delete($this->table);
    }

    public function get_region_by_country($country)
    {
        if (!isset($country)) return false;
        return $this->db->where('reg_id_country', $country)->order_by('reg_name')->get('region')->result_array();
    }

} // endClass
<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_district extends CI_Model
{

    var $table = 'district';

    public function find($id)
    {
        return $this->db->where('dis_id', $id)->get('city');
    }

    public function get_all()
    {
        return $this->db->get('district')->result();
    }

    public function insert()
    {
        $_ci = &get_instance();
        return $this->db->insert('district', $_ci->input->post());
    }

    public function getFields()
    {
        return $this->db->field_data('district');
    }

    public function update($data, $id)
    {
        $this->db->where('dis_id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id){
        $this->db->where('dis_id', $id);
        return $this->db->delete($this->table);
    }

    public function get_district($country, $department = null, $city = null)
    {
        if (!isset($country)) return false;
        if (isset($department))
            $this->db->where('dis_id_region', $department);
        if (isset($city))
            $this->db->where('dis_id_city', $city);

        return $this->db->where('dis_id_country', $country)->order_by('dis_name')->get('district')->result_array();
    }

} // endClass
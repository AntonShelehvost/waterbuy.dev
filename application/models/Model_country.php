<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_country extends CI_Model
{

    /**
     * @var string
     */
    var $table = 'country';

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->where('cou_id', $id)->get('country');
    }

    /**
     * @return mixed
     */
    public function get_all()
    {
        return $this->db->order_by('cou_name')->get('country')->result();
    }

    /**
     * @return mixed
     */
    public function insert()
    {
        $_ci = &get_instance();
        return $this->db->insert('country', $_ci->input->post());
    }

    /**
     * @param $data
     * @param $id
     *
     * @return boolean
     */
    public function update($data, $id)
    {
        $this->db->where('cou_id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id){
        $this->db->where('cou_id', $id);
        return $this->db->delete($this->table);
    }
    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->db->field_data($this->table);
    }
} // endClass
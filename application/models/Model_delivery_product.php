<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 02.02.17
 * Time: 10:34
 */
class Model_delivery_product extends CI_Model
{

    /**
     * @var string
     */
    var $table = 'delivery_product';

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->where('dep_id', $id)->get($this->table)->result();
    }

    /**
     * @return mixed
     */
    public function get_all()
    {
        return $this->db->order_by('dep_id')->get($this->table)->result();
    }

    /**
     * @return mixed
     */
    public function insert()
    {
        $_ci = &get_instance();
        return $this->db->insert($this->table, $_ci->input->post());
    }

    /**
     * @return mixed
     */
    public function insert_data($data)
    {
        $_ci = &get_instance();
        return $this->db->insert($this->table, $data);
    }

    /**
     * @param $data
     * @param $id
     *
     * @return boolean
     */
    public function update($data, $id)
    {
        $this->db->where('dep_id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('dep_id', $id);
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
<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_delivery extends CI_Model
{

    var $table = 'delivery';
    var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array(); //set column field database for datatable searchable
    var $order = array('del_id' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->select('delivery.*,cit_name,dis_name,cou_name,reg_name');
        $this->db->from($this->table);

        $this->db->join('country', 'delivery.del_id_country = country.cou_id', 'left');
        $this->db->join('region', 'delivery.del_id_region = region.reg_id', 'left');
        $this->db->join('city', 'delivery.del_id_city = city.cit_id', 'left');
        $this->db->join('district', 'delivery.del_id_district = district.dis_id', 'left');
        $i = 0;
        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $id_user = $this->session->userdata('id_user');
        else
            $id_user = $this->input->get('provider');
        $this->db->where('del_id_user', $id_user);
        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            if (isset($this->order)) {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->join('country', 'delivery.del_id_country = country.cou_id', 'left');
        $this->db->join('region', 'delivery.del_id_country = region.reg_id', 'left');
        $this->db->join('city', 'delivery.del_id_country = city.cit_id', 'left');
        $this->db->join('district', 'delivery.del_id_country = district.dis_id', 'left');
        return $this->db->count_all_results();
    }


    public function find($id)
    {
        return $this->db->where('del_id', $id)->get('city');
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert()
    {
        $_ci = &get_instance();
        return $this->db->insert($this->table, $_ci->input->post());
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function update($id)
    {
        $_ci = &get_instance();
        $this->db->where('del_id', $id);
        return $this->db->update($this->table, $_ci->input->post());
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('del_id', $id);
        return $this->db->delete($this->table);
    }

    public function get_district($country, $department = null, $city = null)
    {
        if (!isset($country)) return false;
        if (isset($department))
            $this->db->where('del_id_region', $department);
        if (isset($city))
            $this->db->where('del_id_city', $city);

        return $this->db->where('del_id_country', $country)->order_by('del_name')->get($this->table)->result_array();
    }

} // endClass
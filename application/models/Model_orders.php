<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_orders extends CI_Model
{

    var $table = 'orders';
    var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array(); //set column field database for datatable searchable
    var $order = array('ord_id' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->select('*,orders.created_at as cdate');
        $this->db->from($this->table);
        if(isset($_POST['id'])&&!empty($_POST['id'])){
            $this->db->where('ord_id_orders',$_POST['id']);
        }
        $this->db->join('country', 'orders.ord_id_country = country.cou_id', 'left');
        $this->db->join('users', 'orders.ord_id_user = users.use_id', 'left');
        $this->db->join('region', 'orders.ord_id_region = region.reg_id', 'left');
        $this->db->join('city', 'orders.ord_id_city = city.cit_id', 'left');
        $this->db->join('district', 'orders.ord_id_district = district.dis_id', 'left');
        $i = 0;

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
        return $this->db->count_all_results();
    }


    public function find($id)
    {
        return $this->db->where('ord_id', $id)->get('city');
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

    public function insert_data($data)
    {
        $_ci = &get_instance();
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function update($id)
    {
        $_ci = &get_instance();
        $this->db->where('ord_id', $id);
        return $this->db->update($this->table, $_ci->input->post());
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('ord_id', $id);
        return $this->db->delete($this->table);
    }

    public function get_user_by_name()
    {
        $this->db->select('ord_id as id,concat(ord_father_name," ",ord_name," ",ord_last_name)as name');
        $this->db->like('ord_name', $this->input->get('query'));
        $query = $this->db->get($this->table)->result();
        $data = [];
        foreach ($query as $item) {
            $data[] = ['id' => $item->id, 'label' => $item->name];
        }
        return $data;
    }

    public function get_address()
    {
        $this->db->where('ord_id', $this->input->post('id'));
        $arr = $this->db->get($this->table)->result();
        return !empty($arr[0]) ? $arr[0] : false;
    }

} // endClass
<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_orders_items extends CI_Model
{

    /**
     * @var string
     */
    var $table = 'orders_items';
    /**
     * @var array
     */
    var $column_order = array(); //set column field database for datatable orderable
    /**
     * @var array
     */
    var $column_search = array(); //set column field database for datatable searchable
    /**
     * @var array
     */
    var $order = array('ori_id' => 'asc'); // default order

    /**
     *
     */
    private function _get_datatables_query()
    {


        $this->db->from($this->table);
        if(isset($_GET['id'])){
            $this->db->where('ori_id_orders',$_GET['id']);
        }
        $this->db->join('products', 'products.prd_id = ori_id_products', 'left');
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

    /**
     * @return mixed
     */
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @return mixed
     */
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * @return mixed
     */
    public function count_all()
    {
        $this->db->from($this->table);
        if(isset($_GET['id'])){
            $this->db->where('ori_id_orders',$_GET['id']);
        }
        $this->db->join('products', 'products.prd_id = ori_id_products', 'left');
        return $this->db->count_all_results();
    }


    /**
     * @param $id
     * @return bool
     */
    public function find($id)
    {
        $item = $this->db->where('ori_id', $id)->get($this->table)->result();
        return !empty($item[0]) ? $item[0] : false;
    }

    /**
     * @return mixed
     */
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    /**
     * @return mixed
     */
    public function insert()
    {
        $_ci = &get_instance();
        $this->db->insert($this->table, $_ci->input->post());
        return $this->db->insert_id();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function insert_data($data)
    {
        $_ci = &get_instance();
       return $this->db->insert($this->table, $data);

    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $_ci = &get_instance();
        $this->db->where('ori_id', $id);
        return $this->db->update($this->table, $_ci->input->post());
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('ori_id', $id);
        return $this->db->delete($this->table);
    }



} // endClass
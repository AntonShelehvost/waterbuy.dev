<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_category extends CI_Model
{

    /**
     * @var string
     */
    var $table = 'category';
    var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array(); //set column field database for datatable searchable
    var $order = array('cat_id' => 'asc'); // default order

    private function _get_datatables_query()
    {


        $this->db->from($this->table);
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

    public function get_root()
    {
        $this->db->where('cat_pid', 0);
        return $this->db->get($this->table)->result();
    }

    public function get_category_tree()
    {
        $data = [];
        $cat = $this->get_root();

        foreach ($cat as $item) {
            $data[] = ['id' => $item->cat_id, 'name' => $item->cat_name, 'level' => false];
            $sub_castegory = $this->find_sub_category($item->cat_id);
            foreach ($sub_castegory as $value) {
                $data[] = ['id' => $value->cat_id, 'name' => $value->cat_name, 'level' => true];
            }
        }
        return $data;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find_sub_category($id)
    {
        return $this->db->where('cat_pid', $id)->get($this->table)->result();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->where('cat_id', $id)->get($this->table)->result();
    }

    /**
     * @return mixed
     */
    public function get_all()
    {
        return $this->db->order_by('cat_id')->get($this->table)->result();
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
     * @param $data
     * @param $id
     *
     * @return boolean
     */
    public function update($data, $id)
    {
        $this->db->where('cat_id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->db->where('cat_id', $id);
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
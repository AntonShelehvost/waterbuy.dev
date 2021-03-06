<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_products extends CI_Model
{

    var $table = 'products';

    var $column_order = array(
        null,
        'prd_title',
        'prd_description',
        'prd_title_producer',
        'prd_comments',
        'prd_volume_price',
        'prd_price',
        'cou_name'
    ); //set column field database for datatable orderable
    var $column_search = array(
        null,
        'prd_title',
        'prd_title_producer',
        'prd_description',
        'prd_volume_price',
        'prd_price',
        null
    ); //set column field database for datatable searchable

    var $order = array('prd_id' => 'asc'); // default order

    public function find($id)
    {
        return $this->db->where('prd_id', $id)->get('products')->result();
    }

    public function get_all()
    {
        return $this->db->get('products')->result();
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function insert()
    {
        $_ci = &get_instance();
        if ($this->db->insert($this->table, $_ci->input->post())) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function insert_data($data)
    {
        $_ci = &get_instance();
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    function update($id)
    {
        $this->db->where('prd_id', $id);
        return $this->db->update($this->table, $this->input->post());
    }

    public function get_products($where, $order)
    {
        $this->db->where($where);
        $this->db->join('users', $this->table . '.prd_id_user = users.use_id');
        $this->db->join('delivery_product', $this->table . '.prd_id = delivery_product.dep_id_product');
        $this->db->join('delivery', 'delivery_product.dep_id_delivery = delivery.del_id');
        $this->db->from($this->table);
        $this->db->order_by($order);
        $query = $this->db->get();
        return $query->result();

    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $this->db->join('users', $this->table . '.prd_id_user = users.use_id');
        $this->db->join('employee', 'users.use_id = employee.emp_id_user');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');
        $this->db->join('country', 'users.use_id_country = country.cou_id');
        $i = 0;
        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $this->db->where('prd_id_user', $this->session->userdata('id_user'));

        if (isset($_GET['prd_id']) && !empty($_GET['prd_id']))
            $this->db->where('prd_id_user', $_GET['prd_id']);
        if (isset($_GET['cat_id']) && !empty($_GET['cat_id']))
            $this->db->where('`prd_id_category` in (select c.cat_id from category c where c.cat_id=' . $_GET['cat_id'] . ' or c.cat_pid=' . $_GET['cat_id'] . ')');
        $set = false;
        foreach ($this->column_search as $key => $item) // loop column
        {
            if (isset($_POST['columns'][$key]['search']) && !empty($_POST['columns'][$key]['search']['value']) && !empty($item)) // if datatable send POST for search
            {
                $set = true;
                if ($i === 0) // first loop
                {
                    //$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['columns'][$key]['search']['value']);
                } else {
                    $this->db->like($item, $_POST['columns'][$key]['search']['value']);
                }
            }
            $i++;
        }

        if (!$set)
            foreach ($this->column_search as $item) // loop column
            {
                if ($_POST['search']['value'] && !empty($item)) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value'], 'before');
                    } else {
                        $this->db->or_like($item, $_POST['search']['value'], 'before');
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

    public function get_locations($id)
    {
        $result = $this->db->query('select c.cou_name, r.reg_name, ci.cit_name, di.dis_name 

                        from delivery_product dp,
                             delivery d 
                        
                        left join country c on c.cou_id=d.del_id_country
                        left join region r on r.reg_id=d.del_id_region
                        left join city ci on ci.cit_id=d.del_id_city
                        left join district di on di.dis_id=d.del_id_district
                        where d.del_id=dp.dep_id_delivery and dp.dep_id_product=' . $id . '
                        group by c.cou_name, r.reg_name, ci.cit_name, di.dis_name ')
            ->result();
        $text = '';
        foreach ($result as $item) {
            $text .= $item->cou_name . ' ' . $item->reg_name . '' . $item->cit_name . ' ' . $item->dis_name . ' <br>';
        }

        return $text;
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->join('users', $this->table . '.prd_id_user = users.use_id');
        $this->db->join('employee', 'users.use_id = employee.emp_id_user');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');
        $this->db->join('country', 'users.use_id_country = country.cou_id');
        return $this->db->count_all_results();
    }

    public function delete($id)
    {
        $this->db->where('prd_id', $id);
        return $this->db->delete($this->table);
    }

    function get_min_order($country, $department = null, $city = null)
    {
        if (!isset($country)) return false;
        if (isset($department))
            $this->db->where('dis_id_region', $department);
        if (isset($city))
            $this->db->where('dis_id_city', $city);


    }


} // endClass
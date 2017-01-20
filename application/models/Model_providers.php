<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_providers extends CI_Model
{

    var $table = 'providers';

    var $column_order = array(
        null,
        'pro_mane',
        'employee.emp_online_date',
        'pro_phone',
        'employees_groups.emg_name',
        'employee.emp_online',
    ); //set column field database for datatable orderable
    var $column_search = array(
        'pro_mane',
        'employee.emp_online_date',
        'pro_phone',
        'employees_groups.emg_name',
        'employee.emp_online',
    ); //set column field database for datatable searchable
    var $order = array('pro_id' => 'asc'); // default order


    public function find($id)
    {
        return $this->db->where('pro_id', $id)->join('city', 'city.cit_id=pro_id_city')->get($this->table)->result();
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert()
    {
        $_ci = &get_instance();
        $_POST['pro_password'] = $this->hash_password($this->input->post('pro_password'));

        if ($this->db->insert($this->table, $this->input->post())) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function add_providers($data = false)
    {

        $_POST['pro_days_reception_orders'] = array_sum($this->input->post('pro_days_reception_orders[]'));
        unset($_POST['pro_days_reception_orders[]']);

        $_POST['pro_days_delivery_orders'] = array_sum($this->input->post('pro_days_delivery_orders[]'));
        unset($_POST['pro_days_delivery_orders[]']);

        $_POST['pro_password'] = $this->hash_password($this->input->post('pro_password'));
        if ($this->db->insert($this->table, $this->input->post())) {
            return $this->db->insert_id();
        }
        return false;
    }

    function update($id)
    {

        $_POST['pro_days_reception_orders'] = implode('|', (array)$this->input->post('pro_days_reception_orders'));
        unset($_POST['pro_days_reception_orders[]']);
        $_POST['pro_days_delivery_orders'] = implode('|', (array)$this->input->post('pro_days_delivery_orders'));
        unset($_POST['pro_days_delivery_orders[]']);

        $this->db->where('pro_id', $id);
        return $this->db->update($this->table, $this->input->post());
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->join('employee', $this->table . '.pro_email = employee.emp_email');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');
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
        $this->db->join('employee', $this->table . '.pro_email = employee.emp_email');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');

        return $this->db->count_all_results();
    }

    /**
     *
     * @param $password
     *
     * @return password
     * @author Tremor
     */
    public function hash_password($password)
    {
        return md5($password);
    }

    public function get_by_employee($id)
    {
        return $this->db->where('pro_id_employee', $id)->join('city', 'city.cit_id=pro_id_city')->get($this->table)->result();
    }

} // endClass
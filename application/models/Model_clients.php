<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_clients extends CI_Model
{
	
	
	var $table = 'users';
	var $column_order = array(null, 'use_mane','employee.emp_online_date','use_phone','employees_groups.emg_name','employee.emp_online'); //set column field database for datatable orderable
	var $column_search = array( 'use_mane','employee.emp_online_date','use_phone','employees_groups.emg_name','employee.emp_online'); //set column field database for datatable searchable
	var $order = array('use_id' => 'asc'); // default order
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
        $this->db->join('employee', $this->table . '.use_id = employee.emp_id_user');
		$this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=3');
		$i = 0;
		
		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	public function getFields()
	{
		return $this->db->field_data($this->table);
	}
	
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
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
        $this->db->join('employee', $this->table . '.use_id = employee.emp_id_user');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=3');

        return $this->db->count_all_results();
	}
	

} // endClass
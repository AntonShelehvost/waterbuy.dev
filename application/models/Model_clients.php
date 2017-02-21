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


	var $column_order = array("concat(use_last_name,' ',use_name,' ',use_father_name)", 'use_phone', null); //set column field database for datatable orderable
	var $column_search = array("concat(use_last_name,' ',use_name,' ',use_father_name)", 'use_phone', null); //set column field database for datatable searchable
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

		$this->db->join('country', 'users.use_id_country = country.cou_id', 'left');
		$this->db->join('region', 'users.use_id_region = region.reg_id', 'left');
		$this->db->join('city', 'users.use_id_city = city.cit_id', 'left');
		$this->db->join('district', 'users.use_id_district = district.dis_id', 'left');
		$i = 0;

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

	function get_all()
	{
		$this->db->from($this->table);
		$this->db->join('employee', $this->table . '.use_id = employee.emp_id_user');
		$this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=3');
		$query = $this->db->get();
		return $query->result();
	}

	
	public function count_all()
	{
		$this->db->from($this->table);
        $this->db->join('employee', $this->table . '.use_id = employee.emp_id_user');
        $this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=3');
		$this->db->join('country', 'users.use_id_country = country.cou_id', 'left');
		$this->db->join('region', 'users.use_id_region = region.reg_id', 'left');
		$this->db->join('city', 'users.use_id_city = city.cit_id', 'left');
		$this->db->join('district', 'users.use_id_district = district.dis_id', 'left');
        return $this->db->count_all_results();
	}

	public function delete($id)
	{
		$this->db->where('use_id', $id);
		$this->db->delete('users');
		$this->db->where('emp_id_user', $id);
		return $this->db->delete('employee');
	}



} // endClass
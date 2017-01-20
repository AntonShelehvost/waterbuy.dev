<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_products extends CI_Model
{

	var $table='products';
	
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
		'prd_description',
		'prd_title_producer',
		'prd_comments',
		'prd_volume_price',
		'prd_price'
	); //set column field database for datatable searchable
	
	var $order = array('prd_id' => 'asc'); // default order
	
	public function find($id){
		return $this->db->where('prd_id',$id)->get('products')->result();
	}
	
	public function get_all(){
		return $this->db->get('products')->result();
	}
	
	public function getFields()
	{
		return $this->db->field_data($this->table);
	}
	
	public function insert(){
		$_ci = &get_instance();
		if ($this->db->insert($this->table, $_ci->input->post())) {
			return $this->db->insert_id();
		}
		return false;
	}
	
	function update($id){
		
		$this->db->where('prd_id', $id);
		return $this->db->update($this->table,$this->input->post());
	}
	
	private function _get_datatables_query() {
		
		$this->db->from($this->table);
		
		$this->db->join('providers', $this->table.'.prd_id_providers = providers.pro_id');
		$this->db->join('employee', 'providers.pro_email = employee.emp_email');
		$this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');
		$this->db->join('country', 'providers.pro_id_country = country.cou_id');
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
			$this->db->order_by($this->column_order[ $_POST['order']['0']['column'] ], $_POST['order']['0']['dir']);
		} else {
			if (isset($this->order)) {
				$order = $this->order;
				$this->db->order_by(key($order), $order[ key($order) ]);
			}
		}
	}
	
	function get_datatables() {
		$this->_get_datatables_query();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	function count_filtered() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function count_all() {
		$this->db->from($this->table);
		$this->db->join('providers', $this->table.'.prd_id_providers = providers.pro_id');
		$this->db->join('employee', 'providers.pro_email = employee.emp_email');
		$this->db->join('employees_groups', 'employee.emp_employees_groups_id = employees_groups.emg_id and employees_groups.emg_id=2');
		$this->db->join('country', 'providers.pro_id_country = country.cou_id');
		
		return $this->db->count_all_results();
	}
	
} // endClass
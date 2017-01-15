<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_location extends CI_Model
{

	var $table='country';
	
	var $column_order = array(
		null,
		'cou_name',
		'reg_name',
		'cit_name',
		'dis_name',

	); //set column field database for datatable orderable
	var $column_search = array(
null,
		'cou_name',
		'reg_name',
		'cit_name',
		'dis_name',
	); //set column field database for datatable searchable
	
	var $order = array('cou_id' => 'asc'); // default order

	public function get_all(){
		$this->db->join('region','cou_id=reg_id_country');
		$this->db->join('city','cit_id_country=reg_id_country and cit_id_region=reg_id');
		$this->db->join('district','dis_id_country=reg_id_country and dis_id_region=reg_id and dis_id_city=cit_id');
		return $this->db->get('country')->result();
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

		$this->db->join('region','cou_id=reg_id_country');
		$this->db->join('city','cit_id_country=reg_id_country and cit_id_region=reg_id');
		$this->db->join('district','dis_id_country=reg_id_country and dis_id_region=reg_id and dis_id_city=cit_id');
		$i = 0;
		$set = false;
		foreach ($this->column_search as $key => $item) // loop column
		{
			if (isset($_POST['columns'][$key]['search']) && !empty($_POST['columns'][$key]['search']['value']) && !empty($item)) // if datatable send POST for search
			{
				$set=true;
				if ($i === 0) // first loop
				{
					//$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['columns'][$key]['search']['value']);
				} else {
					$this->db->like($item, $_POST['columns'][$key]['search']['value']);
				}
				
//				if (count($this->column_search) - 1 == $i) //last loop
//				{
//					$this->db->group_end();
//				} //close bracket
			}
			$i++;
		}

		if(!$set)
		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']&&!empty($item)) // if datatable send POST for search
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
		} elseif(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
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
		$this->db->join('region','cou_id=reg_id_country');
		$this->db->join('city','cit_id_country=reg_id_country and cit_id_region=reg_id');
		$this->db->join('district','dis_id_country=reg_id_country and dis_id_region=reg_id and dis_id_city=cit_id');
		
		return $this->db->count_all_results();
	}
	
} // endClass
<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_delivery_city extends CI_Model {
	
	var $table = 'delivery_city';
	
	public function find($id) {
		return $this->db->where('dci_id', $id)->get($this->table)->result();
	}
	
	public function get_by_providers($id) {
		$data = [];
		$delivery = $this->db->join('city','city.cit_id=dci_id_city')->where('dci_id_providers', $id)->get($this->table)->result();
		foreach ($delivery as $item) {
			$data[] = $item->cit_name;
		}
		return $data;
	}
	public function get_id_city_by_providers($id) {
		$data = [];
		$delivery = $this->db->join('city','city.cit_id=dci_id_city')->where('dci_id_providers', $id)->get($this->table)->result();
		foreach ($delivery as $item) {
			$data[] = $item->cit_id;
		}
		return $data;
	}
	
	public function getFields()
	{
		return $this->db->field_data($this->table);
	}
	
	public function get_all() {
		return $this->db->get($this->table)->result();
	}
	
	public function insert($data) {
		if ($this->db->insert($this->table, $data)) {
			return $this->db->insert_id();
		}
		return false;
	}
	
	function delete_by_providers($id) {
		return $this->db->where('dci_id_providers', $id)->delete($this->table);
	}
	
} // endClass
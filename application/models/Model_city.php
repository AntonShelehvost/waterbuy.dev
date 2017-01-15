<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_city extends CI_Model
{
	var $table = 'city';
	
	public function find($id){
		return $this->db->where('cit_id',$id)->get('city');
	}
	
	public function get_all(){
		return $this->db->get('city')->result();
	}
	
	public function insert(){
		$_ci = &get_instance();
		return $this->db->insert('city',$_ci->input->post());
	}
	
	public function getFields()
	{
		return $this->db->field_data('city');
	}

	public function update($data, $id)
	{
		$this->db->where('cit_id', $id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function delete($id){
		$this->db->where('cit_id', $id);
		return $this->db->delete($this->table);
	}

	public function get_city_by_country($country,$department=null){
		if(!isset($country))return false;
		if(isset($department))
			$this->db->where('cit_id_region',$department);

		return $this->db->where('cit_id_country',$country)->order_by('cit_name')->get('city')->result_array();
	}

} // endClass
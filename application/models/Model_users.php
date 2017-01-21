<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_users extends CI_Model {
	
	private $table = 'users';
	
	/**
	 * Checking whether the user is logged in
	 *
	 * @return boolean
	 * @author Tremor
	 */
	public function is_login() {
		if (!$this->input->is_ajax_request() && !is_file($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
			$this->session->set_userdata('admin_redirect', $_SERVER['REQUEST_URI']);
		}
		return (bool) $this->session->userdata('login');
	}
	
	/**
	 *
	 * @param $password
	 *
	 * @return password
	 * @author Tremor
	 */
	public function hash_password($password) {
		return md5($password);
	}
	
	/**
	 * Check login
	 *
	 * @param $login
	 *
	 * @return boolean
	 * @author Tremor
	 */
	public function check_login($login) {
		
		$this->db->where('emp_email', $login);
		$this->db->limit(1);
		$result = $this->db->get('employee');
		
		if ($result->num_rows() === 1) {
			$this->set_message('Такой login/email уже существует');
			return false;
		} else {
			//            $this->set_message('Login/email не занят');
			return true;
		}
		
	}
	
	public function getFields() {
		return $this->db->field_data($this->table);
	}
	
	/**
	 * @return mixed
	 */
	public function getMessage() {
		return $this->message;
	}
	
	public function find($id) {
        return $this->db->where('use_id', $id)->join('city', 'city.cit_id=users.use_id_city', 'left')->get('users')->result();
	}
	
	public function insert() {

        $_POST['use_birthday'] = date('Y-m-d', strtotime($this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day')));
        unset($_POST['year']);
        unset($_POST['day']);
        unset($_POST['month']);
        if ($this->db->insert('users', $this->input->post())) {
			return $this->db->insert_id();
		}
		return false;
	}

    public function createUser($email)
    {
        if ($this->db->insert('users', ['use_email' => $email])) {
            return $this->db->insert_id();
        }
        return false;
    }
	
	public function update($id){
        if (isset($_POST['year']) && isset($_POST['day']) && isset($_POST['month'])) {
            $_POST['use_birthday'] = date('Y-m-d', strtotime($this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day')));
            unset($_POST['year']);
            unset($_POST['day']);
            unset($_POST['month']);
        }
        return $this->db->update('users', $this->input->post(), 'use_id=' . $id, 1);
	}
	
	
} // endClass
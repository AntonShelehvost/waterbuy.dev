<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_auth extends CI_Model
{

    /**
     * Checking whether the user is logged in
     * @return boolean
     * @author AntonSh
     */
    public function is_login()
    {
        if (!$this->input->is_ajax_request() && !is_file($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) $this->session->set_userdata('admin_redirect', $_SERVER['REQUEST_URI']);
        return (bool)$this->session->userdata('login');
    }


    /**
     * Login employee
     *
     * @param $login - user email
     * @param $password - user password
     * @param $role - employees_groups id
     *
     * @return boolean
     * @author AntonSh
     */
    public function login($login, $password, $role = 5)
    {

        if (empty($login) || empty($password)) {
            return false;
        }

        $this->db->where('emp_email', $login);
        if ($role)
            $this->db->where('emp_employees_groups_id', $role);

        $this->db->limit(1);
        $result = $this->db->get('employee');
        if ($result->num_rows() === 1) {
            $employee = $result->row();
            $password = $this->hash_password_db($employee->emp_id, $password);

            if ($password === true) {

                $session_data = [
                    'employee_id' => $employee->emp_id,
                    'id_user' => $employee->emp_id_user,
                    'login' => $employee->emp_email,
                    'fname' => $employee->emp_fname,
                    'lname' => $employee->emp_lname,
                    'email' => $employee->emp_email,
                    'emp_employees_groups_id' => $employee->emp_employees_groups_id
                ];

                $this->session->set_userdata($session_data);
                $this->db->set('emp_online', 1);
                $this->db->where('emp_id', $employee->emp_id);
                $this->db->update('employee');

                $this->set_message('Авторизация прошла успешно');
                return true;
            } else {
                $this->set_message('Password невернен');
            }
        } else {
            $this->set_message('Login неверен');
            return false;
        }
    }

    /**
     *
     * @param $password
     *
     * @return password
     * @author AntonSh
     */
    public function hash_password($password)
    {
        return md5($password);
    }

    /**
     * This function takes a password and validates it
     * against an entry in the employee table.
     *
     * @param $id - employee id
     * @param $password - employee password
     *
     * @return boolean
     * @author AntonSh
     **/
    public function hash_password_db($id, $password)
    {

        if (empty($id) || empty($password)) {
            return false;
        }
        $query = $this->db->select('emp_password,emp_salt')
            ->where('emp_id', $id)
            ->limit(1)
            ->get('employee');

        $hash_password_db = $query->row();

        if ($query->num_rows() !== 1) {
            return false;
        }
        $db_password = md5($hash_password_db->emp_salt . md5($hash_password_db->emp_salt . md5($password)));

        return ($db_password == $hash_password_db->emp_password) ? true : false;
    }

    /**
     * Insert into session employee data
     *
     * @param $employee array of data employee
     *
     * @return boolean
     * @author AntonSh
     */
    public function set_session($employee)
    {

        if (empty($employee) || !is_array($employee)) {
            return false;
        }
        $session_data = array(
            'login' => $employee->emp_email,
            'fname' => $employee->emp_fname,
            'lname' => $employee->emp_lname,
            'email' => $employee->emp_email,
            'employee_id' => $employee->emp_id,
            'emp_employees_groups_id' => $employee->emp_employees_groups_id
        );

        $this->session->set_userdata($session_data);

        return true;
    }

    /**
     * logout admin
     * @return boolean
     * @author AntonSh
     **/
    public function logout()
    {
        $session_data = array(
            'login' => '',
            'fname' => '',
            'lname' => '',
            'email' => '',
            'employee_id' => '',
            'emp_employees_groups_id' => ''
        );
        $this->db->query("update employee set emp_online = 0 where emp_id=" . $this->session->userdata('employee_id'));
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();

        //Recreate the session
        if (substr(CI_VERSION, 0, 1) == '2') {
            //$this->session->sess_create();
        } else {
            $this->session->sess_regenerate(true);
        }

        return true;
    }

    /**
     * Check login
     *
     * @param $login
     *
     * @return boolean
     * @author AntonSh
     */
    public function check_login($login, $role = false)
    {

        $this->db->where('emp_email', $login);
        if ($role)
            $this->db->where('emp_employees_groups_id', $role);
        $this->db->limit(1);
        $result = $this->db->get('employee');
        if ($result->num_rows() === 1) {
            $this->set_message('Такой login/email уже существует');
            return false;
        } else {
            return true;
        }

    }

    /**
     * Get a list of employees access
     *
     * @param $page - page name
     * @param $id_employee - employee identity
     *
     * @return access list
     * @author AntonSh
     */
    public function get_employee_access($id_employee, $page)
    {

        $this->db->select('employee_group.emg_option');
        $this->db->join('employee_group', 'employee_group.emg_id = employee.emp_employee_group_id', 'left');
        $this->db->where('employee.emp_id', $id_employee);
        $result = $this->db->get('employee')->row_array();

        $option = json_decode($result['emg_option'], true);

        $access = array(
            'read' => $option['read'][$page],
            'write' => $option['write'][$page]
        );

        return $access;
    }

} // endClass
<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:17
 */
class Model_employee extends CI_Model
{

    private $table = 'employee';

    public $error_registration = '';

    public function find($id)
    {
        return $this->db->where('emp_id', $id)->get($this->table)->result();
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert()
    {
        $_ci = &get_instance();
        $this->db->insert($this->table, $_ci->input->post());
    }

    public function set_user_email_check($id_user)
    {
        $this->db->where('emp_id_user', $id_user);
        $data = ['emp_confirm' => 1];
        return $this->db->update($this->table, $data);
    }


    public function add_employee($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function update($id_user, $data)
    {
        $this->db->where('emp_id_user', $id_user);
        return $this->db->update($this->table, $data);
    }

    public function create_user_pass($user_id)
    {

        $new_pass = substr(md5(uniqid(rand(), true)), 0, 8);

        if ($this->_send_new_pass_to_email($user_id, $new_pass)) {
            $salt = $this->generate_salt();
            $password = $this->generate_password($salt, $new_pass);
            if (!$password) return false;

            $this->db
                ->set('emp_password', $password)
                ->set('emp_salt', $salt)
                ->where('emp_id', (int)$user_id)
                ->update($this->table);

            return true;
        }

        return false;
    }

    public function get_user($user_id)
    {
        $user = $this->db->where('emp_id_user', $user_id)->get($this->table)->result();
        return $user[0];
    }

    public function get_user_by_email($email, $employees_groups)
    {
        $this->db->where('emp_email', $email);
        $this->db->where('emp_employees_groups_id', $employees_groups);
        $user = $this->db->get($this->table)->result();
        // var_dump($user,$this->db->last_query());die;
        return (isset($user[0]) ? $user[0] : false);
    }

    private function get_employee($emp_id)
    {
        $user = $this->db->where('emp_id', $emp_id)->get($this->table)->result();
        return $user[0];
    }

    public function generate_salt()
    {
        return substr(md5(uniqid(rand(), true)), 0, 9);
    }

    public function generate_password($salt = '', $password = '')
    {
        if ($password == '') {
            $this->error_registration = 'error_password_generation';
            return false;
        }
        if ($salt == '') $salt = $this->generate_salt();
        return md5($salt . md5($salt . md5($password)));
    }

    public function get_user_confirm_code($user_id = 0)
    {

        $user = $this->get_user($user_id);
        if (empty($user)) return $user;

        if ($user->emp_confirm != 1) {
            return substr($this->generate_password($user->emp_salt, $user->emp_password), 0, 16);
        }

        return false;
    }

    public function send_reset_password_to_email($email, $new_pass)
    {
        $_ci =& get_instance();
        $_ci->lang->load('email', 'english');

        $data['login'] = $email;
        $data['password'] = $new_pass;
        $data['text_email_new_pass_subject'] = $_ci->lang->line('text_email_new_pass_subject');
        $data['text_email_hello'] = $_ci->lang->line('text_email_hello');
        $data['text_email_new_pass_text1'] = $_ci->lang->line('text_email_new_pass_text1');
        $data['text_email_new_pass_save_access_data'] = $_ci->lang->line('text_email_new_pass_save_access_data');
        $data['text_email_login'] = $_ci->lang->line('text_email_login');
        $data['text_email_password'] = $_ci->lang->line('text_email_password');
        $data['base_url'] = base_url();

        $data['text_email_registration_subject'] = $_ci->lang->line('text_email_registration_subject');
        $data['text_email_hello'] = $_ci->lang->line('text_email_hello');
        $data['text_email_congratulations'] = $_ci->lang->line('text_email_congratulations');
        $data['text_email_thank_you'] = $_ci->lang->line('text_email_thank_you');
        $data['text_email_to_confirm_registration'] = $_ci->lang->line('text_email_to_confirm_registration');
        $data['text_email_save_access_data'] = $_ci->lang->line('text_email_save_access_data');
        $data['text_email_confirm_registration'] = $_ci->lang->line('text_email_confirm_registration');

        //echo ;die;

        $res = mega_send_email(
            $data['login'],
            $data['text_email_new_pass_subject'],
            $_ci->load->view('/admin/email/view_email_new_password', $data, true)
        );

        return $res;
    }

    public function _send_new_pass_to_email($user_id, $new_pass)
    {
        $_ci =& get_instance();
        $_ci->lang->load('email', 'english');
        $user = $this->get_user($user_id);

        $data['login'] = $user->emp_email;
        $data['password'] = $new_pass;
        $data['user_id'] = $user_id;

        $data['text_email_new_pass_subject'] = $_ci->lang->line('text_email_new_pass_subject');
        $data['text_email_hello'] = $_ci->lang->line('text_email_hello');
        $data['text_email_new_pass_text1'] = $_ci->lang->line('text_email_new_pass_text1');
        $data['text_email_new_pass_save_access_data'] = $_ci->lang->line('text_email_new_pass_save_access_data');
        $data['text_email_login'] = $_ci->lang->line('text_email_login');
        $data['text_email_password'] = $_ci->lang->line('text_email_password');
        $data['base_url'] = base_url();
        $data['confirm_code'] = $this->get_user_confirm_code($user_id);
        $data['text_email_registration_subject'] = $_ci->lang->line('text_email_registration_subject');
        $data['text_email_hello'] = $_ci->lang->line('text_email_hello');
        $data['text_email_congratulations'] = $_ci->lang->line('text_email_congratulations');
        $data['text_email_thank_you'] = $_ci->lang->line('text_email_thank_you');
        $data['text_email_to_confirm_registration'] = $_ci->lang->line('text_email_to_confirm_registration');
        $data['text_email_save_access_data'] = $_ci->lang->line('text_email_save_access_data');
        $data['text_email_confirm_registration'] = $_ci->lang->line('text_email_confirm_registration');
        $res = mega_send_email(
            $data['login'],
            $data['text_email_new_pass_subject'],
            $_ci->load->view('admin/email/view_email_registration.php', $data, true)
        );

        return $res;
    }

    public function create_access_account($user_id)
    {
        $salt = $this->generate_salt();
        $new_pass = substr(md5(uniqid(rand(), true)), 0, 8);
        $password = $this->generate_password($salt, $new_pass);

        $this->db
            ->set('emp_password', $password)
            ->set('emp_salt', $salt)
            ->where('emp_id', $user_id)
            ->update($this->table);
        $user = $this->get_employee($user_id);
        return $this->_send_new_pass_to_email($user->emp_id_user, $new_pass);
    }
} // endClass
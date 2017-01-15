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

    public function add_employee($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getFields()
    {
        return $this->db->field_data($this->table);
    }

    public function update($email, $data)
    {
        $this->db->where('emp_email', $email);
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

    private function get_user($user_id)
    {
        $user = $this->find($user_id);
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
        return $this->_send_new_pass_to_email($user_id, $new_pass);
    }
} // endClass
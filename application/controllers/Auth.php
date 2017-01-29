<?php

/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:16
 */
class Auth extends CI_Controller
{

    public $page = array(
        'title' => '',
        'data' => '',
        'content' => '',
        'active' => 'auth'
    );

    public $error_registration = '';

    /* @name_rus - Страница авторизации */

    /**
     * initial cntroller settings
     */
    function __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_auth');
        $this->load->library('form_validation');

    }

    /**
     * index auth page
     */
    public function index()
    {

        $this->page['content'] = $this->load->view('admin/auth/login', $this->page, true);
    }

    public function generate_p()
    {
        $this->load->model('model_employee');
        $p = $this->input->get('p');
        $salt = $this->model_employee->generate_salt();
        echo $salt;
        echo '<br>';
        echo $this->model_employee->generate_password($salt, $p);
    }

    /**
     * Login to admin panel
     * @return nothing
     * @author AntonSH
     */
    public function login()
    {

        $data = array();
        $this->load->helper('security');
        $this->form_validation->set_rules('login', 'Login', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|trim|required');

        if ($this->form_validation->run() == true) {

            if ($this->model_auth->login($this->input->post('login'), $this->input->post('password'))) {
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->model_auth->messages());
                $redirect = $this->session->userdata('admin_redirect');
                if ($redirect) {
                    $this->session->set_userdata('admin_redirect', false);
                    $this->session->unset_userdata('admin_redirect');
                    redirect($redirect, 'refresh');
                }

                redirect('/admin', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->model_auth->messages());
                redirect('/auth/login', 'refresh');
            }

        } else {

            $data['login'] = $this->input->post('login');
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['no_visible_elements'] = true;

            $this->load->view('admin/auth/login', $data);

        }
    }

    /**
     * Login to admin panel
     * @return nothing
     * @author AntonSH
     */
    public function login_ajax()
    {

        $data = array();
        $this->load->helper('security');
        $this->form_validation->set_rules('login', 'Login', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|trim|required');

        if ($this->form_validation->run() == true) {

            if ($this->model_auth->login($this->input->post('login'), $this->input->post('password'), $this->input->post('employees_groups'))) {

                $this->session->set_flashdata('message', $this->model_auth->messages());
                $data['login'] = $this->input->post('login');
                $data['message'] = 'Авторизация прошла успешно';
                $data['auth'] = true;
                $data['redirect'] = true;

                echo json_encode($data);
                return true;
            } else {
                $data['login'] = $this->input->post('login');
                $data['message'] = '<span>Вы ввели некорректное имя или пароль. Пожалуйста, попробуйте еще раз.</span>';
                $data['auth'] = false;

                echo json_encode($data);
                return false;
            }

        } else {

            $data['login'] = $this->input->post('login');
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['auth'] = false;

            echo json_encode($data);
            return false;
        }
    }

    /**
     * Logout admin
     * @return nothing
     * @author AntonSH
     */
    public function logout()
    {

        $url = '';
        $this->data['title'] = "Logout";
        if (in_array($this->session->userdata('emp_employees_groups_id'), ['2', '3']))
            $url = '/';
        else
            $url = '/auth/login';
        //log the employee out
        $this->model_auth->logout();
        redirect($url, 'refresh');
    }

    /**
     * create test account
     * @return nothing
     * @author AntonSH
     */
    public function ins()
    {

        $array_data = array(
            'emp_password' => md5('176083549sQ'),
            'emp_fname' => 'Admin',
            'emp_lname' => '',
            'emp_email' => 'admin@waterbuy.net',
            'emp_employees_groups_id' => 5,
        );

        $this->db->insert('employee', $array_data);
    }

    function ajax_reset()
    {
        $this->load->model('model_employee');
        $this->load->model('model_auth');
        $this->load->model('model_users');
        $user = $this->model_employee->get_user_by_email($this->input->post('login'), $this->input->post('employees_groups'));
        if (!empty($user)) {
            $new_password = substr(md5(uniqid(rand(), true)), 0, 8);
            $password = $this->model_employee->generate_password($user->emp_salt, $new_password);
            $this->model_employee->update($user->emp_id_user, ['emp_password' => $password, 'updated_at' => date('Y-m-d H:i:S')]);
            $this->model_employee->send_reset_password_to_email($this->input->post('login'), $new_password);
            $data['message'] = 'Вам на электронную почту отправлено письмо с временным паролем.';
            $data['result'] = true;
        } else {
            $data['message'] = 'Пользователь с таким email не существует.';
            $data['result'] = false;
        }
        echo json_encode($data);
        return false;
    }

    function ajax_registration()
    {
        $this->load->model('model_employee');
        $this->load->model('model_auth');
        $this->load->model('model_users');
        if ($this->model_auth->check_login($this->input->post('login'), $this->input->post('employees_groups'))) {

            $id_user = $this->model_users->createUser($this->input->post('login'));
            if ($id_user) {
                $data = [
                    'emp_employees_groups_id' => $this->input->post('employees_groups'),
                    'emp_id_user' => $id_user,
                    'emp_fname' => '',
                    'emp_lname' => '',
                    'emp_email' => $this->input->post('login'),
                ];
                $emp_id = $this->model_employee->add_employee($data);
                if ($this->model_employee->create_access_account($emp_id)) {
                    $data['message'] = 'После создания аккаунта Waterbuy.net на указанный вами при регистрации адрес электронной почты придет письмо со ссылкой для подтверждения.';
                    $data['registration'] = true;
                } else {
                    $data['message'] = '';
                    $data['registration'] = false;
                }
            } else {
                $data['message'] = 'Извените! Ошибка создания пользователя. Обратитесь к администратору сайта!';
                $data['registration'] = false;
            }

        } else {
            $data['message'] = 'Пользователь с таким email уже существует.';
            $data['registration'] = false;
        }
        echo json_encode($data);
        return false;
    }
} // end Class

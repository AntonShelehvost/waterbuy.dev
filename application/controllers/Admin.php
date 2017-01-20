<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * initial cntroller settings
     */
    function __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('model_auth');
        $this->load->library('form_validation');
        if (!$this->model_auth->is_login()) {
            redirect('/auth/login');
        } elseif (!in_array($this->session->userdata('emp_employees_groups_id'), [4, 5])) {
            //redirect('/profile');
        }
    }

    public function index()
    {
        $data = array(
            'content' => $this->load->view('/admin/stat', array(
                'get_stat_enter_site' => get_stat_enter_site(),
                'country' => '',
            ), true),

        );
        $this->load->view('/admin/main', $data);

    }

    public function login()
    {
        $this->load->view('/admin/auth/login');
    }

    public function add_clients()
    {
        $success = false;
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('use_last_name', 'use_last_name', 'trim|required');
            $this->form_validation->set_rules('use_name', 'use_name', 'trim|required');
            $this->form_validation->set_rules('use_email', 'login', 'trim|required|is_unique[users.use_email]');
            $this->form_validation->set_rules('use_password', 'password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'password', 'trim|required|min_length[5]|matches[use_password]');
            $this->form_validation->set_rules('use_street', 'use_street', 'trim|required');
            $this->form_validation->set_rules('use_id_country', 'use_id_country', 'trim|required');
            $this->form_validation->set_rules('use_id_city', 'use_id_city', 'trim|required');
            $this->form_validation->set_rules('use_building', 'use_building', 'trim|required');
            $this->form_validation->set_rules('use_room', 'use_room', 'trim|required');
            $this->form_validation->set_rules('use_phone', 'use_phone', 'trim|required');
            $this->form_validation->set_rules('agree', 'agree', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {
                $_POST['use_birthday'] = date('Y-m-d', strtotime($this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day')));

                unset($_POST['passconf']);
                unset($_POST['agree']);
                unset($_POST['day']);
                unset($_POST['yaer']);
                unset($_POST['month']);
                $this->load->model('model_users');
                $this->load->model('model_employee');
                $id = $this->model_users->insert();
                $data = array(
                    'emp_employees_groups_id' => 3,
                    'emp_fname' => $this->input->post('use_last_name'),
                    'emp_lname' => $this->input->post('use_name'),
                    'emp_email' => $this->input->post('use_email'),
                    'emp_password' => md5($this->input->post('use_password')),
                );
                $this->model_employee->add_employee($data);
                $success = 'Данные о пользователе успешно добавлены. ID пользователя ' . $id . '<p><a href="/admin/view_clients/' . $id . '">Просмотреть карточку клинета</a></p>';

                $this->session->set_flashdata(array('success' => $success));

                redirect('/admin/add_clients/');
            }

        }
        $this->load->model('model_city');
        $this->load->model('model_country');
        $country = $this->model_country->get_all();
        $city = $this->model_city->get_all();
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/add_clients',
                'title' => 'Добавить клиента',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/add_clients', array(
                'city' => $city,
                'country' => $country,
            ), true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function view_clients()
    {
        $id = (int)$this->uri->segment(3);

        $this->load->model('model_users');

        $client = $this->model_users->find($id);
        $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/clients',
                'title' => 'Список клиентов',
                'flat' => true,
            ],
            [
                'url' => '/admin/view_clients/' . $id,
                'title' => 'Клиент',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/view_clients', ['client' => $client], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function view_managers()
    {
        $id = (int)$this->uri->segment(3);

        $this->load->model('model_users');

        $client = $this->model_users->find($id);
        $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/managers',
                'title' => 'Список менеджеров',
                'flat' => true,
            ],
            [
                'url' => '/admin/view_managers/' . $id,
                'title' => 'Менеджер',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/view_managers', ['client' => $client], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function edit_clients()
    {

        $this->load->model('model_users');
        $this->load->model('model_city');
        $this->load->model('model_employee');

        $success = false;
        $id = (int)$this->uri->segment(3);
        $client = $this->model_users->find($id);
        $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('use_last_name', 'use_last_name', 'trim|required');
            $this->form_validation->set_rules('use_name', 'use_name', 'trim|required');
            $this->form_validation->set_rules('use_email', 'login', 'trim|required');
            $this->form_validation->set_rules('use_street', 'use_street', 'trim|required');
            $this->form_validation->set_rules('use_id_city', 'use_id_city', 'trim|required');
            $this->form_validation->set_rules('use_building', 'use_building', 'trim|required');
            $this->form_validation->set_rules('use_room', 'use_room', 'trim|required');
            $this->form_validation->set_rules('use_phone', 'use_phone', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {

                $this->model_users->update($id);
                $data = array(
                    'emp_employees_groups_id' => 3,
                    'emp_fname' => $this->input->post('use_last_name'),
                    'emp_lname' => $this->input->post('use_name'),
                );
                $this->model_employee->update($this->input->post('use_email'), $data);

                $success = 'Данные о пользователе успешно обновлены. ID пользователя ' . $id . '<p><a href="/admin/view_clients/' . $id . '">Просмотреть карточку клинета</a></p>';

                $this->session->set_flashdata(array('success' => $success));
                redirect('/admin/edit_clients/' . $id);
            }
        }

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/clients',
                'title' => 'Список клиентов',
                'flat' => true,
            ],
            [
                'url' => '/admin/view_clients/' . $id,
                'title' => 'Клиент',
                'flat' => true,
            ],
        );

        $city = $this->model_city->get_all();
        $data = array(
            'content' => $this->load->view('/admin/edit_clients', [
                'client' => $client,
                'city' => $city,
            ], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function edit_managers()
    {

        $this->load->model('model_users');
        $this->load->model('model_city');
        $this->load->model('model_country');
        $this->load->model('model_employee');

        $success = false;
        $id = (int)$this->uri->segment(3);
        $client = $this->model_users->find($id);
        $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('use_last_name', 'use_last_name', 'trim|required');
            $this->form_validation->set_rules('use_name', 'use_name', 'trim|required');
            $this->form_validation->set_rules('use_email', 'login', 'trim|required');
            $this->form_validation->set_rules('use_street', 'use_street', 'trim|required');
            $this->form_validation->set_rules('use_id_city', 'use_id_city', 'trim|required');
            $this->form_validation->set_rules('use_building', 'use_building', 'trim|required');
            $this->form_validation->set_rules('use_room', 'use_room', 'trim|required');
            $this->form_validation->set_rules('use_phone', 'use_phone', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

            if ($this->form_validation->run() == true) {

                $this->model_users->update($id);
                $data = array(
                    'emp_employees_groups_id' => 3,
                    'emp_fname' => $this->input->post('use_last_name'),
                    'emp_lname' => $this->input->post('use_name'),
                );
                $this->model_employee->update($this->input->post('use_email'), $data);

                $success = 'Данные о менеджере успешно обновлены. ID менеджера ' . $id . '<p><a href="/admin/view_managers/' . $id . '">Просмотреть карточку менеджера</a></p>';

                $this->session->set_flashdata(array('success' => $success));
                redirect('/admin/edit_managers/' . $id);
            }

        }


        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/managers',
                'title' => 'Список менеджеров',
                'flat' => true,
            ],
            [
                'url' => "/admin/view_managers/$id",
                'title' => 'Менеджер',
                'flat' => true,
            ],
        );

        $country = $this->model_country->get_all();
        $data = array(
            'content' => $this->load->view('/admin/edit_managers', [
                'client' => $client,
                'country' => $country,
            ], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function add_providers()
    {

        $success = false;
        if ($this->input->method() == 'post') {

            $this->form_validation->set_rules('pro_organization', 'pro_organization', 'trim|required');

            $this->form_validation->set_rules('pro_last_name', 'pro_last_name', 'trim|required');
            $this->form_validation->set_rules('pro_name', 'pro_name', 'trim|required');
            $this->form_validation->set_rules('pro_email', 'login', 'trim|required|is_unique[providers.pro_email]');
            $this->form_validation->set_rules('pro_phone', 'pro_phone', 'trim|required');

            $this->form_validation->set_rules('pro_last_name_logist', 'pro_last_name_logist', 'trim|required');
            $this->form_validation->set_rules('pro_name_logist', 'pro_name_logist', 'trim|required');
            $this->form_validation->set_rules('pro_email_logist', 'pro_email_logist', 'trim|required');
            $this->form_validation->set_rules('pro_phone_logist', 'pro_phone_logist', 'trim|required');

            /* $this->form_validation->set_rules('pro_password', 'password', 'trim|required|min_length[5]');
             $this->form_validation->set_rules('passconf', 'password', 'trim|required|min_length[5]|matches[pro_password]');*/

            $this->form_validation->set_rules('pro_id_country', 'pro_id_country', 'trim|required');
            $this->form_validation->set_rules('pro_id_city', 'pro_id_city', 'trim|required');

            $this->form_validation->set_rules('pro_street', 'pro_street', 'trim|required');
            $this->form_validation->set_rules('pro_building', 'pro_building', 'trim|required');
            $this->form_validation->set_rules('pro_room', 'pro_room', 'trim|required');
            $this->form_validation->set_rules('agree', 'agree', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {

                unset($_POST['passconf']);
                unset($_POST['agree']);
                $delivery_citys = explode(',', $this->input->post('delivery_city'));
                unset($_POST['delivery_city']);
                $this->load->model('model_providers');
                $this->load->model('model_employee');
                $this->load->model('model_delivery_city');
                $data = array(
                    'emp_employees_groups_id' => 2,
                    'emp_fname' => $this->input->post('pro_last_name'),
                    'emp_lname' => $this->input->post('pro_name'),
                    'emp_email' => $this->input->post('pro_email'),
                );
                $emp_id = $this->model_employee->add_employee($data);
                $_POST['pro_id_employee'] = $emp_id;
                $id = $this->model_providers->add_providers();
                $this->model_employee->create_access_account($emp_id);
                /* foreach ($delivery_citys as $citys) { // переноситься в ЛК поставщика
                     $data_delivery_city = [
                         'dci_id_country' => $this->input->post('pro_id_country'),
                         'dci_id_city' => $citys,
                         'dci_id_providers' => $id,
                         'dci_active' => 1,
                     ];
                     $this->model_delivery_city->insert($data_delivery_city);
                 }*/
                $success = 'Данные о поставщике успешно добавлены. ID поставщика ' . $id . '<p><a href="/admin/view_providers/' . $id . '">Просмотреть карточку поставщика</a></p>';
                $this->session->set_flashdata(array('success' => $success));
                redirect('/admin/add_providers/');
            }
        }
        $this->load->model('model_city');
        $this->load->model('model_country');
        $country = $this->model_country->get_all();
        $city = $this->model_city->get_all();
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers',
                'title' => ' Список поставщика',
                'flat' => true,
            ],
            [
                'url' => '/admin/add_providers',
                'title' => ' Добавить поставщика',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/add_providers', array(
                'city' => $city,
                'country' => $country,
            ), true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function edit_providers()
    {

        $id = (int)$this->uri->segment(3);

        $this->load->model('model_providers');
        $this->load->model('model_delivery_city');

        $providers = $this->model_providers->find($id);

        if ($this->input->method() == 'post') {

            $this->form_validation->set_rules('pro_organization', 'pro_organization', 'trim|required');

            $this->form_validation->set_rules('pro_last_name', 'pro_last_name', 'trim|required');
            $this->form_validation->set_rules('pro_name', 'pro_name', 'trim|required');
            $this->form_validation->set_rules('pro_email', 'login', 'trim|required');
            $this->form_validation->set_rules('pro_phone', 'pro_phone', 'trim|required');

            $this->form_validation->set_rules('pro_last_name_logist', 'pro_last_name_logist', 'trim|required');
            $this->form_validation->set_rules('pro_name_logist', 'pro_name_logist', 'trim|required');
            $this->form_validation->set_rules('pro_email_logist', 'pro_email_logist', 'trim|required');
            $this->form_validation->set_rules('pro_phone_logist', 'pro_phone_logist', 'trim|required');

            $this->form_validation->set_rules('pro_id_country', 'pro_id_country', 'trim|required');
            $this->form_validation->set_rules('pro_id_city', 'pro_id_city', 'trim|required');

            $this->form_validation->set_rules('pro_street', 'pro_street', 'trim|required');
            $this->form_validation->set_rules('pro_building', 'pro_building', 'trim|required');
            $this->form_validation->set_rules('pro_room', 'pro_room', 'trim|required');

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {

                $delivery_citys = explode(',', $this->input->post('delivery_city'));

                unset($_POST['delivery_city']);

                $this->load->model('model_providers');
                $this->load->model('model_delivery_city');

                $this->model_providers->update($id);

                /*$this->model_delivery_city->delete_by_providers($id);
                foreach ($delivery_citys as $citys) {
                    $data_delivery_city = [
                        'dci_id_country' => $this->input->post('pro_id_country'),
                        'dci_id_city' => $citys,
                        'dci_id_providers' => $id,
                        'dci_active' => 1,
                    ];
                    $this->model_delivery_city->insert($data_delivery_city);
                }*/

                $success = 'Данные о поставщике успешно обновлены. ID пользователя ' . $id . '<p><a href="/admin/view_clients/' . $id . '">Просмотреть карточку поставщика</a></p>';

                $this->session->set_flashdata(array('success' => $success));

                redirect("/admin/edit_providers/$id");
            }
        }
        $providers = (isset($providers[0]) && !empty($providers[0]) ? $providers[0] : false);
        if ($providers) {
            $providers->delivery_city = $this->model_delivery_city->get_id_city_by_providers($providers->pro_id);
        }

        $this->load->model('model_city');
        $this->load->model('model_country');

        $country = $this->model_country->get_all();
        $city = $this->model_city->get_all();
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers',
                'title' => 'Список поставщиков',
                'flat' => true,
            ],
            [
                'url' => '/admin/edit_providers/' . $id,
                'title' => 'Потставщик',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/edit_providers', [
                'providers' => $providers,
                'city' => $city,
                'country' => $country,
            ], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function view_providers()
    {
        $id = (int)$this->uri->segment(3);

        $this->load->model('model_providers');
        $this->load->model('model_delivery_city');

        $providers = $this->model_providers->find($id);
        $providers = (isset($providers[0]) && !empty($providers[0]) ? $providers[0] : false);
        if ($providers) {
            $providers->delivery_city = $this->model_delivery_city->get_by_providers($providers->pro_id);
        }

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers',
                'title' => 'Список поставщиков',
                'flat' => true,
            ],
            [
                'url' => '/admin/view_providers/' . $id,
                'title' => 'Потставщик',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/view_providers', ['providers' => $providers], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function clients()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/clients',
                'title' => 'Список клиентов',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/clients', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function managers()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/managers',
                'title' => 'Список менеджеров',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/managers', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function providers()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers',
                'title' => 'Список Поставщиков',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/providers', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function products()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/products',
                'title' => 'Список товаров',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/products', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function location()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/location',
                'title' => 'Локация',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/location', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    public function delete_location()
    {
        $success = false;
        if ($this->input->method() == 'post') {

            $country_id = (int)$this->input->post('cou_id');
            $region_id = (int)$this->input->post('reg_id');
            $city_id = (int)$this->input->post('cit_id');
            $district_id = (int)$this->input->post('dis_id');

            if ($country_id > 0 && is_int($country_id)) {
                $this->load->model('model_country');

                if ($this->model_country->delete($country_id) !== false) {
                    $success = 'Страна успешно удалена';
                }
            }

            if ($region_id > 0 && is_int($region_id)) {
                $this->load->model('model_region');
                if ($this->model_region->delete($region_id)) {
                    $success = 'Область успешно удалена';
                }
            }

            if ($city_id > 0 && is_int($city_id)) {
                $this->load->model('model_city');
                if ($this->model_city->delete($city_id)) {
                    $success = 'Город успешно удален';
                }
            }
            if ($district_id > 0 && is_int($district_id)) {
                $this->load->model('model_district');
                if ($this->model_district->delete($district_id)) {
                    $success = 'Район успешно удален';
                }
            }
        }
        echo json_encode(array('success' => $success, 'message' => ($success === false) ? $this->db->error() : ''));

        return $success;
    }

    public function add_location()
    {
        $success = false;

        if ($this->input->method() == 'post') {

            $country = $this->input->post('cou_name');
            $country_id = (int)$this->input->post('cou_id');

            $region = $this->input->post('reg_name');
            $region_id = (int)$this->input->post('reg_id');

            $city = $this->input->post('cit_name');
            $city_id = (int)$this->input->post('cit_id');

            $district = $this->input->post('dis_name');
            $district_id = (int)$this->input->post('dis_id');

            if ($country && is_string($country) && !$region && !$country_id && !$region_id) {
                $this->load->model('model_country');
                if ($this->model_country->insert()) {
                    $success = 'Страна успешно добавлена';
                }
            }
            if ($country_id > 0 && is_int($country_id)) {
                $this->load->model('model_country');
                $data = ['cou_name' => $country];
                if ($this->model_country->update($data, $country_id) !== false) {
                    $success = 'Страна успешно обновлена';
                }
            }

            if (empty($country) && is_string($region) && !$region_id) {
                $this->load->model('model_region');
                if ($this->model_region->insert()) {
                    $success = 'Область успешно добавлена';
                }
            }
            if ($region_id > 0 && is_int($region_id)) {
                $this->load->model('model_region');
                $data = ['reg_name' => $district];
                if ($this->model_region->update($data, $region_id)) {
                    $success = 'Область успешно обновлена';
                }
            }

            if (empty($country) && empty($region) && is_string($city) && !$city_id) {
                $this->load->model('model_city');
                if ($this->model_city->insert()) {
                    $success = 'Город успешно добавлен';
                }
            }
            if ($city_id > 0 && is_int($city_id)) {
                $this->load->model('model_city');
                $data = ['cit_name' => $city];
                if ($this->model_city->update($data, $city_id)) {
                    $success = 'Город успешно обновлен';
                }
            }

            if (empty($country) && empty($region) && empty($city) && empty($district_id) && is_string($district)) {
                $this->load->model('model_district');
                if ($this->model_district->insert()) {
                    $success = 'Район успешно добавлен';
                }
            }
            if ($district_id > 0 && is_int($district_id)) {
                $this->load->model('model_district');
                $data = ['dis_name' => $district];
                if ($this->model_district->update($data, $district_id)) {
                    $success = 'Район успешно обновлен';
                }
            }

            echo json_encode(array('success' => $success));

            return $success;

        }
        $this->load->model('model_city');
        $this->load->model('model_country');
        $country = $this->model_country->get_all();
        $city = $this->model_city->get_all();
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/location',
                'title' => 'Локации',
                'flat' => true,
            ],
            [
                'url' => '/admin/add_location',
                'title' => 'Добавить локацию',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/add_location', array(
                'city' => $city,
                'country' => $country,
            ), true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    public function add_managers()
    {

        $success = false;
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('use_last_name', 'use_last_name', 'trim|required');
            $this->form_validation->set_rules('use_name', 'use_name', 'trim|required');
            $this->form_validation->set_rules('use_email', 'login', 'trim|required|is_unique[users.use_email]');
            $this->form_validation->set_rules('use_street', 'use_street', 'trim|required');
            $this->form_validation->set_rules('use_id_city', 'use_id_city', 'trim|required');
            $this->form_validation->set_rules('use_building', 'use_building', 'trim|required');
            $this->form_validation->set_rules('use_room', 'use_room', 'trim|required');
            $this->form_validation->set_rules('use_phone', 'use_phone', 'trim|required');
            $this->form_validation->set_rules('agree', 'agree', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {
                $_POST['use_birthday'] = date('Y-m-d', strtotime($this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day')));

                unset($_POST['passconf']);
                unset($_POST['agree']);
                unset($_POST['day']);
                unset($_POST['yaer']);
                unset($_POST['month']);
                $this->load->model('model_users');
                $this->load->model('model_employee');
                $id = $this->model_users->insert();
                $data = [
                    'emp_employees_groups_id' => 4,
                    'emp_fname' => $this->input->post('use_last_name'),
                    'emp_lname' => $this->input->post('use_name'),
                    'emp_email' => $this->input->post('use_email'),
                ];
                $emp_id = $this->model_employee->add_employee($data);
                $this->model_employee->create_access_account($emp_id);
                $success = 'Данные о менеджере успешно добавлены. ID менеджера ' . $id . '<p><a href="/admin/view_managers/' . $id . '">Просмотреть карточку менеджера</a></p>';

                $this->session->set_flashdata(array('success' => $success));

                redirect('/admin/add_clients/');
            }

        }
        $this->load->model('model_city');
        $this->load->model('model_country');
        $country = $this->model_country->get_all();
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/add_managers',
                'title' => 'Добавить менеджера',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/add_managers', array('country' => $country), true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    public function add_orders()
    {

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/add_managers',
                'title' => 'Добавить менеджера',
                'flat' => true,
            ],
        );
        $this->load->model('model_providers');
        $this->load->model('model_city');
        $this->load->model('model_country');
        $providers = $this->model_providers->get_all();
        $city = $this->model_city->get_all();
        $data = array(
            'content' => $this->load->view('/admin/add_orders', ['providers' => $providers, 'city' => $city], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    public function add_products()
    {
        $this->load->model('model_products', 'products');
        $this->load->model('model_providers');
        $this->load->model('model_city');
        $this->load->model('model_country');
        $this->load->model('model_delivery_city_products');


        if ($this->input->method() == 'post') {
            $data['error'] = [];
            $data['error1'] = [];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $this->load->library('upload', $config);
            $config['max_height'] = 768;

            if (isset($_FILES['prd_file'])) {
                $_POST['prd_file'] = $_FILES["prd_file"]["name"];
                if (!$this->upload->do_upload('prd_file')) {
                    $data['error'] = $this->upload->display_errors();
                }
            }

            if (isset($_FILES['prd_file_certificates'])) {
                $_POST['prd_file_certificates'] = $_FILES["prd_file_certificates"]["name"];
                if (!$this->upload->do_upload('prd_file_certificates')) {
                    $data['error1'] = $this->upload->display_errors();
                }
            }

            if (empty($data['error'])) {
                $this->form_validation->set_rules('prd_id_providers', 'prd_id_providers', 'trim|required');
                $this->form_validation->set_rules('prd_title', 'prd_title', 'trim|required');
                $this->form_validation->set_rules('prd_description', 'prd_description', 'trim|required|is_unique[users.use_email]');
                $this->form_validation->set_rules('prd_title_producer', 'prd_title_producer', 'trim|required');
                $this->form_validation->set_rules('prd_comments', 'prd_comments', 'trim|required');
                $this->form_validation->set_rules('prd_volume_price', 'prd_volume_price', 'trim|required');
                $this->form_validation->set_rules('prd_price', 'prd_price', 'trim|required');
                $this->form_validation->set_rules('prd_file', 'prd_file', 'trim|required');
                //$this->form_validation->set_rules('prd_file_certificates', 'prd_file_certificates', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

                if ($this->form_validation->run() == true) {
                    $prd_id_country = $this->input->post('prd_id_country');
                    $delivery_citys = explode(',', $this->input->post('delivery_city'));
                    unset($_POST['delivery_city']);
                    unset($_POST['prd_id_country']);
                    $id = $this->products->insert();

                    if ((int)$id > 0) {
                        foreach ($delivery_citys as $citys) {
                            $data_delivery_city = [
                                'dcp_id_country' => $prd_id_country,
                                'dcp_id_city' => $citys,
                                'dcp_id_providers' => $this->input->post('prd_id_providers'),
                                'dcp_id_products' => $id,
                                'dcp_active' => 1,
                            ];
                            $this->model_delivery_city_products->insert($data_delivery_city);
                        }
                    }

                    $success = 'Данные о товаре успешно добавлены. ID товара ' . $id . '<p><a href="/admin/view_products/' . $id . '">Просмотреть карточку товара</a></p>';
                    $this->session->set_flashdata(array('success' => $success));


                    redirect('/admin/add_products/');
                }
            }
        }
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/add_managers',
                'title' => 'Добавить менеджера',
                'flat' => true,
            ],
        );

        $providers = $this->model_providers->get_all();
        $city = $this->model_city->get_all();
        $country = $this->model_country->get_all();
        $data['fields'] = array_slice($this->products->getFields(), 1);
        $data['city'] = $city;
        $data['country'] = $country;
        $data['providers'] = $providers;

        $data = array(
            'content' => $this->load->view('/admin/add_products', $data, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    public function edit_products()
    {

        $id = (int)$this->uri->segment(3);

        $this->load->model('model_products');
        $this->load->model('model_providers');
        $this->load->model('model_city');
        $this->load->model('model_country');
        $this->load->model('model_delivery_city_products');


        if ($this->input->method() == 'post') {
            $data['error'] = [];
            $data['error1'] = [];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $this->load->library('upload', $config);
            $config['max_height'] = 768;

            if (isset($_FILES['prd_file'])) {
                $_POST['prd_file'] = $_FILES["prd_file"]["name"];
                if (!$this->upload->do_upload('prd_file')) {
                    $data['error'] = $this->upload->display_errors();
                }
            }

            if (isset($_FILES['prd_file_certificates'])) {
                $_POST['prd_file_certificates'] = $_FILES["prd_file_certificates"]["name"];
                if (!$this->upload->do_upload('prd_file_certificates')) {
                    $data['error1'] = $this->upload->display_errors();
                }
            }

            if (empty($data['error'])) {
                $this->form_validation->set_rules('prd_id_providers', 'prd_id_providers', 'trim|required');
                $this->form_validation->set_rules('prd_title', 'prd_title', 'trim|required');
                $this->form_validation->set_rules('prd_description', 'prd_description', 'trim|required|is_unique[users.use_email]');
                $this->form_validation->set_rules('prd_title_producer', 'prd_title_producer', 'trim|required');
                $this->form_validation->set_rules('prd_comments', 'prd_comments', 'trim|required');
                $this->form_validation->set_rules('prd_volume_price', 'prd_volume_price', 'trim|required');
                $this->form_validation->set_rules('prd_price', 'prd_price', 'trim|required');
                //$this->form_validation->set_rules('prd_file', 'prd_file', 'trim|required');
                //$this->form_validation->set_rules('prd_file_certificates', 'prd_file_certificates', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

                if ($this->form_validation->run() == true) {
                    $prd_id_country = $this->input->post('prd_id_country');
                    $delivery_citys = explode(',', $this->input->post('delivery_city'));
                    unset($_POST['delivery_city']);
                    unset($_POST['prd_id_country']);

                    $this->model_products->update($id);

                    $this->model_delivery_city_products->delete_by_products($id);
                    if ((int)$id > 0) {
                        foreach ($delivery_citys as $citys) {
                            $data_delivery_city = [
                                'dcp_id_country' => $prd_id_country,
                                'dcp_id_city' => $citys,
                                'dcp_id_providers' => $this->input->post('prd_id_providers'),
                                'dcp_id_products' => $id,
                                'dcp_active' => 1,
                            ];
                            $this->model_delivery_city_products->insert($data_delivery_city);
                        }
                    }

                    $success = 'Данные о товаре успешно обновленны. ID товара ' . $id . '<p><a href="/admin/view_products/' . $id . '">Просмотреть карточку товара</a></p>';
                    $this->session->set_flashdata(array('success' => $success));

                    redirect('/admin/edit_products/' . $id);
                }
            }
        }
        $products = $this->model_products->find($id);
        $providers = [];
        $products = (isset($products[0]) && !empty($products[0]) ? $products[0] : false);
        if ($products) {
            $products->delivery_city = $this->model_delivery_city_products->get_id_city_by_products($products->prd_id);

            $providers = $this->model_providers->find($products->prd_id_providers);
        }

        $this->load->model('model_city');
        $this->load->model('model_country');

        $country = $this->model_country->get_all();
        $city = $this->model_city->get_all();

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/edit_products',
                'title' => 'Редактировать товар',
                'flat' => true,
            ],
        );

        $city = $this->model_city->get_all();
        $country = $this->model_country->get_all();

        $data = array(
            'content' => $this->load->view('/admin/edit_products', [
                'providers' => $providers,
                'city' => $city,
                'country' => $country,
                'products' => $products,
            ], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function view_products()
    {
        $id = (int)$this->uri->segment(3);

        $this->load->model('model_products');

        $products = $this->model_products->find($id);
        $products = (isset($products[0]) && !empty($products[0]) ? $products[0] : false);

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/products',
                'title' => 'Список товаров',
                'flat' => true,
            ],
            [
                'url' => '/admin/view_products/' . $id,
                'title' => 'Товар',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/view_products', ['products' => $products], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    //Ajax методы

    function ajax_clients()
    {
        $this->load->model('model_clients');

        $list = $this->model_clients->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $clients) {
            $name = [
                $clients->use_last_name,
                $clients->use_name,
                $clients->use_father_name,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $clients->use_organization;
            $row[] = implode(' ', $name);
            $row[] = $clients->emp_online_date;
            $row[] = $clients->use_phone;
            $row[] = $clients->emg_name;
            $row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a class="btn btn-success" href="/admin/view_clients/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="/admin/edit_clients/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_clients/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_clients->count_all(),
            "recordsFiltered" => $this->model_clients->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_providers()
    {
        $this->load->model('model_providers');

        $list = $this->model_providers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $providers) {
            $name = [
                $providers->pro_last_name,
                $providers->pro_name,
                $providers->pro_father_name,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $providers->pro_organization;
            $row[] = implode(' ', $name);
            $row[] = $providers->emp_online_date;
            $row[] = $providers->pro_phone;
            $row[] = $providers->emg_name;
            $row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a class="btn btn-success" href="/admin/view_providers/' . $providers->pro_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="/admin/edit_providers/' . $providers->pro_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_providers/' . $providers->pro_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_providers->count_all(),
            "recordsFiltered" => $this->model_providers->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_products()
    {
        $this->load->model('model_products');

        $list = $this->model_products->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $products) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $products->prd_title;
            $row[] = $products->prd_description;
            $row[] = $products->prd_title_producer;
            $row[] = $products->prd_comments;
            $row[] = $products->prd_volume_price;
            $row[] = $products->prd_price;
            $row[] = $products->cou_name;

            //$row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a target="_blank" class="btn btn-success" href="/admin/view_products/' . $products->prd_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a target="_blank" class="btn btn-info" href="/admin/edit_products/' . $products->prd_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_products/' . $products->prd_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_products->count_all(),
            "recordsFiltered" => $this->model_products->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_managers()
    {
        $this->load->model('model_managers');

        $list = $this->model_managers->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $clients) {
            $name = [
                $clients->use_last_name,
                $clients->use_name,
                $clients->use_father_name,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = implode(' ', $name);
            $row[] = $clients->emp_online_date;
            $row[] = $clients->use_phone;
            $row[] = $clients->emg_name;
            $row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a class="btn btn-success" href="/admin/view_managers/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="/admin/edit_managers/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_managers/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_managers->count_all(),
            "recordsFiltered" => $this->model_managers->count_filtered(),
            "data" => $data,
            'query' => $this->db->last_query()
        );
        echo json_encode($output);
    }

    function ajax_location()
    {
        $this->load->model('model_location');

        $list = $this->model_location->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $location) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $location->cou_name;
            $row[] = $location->reg_name;
            $row[] = $location->cit_name;
            $row[] = $location->dis_name;
            $row[] = '<a class="btn btn-success" href="/admin/view_managers/' . $location->cou_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="/admin/edit_managers/' . $location->cou_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_managers/' . $location->cou_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_location->count_all(),
            "recordsFiltered" => $this->model_location->count_filtered(),
            "data" => $data,
            'query' => $this->db->last_query()
        );
        echo json_encode($output);
    }

    public function get_city()
    {
        $this->load->model('model_city', 'city');
        echo json_encode($this->city->get_city_by_country($this->input->get('country'), $this->input->get('region')));
    }

    public function get_region()
    {
        $this->load->model('model_region', 'region');
        echo json_encode($this->region->get_region_by_country($this->input->get('country')));
    }

    public function get_district()
    {
        $this->load->model('model_district', 'district');
        echo json_encode($this->district->get_district($this->input->get('country'), $this->input->get('region'), $this->input->get('city')));
    }

    function profile()
    {
        $this->load->model('model_users');
        $this->load->model('model_providers');
        $id = $this->session->userdata('employee_id');
        if ($this->input->method() == 'post') {
            $eprofile = $this->input->post('profile');
            $post = $this->input->post();

            switch ($eprofile) {
                case 'edit_providers':
                    $this->edit_providers_data($post);
                    break;
                case 'edit_logist':
                    $this->edit_logist_data($post);
                    break;
            }
        }
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/profile',
                'title' => 'Профиль',
                'flat' => true,
            ],
        );

        $part = $this->uri->segment(2);
        echo "<pre>";
        var_dump($part);
        echo "</pre>";

        switch ($part) {
            case 'address':
                $data = array(
                    'content' => $this->load->view('/profile/main_address', ['address' => ''], true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
            default:
                if ($this->session->userdata('emp_employees_groups_id') == 2) {
                    $template = '/profile/main_providers';
                    $client = $this->model_providers->get_by_employee($id);
                    $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);
                    $var = 'providers';
                } else {
                    $template = '/profile/main_users';
                    $client = $this->model_users->find($id);
                    $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);
                    echo "<pre>";
                    var_dump($id);
                    echo "</pre>";
                    $var = 'clients';
                }
                $data = array(
                    'content' => $this->load->view($template, [$var => $client], true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
        }

        $this->load->view('/admin/profile', $data);
    }

    function edit_providers_data($post)
    {
        $id = $this->session->userdata('employee_id');

        $this->load->model('model_providers');
        $data = $this->model_providers->get_by_employee($id);
        $data = (isset($data[0]) && !empty($data[0]) ? $data[0] : false);
        unset($_POST['profile']);
        if ($this->model_providers->update($data->pro_id)) {
            return true;
        } else {
            return false;
        }
    }

    function edit_logist_data($post)
    {
        $id = $this->session->userdata('employee_id');

        $this->load->model('model_providers');
        $data = $this->model_providers->get_by_employee($id);
        $data = (isset($data[0]) && !empty($data[0]) ? $data[0] : false);
        unset($_POST['profile']);
        if ($this->model_providers->update($data->pro_id)) {
            return true;
        } else {
            return false;
        }
    }

}
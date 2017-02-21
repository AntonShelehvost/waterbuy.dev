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
        //$this->load->library('session');
        $this->load->model('model_auth');
        $this->load->library('form_validation');
        $this->load->library('session');
        //var_dump($this->session->userdata());die;
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
        $this->load->model('model_country');
        $this->load->model('model_employee');

        $success = false;
        $id = (int)$this->uri->segment(3);
        $client = $this->model_users->find($id);
        $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('use_last_name', 'use_last_name', 'trim|required');
            $this->form_validation->set_rules('use_name', 'use_name', 'trim|required');
            //$this->form_validation->set_rules('use_email', 'login', 'trim|required');
            $this->form_validation->set_rules('use_street', 'use_street', 'trim|required');
            $this->form_validation->set_rules('use_id_city', 'use_id_city', 'trim|required');
            $this->form_validation->set_rules('use_building', 'use_building', 'trim|required');
            $this->form_validation->set_rules('use_room', 'use_room', 'trim|required');
            //$this->form_validation->set_rules('use_phone', 'use_phone', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


            if ($this->form_validation->run() == true) {

                $this->model_users->update($id);
                $data = array(
                    'emp_employees_groups_id' => 3,
                    'emp_fname' => $this->input->post('use_last_name'),
                    'emp_lname' => $this->input->post('use_name'),
                );
                $this->model_employee->update($id, $data);

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
                'flat' => false,
            ],
            [
                'url' => '/admin/view_clients/' . $id,
                'title' => 'Клиент',
                'flat' => true,
            ],
        );

        $country = $this->model_country->get_all();
        $data = array(
            'content' => $this->load->view('/admin/edit_clients', [
                'client' => $client,
                'country' => $country,
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
                $this->model_employee->update($id, $data);

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

    function providers_delivery()
    {
        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers',
                'title' => 'Список поставщиков',
                'flat' => false,
            ],
            [
                'url' => '/admin/providers_delivery',
                'title' => 'Регионы доставки',
                'flat' => true,
            ],
        );
        $data = array(
            'content' => $this->load->view('/admin/providers_delivery', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function products()
    {
        $this->load->model('model_category');
        $this->load->model('model_providers');
        $providers = $this->model_providers->get_all();
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
        $category = $this->model_category->get_category_tree();

        $data = array(
            'content' => $this->load->view('/admin/products', ['category' => $category, 'providers' => $providers], true),
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
        $this->load->model('model_category');
        $this->load->model('model_clients');
        $providers = $this->model_providers->get_all();
        $country = $this->model_country->get_all();
        $category = $this->model_category->get_category_tree();
        $client = $this->model_clients->get_all();
        $data = array(
            'content' => $this->load->view('/admin/add_orders',
                ['providers' => $providers,
                    'country' => $country,
                    'category' => $category,
                    'client' => $client
                ], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }


    public function ajax_orders()
    {
        $this->load->model('model_orders');
        $this->load->model('model_orders_items');
        $status = ['Ожидает выкупа', 'Выкуплен', 'Выполнен'];
        $list = $this->model_orders->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $clients) {
            $name = [
                $clients->ord_last_name,
                $clients->ord_name,
                $clients->ord_father_name,
            ];
            $address = [
                $clients->cou_name,
                $clients->reg_name,
                'г.',
                $clients->cit_name,
                ($clients->ord_id_district == -1) ? 'ВСЕ' : $clients->dis_name,
                'ул.',
                $clients->ord_street,
                ', дом.',
                $clients->ord_building,
                ', кв.',
                $clients->ord_room,
                ', домоф.',
                $clients->ord_intercom,
                ' заезд',
                $clients->ord_destonation,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d.m.Y H:i:s', strtotime($clients->cdate));
            $row[] = implode(' ', $address);
            $row[] = implode(' ', $name);
            $row[] = $clients->ord_phone;
            $row[] = $status[$clients->ord_done];
            $row[] = $clients->use_organization;
            $row[] = $this->model_orders_items->get_all_sum_order($clients->ord_id);
            $row[] = '<a class="btn btn-info" href="/admin/edit_orders/' . $clients->ord_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_orders/' . $clients->ord_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a> ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_orders->count_all(),
            "recordsFiltered" => $this->model_orders->count_filtered(),
            "data" => $data,
            'query' => $this->db->last_query()
        );
        echo json_encode($output);
    }

    public function orders()
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
            'content' => $this->load->view('/admin/orders', null, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    public function edit_orders()
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
            'content' => $this->load->view('/admin/orders', null, true),
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
        $this->load->model('model_category');
        $this->load->model('model_delivery_product');

        if ($this->input->method() == 'post') {
            $data['error'] = array();
            $data['error1'] = array();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $new_name = translitNameHTTP($_FILES["prd_file"]["name"]);
            $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if (isset($_FILES['prd_file']) && !empty($_FILES["prd_file"]["name"])) {
                $_POST['prd_file'] = $new_name;
                if (!$this->upload->do_upload('prd_file')) {
                    $data['error'] = 'prd_file:' . $this->upload->display_errors();
                }
            }

            if (isset($_FILES['prd_file_certificates']) && !empty($_FILES["prd_file_certificates"]["name"])) {
                $_POST['prd_file_certificates'] = $_FILES["prd_file_certificates"]["name"];
                if (!$this->upload->do_upload('prd_file_certificates')) {

                    $data['error1'] = 'prd_file_certificates:' . $this->upload->display_errors();
                }
            }

            if (empty($data['error'])) {
                $this->form_validation->set_rules('prd_id_user', 'prd_id_user', 'trim|required');
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
                    $delivery = $this->input->post('delivery_id');
                    unset($_POST['delivery_id']);
                    unset($_POST['prd_id_country']);
                    $id = $this->products->insert();

                    if ((int)$id > 0) {
                        foreach ($delivery as $item) {
                            $data_delivery_product = [
                                'dep_id_delivery' => $item,
                                'dep_id_product' => $id
                            ];
                            $this->model_delivery_product->insert_data($data_delivery_product);
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
                'url' => '/admin/add_products',
                'title' => 'Добавить товар',
                'flat' => true,
            ],
        );

        $providers = $this->model_providers->get_all();
        $category = $this->model_category->get_category_tree();
        //$city = $this->model_city->get_all();
        $country = $this->model_country->get_all();
        //$data['fields'] = array_slice($this->products->getFields(), 1);
        //$data['city'] = $city;
        $data['country'] = $country;
        $data['providers'] = $providers;
        $data['category'] = $category;

        $data = array(
            'content' => $this->load->view('/admin/add_products', $data, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    public function export_from_xls()
    {
        $this->load->library('table');
        $this->load->model('model_products', 'products');
        $this->load->model('model_delivery_product');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';

        $this->load->library('upload', $config);
        if (isset($_FILES['prd_file_certificates']) && !empty($_FILES["prd_file_certificates"]["name"])) {
            $_POST['prd_file_certificates'] = $_FILES["prd_file_certificates"]["name"];
            if (!$this->upload->do_upload('prd_file_certificates')) {

                $data['error1'] = 'prd_file_certificates:' . $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name = $upload_data['file_name'];
                $data['res'] = $res = parse_excel_file('./uploads/' . $file_name);
                //print_r( $res );
                $delivery = $this->input->post('delivery_id');
                unset($_POST['delivery_id']);
                $xml = array_slice($data['res'], 1);
                $count = 0;
                foreach ($xml as $item) {
                    if (!empty($item[0])) {
                        $xml_data = [
                            'prd_id_user' => $this->input->post('prd_id_user'),
                            'prd_id_category' => $this->input->post('prd_id_category'),
                            'prd_title' => trim($item[0]),
                            'prd_title_producer' => trim($item[1]),
                            'prd_trademark' => trim($item[2]),
                            'prd_description' => trim($item[3]),
                            'prd_comments' => trim($item[4]),
                            'prd_volume_price' => (float)$item[5],
                            'prd_amount' => (int)$item[6],
                            'prd_price' => (float)$item[7],
                            'prd_amount_min' => (int)$item[8]
                        ];
                        $id = $this->products->insert_data($xml_data);
                        if ((int)$id > 0) {
                            foreach ($delivery as $item) {
                                $data_delivery_product = [
                                    'dep_id_delivery' => $item,
                                    'dep_id_product' => $id
                                ];
                                $this->model_delivery_product->insert_data($data_delivery_product);
                            }
                        }
                        $count++;
                    }
                }

                $success = 'Данные о товаре успешно добавлены. ID товара ' . $id . '<p><a href="/admin/view_products/' . $id . '">Просмотреть карточку товара</a></p>';
                $this->session->set_flashdata(array('success' => $success));
            }
        }
        /*echo $this->table->generate($data['res']);
        echo $count;*/
        if ($this->session->userdata('emp_employees_groups_id') == 5)
            redirect('/admin/products/');
        else
            redirect('/profile/products');
    }

    public function edit_products()
    {

        $id = (int)$this->uri->segment(3);

        $this->load->model('model_products');
        $this->load->model('model_category');
        $this->load->model('model_providers');
        $this->load->model('model_city');
        $this->load->model('model_country');
        $this->load->model('model_delivery_product');


        if ($this->input->method() == 'post') {
            $data['error'] = [];
            $data['error1'] = [];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = 1024;
            $config['max_width'] = 1024;
            $new_name = translitNameHTTP($_FILES["prd_file"]["name"]);
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $config['max_height'] = 768;


            if (isset($_FILES['prd_file']) && !empty($_FILES["prd_file"]["name"])) {
                $_POST['prd_file'] = $new_name;
                if (!$this->upload->do_upload('prd_file')) {
                    $data['error'] = 'prd_file:' . $this->upload->display_errors();
                }
            }

            if (isset($_FILES['prd_file_certificates']) && !empty($_FILES["prd_file_certificates"]["name"])) {
                $_POST['prd_file_certificates'] = $_FILES["prd_file_certificates"]["name"];
                if (!$this->upload->do_upload('prd_file_certificates')) {

                    $data['error1'] = 'prd_file_certificates:' . $this->upload->display_errors();
                }
            }

            if (empty($data['error'])) {
                $this->form_validation->set_rules('prd_id_user', 'prd_id_user', 'trim|required');
                $this->form_validation->set_rules('prd_title', 'prd_title', 'trim|required');
                $this->form_validation->set_rules('prd_description', 'prd_description', 'trim|required|is_unique[users.use_email]');
                $this->form_validation->set_rules('prd_title_producer', 'prd_title_producer', 'trim|required');
                //$this->form_validation->set_rules('prd_comments', 'prd_comments', 'trim|required');
                $this->form_validation->set_rules('prd_volume_price', 'prd_volume_price', 'trim|required');
                $this->form_validation->set_rules('prd_price', 'prd_price', 'trim|required');
                $this->form_validation->set_rules('delivery_id[]', 'delivery_id[]', 'required');
                //$this->form_validation->set_rules('prd_file_certificates', 'prd_file_certificates', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

                if ($this->form_validation->run() == true) {
                    $prd_id_country = $this->input->post('prd_id_country');
                    $delivery = $this->input->post('delivery_id');
                    unset($_POST['delivery_id']);
                    unset($_POST['prd_id_country']);

                    $this->model_products->update($id);

                    $this->model_delivery_product->delete_by_products($id);
                    if ((int)$id > 0) {
                        foreach ($delivery as $item) {
                            $data_delivery_product = [
                                'dep_id_delivery' => $item,
                                'dep_id_product' => $id
                            ];
                            $this->model_delivery_product->insert_data($data_delivery_product);
                        }
                    }

                    $success = 'Данные о товаре успешно обновленны. ID товара ' . $id . '<p><a href="/admin/view_products/' . $id . '">Просмотреть карточку товара</a></p>';
                    $this->session->set_flashdata(array('success' => $success));

                    redirect('/' . $this->uri->segment(1) . '/edit_products/' . $id);
                }
            }
        }

        $products = $this->model_products->find($id);
        $providers = [];
        $products = (isset($products[0]) && !empty($products[0]) ? $products[0] : false);
        if ($products) {
            //$products->delivery_product = $this->model_delivery_product->get_id_city_by_products($products->prd_id);

            $providers = $this->model_providers->find($products->prd_id_user);
        }

        $this->load->model('model_city');
        $this->load->model('model_country');

        $providers = $this->model_providers->get_all();
        $category = $this->model_category->get_category_tree();
        //$city = $this->model_city->get_all();
        $country = $this->model_country->get_all();
        //$data['fields'] = array_slice($this->products->getFields(), 1);
        //$data['city'] = $city;
        $data['country'] = $country;
        $data['providers'] = $providers;
        $data['category'] = $category;
        $data['products'] = $products;
        $delivery_product = $this->model_delivery_product->find_by_product($id);
        foreach ($delivery_product as $item)
            $data['delivery_product'][] = $item->dep_id_delivery;
        $bred = array(
            [
                'url' => '/' . $this->uri->segment(1),
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/' . $this->uri->segment(1) . '/products',
                'title' => 'Товары',
                'flat' => false,
            ],
            [
                'url' => '/' . $this->uri->segment(1) . '/edit_products',
                'title' => 'Редактировать товар',
                'flat' => true,
            ],
        );

        $data = array(
            'content' => $this->load->view('/admin/edit_products', $data, true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);

    }

    function view_products()
    {
        $id = (int)$this->uri->segment(3);

        $this->load->model('model_products');
        $this->load->model('model_users');

        $products = $this->model_products->find($id);
        $products = (isset($products[0]) && !empty($products[0]) ? $products[0] : false);
        $user = $this->model_users->find($products->prd_id_user);
        $products->user = (isset($user[0]) && !empty($user[0]) ? $user[0] : false);
        $bred = array(
            [
                'url' => '/' . $this->uri->segment(1),
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/' . $this->uri->segment(1) . '/products',
                'title' => 'Список товаров',
                'flat' => false,
            ],
            [
                'url' => '/' . $this->uri->segment(1) . '/view_products/' . $id,
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
            $address = [

                $clients->cou_name,
                $clients->reg_name,
                'г.',
                $clients->cit_name,
                ($clients->use_id_district == -1) ? 'ВСЕ' : $clients->dis_name,
                'ул.',
                $clients->use_street,
                ', дом.',
                $clients->use_building,
                ', кв.',
                $clients->use_room,
                ', домоф.',
                $clients->use_intercom,
                ' заезд',
                $clients->use_destonation,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = implode(' ', $name);
            $row[] = $clients->use_phone;
            $row[] = implode(' ', $address);
            //$row[] = '<span class="label-success label label-default">Active</span>';
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
        foreach ($list as $clients) {
            $name = [
                $clients->use_last_name,
                $clients->use_name,
                $clients->use_father_name,
            ];
            $name2 = [
                $clients->use_last_name_logist,
                $clients->use_name_logist,
                $clients->use_father_name_logist,
            ];
            $address = [

                $clients->cou_name,
                $clients->reg_name,
                'г.',
                $clients->cit_name,
                ($clients->use_id_district == -1) ? 'ВСЕ' : $clients->dis_name,
                'ул.',
                $clients->use_street,
                ', дом.',
                $clients->use_building,
                ', кв.',
                $clients->use_room,
                ', домоф.',
                $clients->use_intercom,
                ' заезд',
                $clients->use_destonation,
            ];
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $clients->use_organization;
            $row[] = implode(' ', $name);
            $row[] = $clients->use_phone;
            $row[] = implode(' ', $name2);
            $row[] = $clients->use_phone_logist;
            //$row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a class="btn btn-success" href="/admin/view_providers/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a class="btn btn-info" href="/admin/edit_providers/' . $clients->use_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="/admin/delete_providers/' . $clients->use_id . '">
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

    function ajax_address()
    {
        $this->load->model('model_delivery');
        $id_user = $this->session->userdata('id_user');
        $data = array();
        if ($id_user) {
            $list = $this->model_delivery->get_datatables();
            foreach ($list as $delivery) {
                $address = [
                    'ул.',
                    $delivery->del_street,
                    ', дом.',
                    $delivery->del_building,
                    ', кв.',
                    $delivery->del_room,
                    ', домоф.',
                    $delivery->del_intercom,
                    ' заезд',
                    $delivery->del_destonation,
                ];

                $row = array();
                $row[] = $delivery->del_name;
                $row[] = $delivery->cou_name;
                $row[] = $delivery->reg_name;
                $row[] = $delivery->cit_name;
                $row[] = ($delivery->del_id_district == -1) ? 'ВСЕ' : $delivery->dis_name;
                $row[] = implode(' ', $address);
                $row[] = date('d.m.Y H:i:s', strtotime($delivery->created_at));
                $row[] = '
            <a class="btn btn-danger deleteAddress"  data-toggle="modal" href="#myModal4" id="' . $delivery->del_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_delivery->count_all(),
            "recordsFiltered" => $this->model_delivery->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_address_region()
    {
        $this->load->model('model_delivery');
        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $id_user = $this->session->userdata('id_user');
        else
            $id_user = $this->input->get('provider');
        $data = array();
        if ($id_user) {
            $list = $this->model_delivery->get_datatables();
            foreach ($list as $delivery) {
                $row = array();
                $row[] = $delivery->cou_name;
                $row[] = $delivery->reg_name;
                $row[] = $delivery->cit_name;
                $row[] = ($delivery->del_id_district == -1) ? 'ВСЕ' : $delivery->dis_name;
                $row[] = '
            <a class="btn btn-danger deleteAddress"  data-toggle="modal" href="#myModal4" id="' . $delivery->del_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_delivery->count_all(),
            "recordsFiltered" => $this->model_delivery->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_address_region_selector()
    {
        $this->load->model('model_delivery');
        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $id_user = $this->session->userdata('id_user');
        else
            $id_user = $this->input->get('provider');
        $data = array();
        $delivery_product = $this->input->get('delivery_product');
        if (isset($delivery_product))
            $delivery_product = explode(',', $delivery_product);
        if ($id_user) {
            $list = $this->model_delivery->get_datatables();
            foreach ($list as $delivery) {
                $row = array();
                $row[] = '<input type="checkbox"' . ((isset($delivery_product) && in_array($delivery->del_id, $delivery_product)) ? 'checked' : '') . ' name="delivery_id[]" value="' . $delivery->del_id . '">';
                $row[] = $delivery->cou_name;
                $row[] = $delivery->reg_name;
                $row[] = $delivery->cit_name;
                $row[] = ($delivery->del_id_district == -1) ? 'ВСЕ' : $delivery->dis_name;
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_delivery->count_all(),
            "recordsFiltered" => $this->model_delivery->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function ajax_delivery_areas()
    {
        $this->load->model('model_delivery');

        $list = $this->model_delivery->get_datatables();
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
            "recordsTotal" => $this->model_delivery->count_all(),
            "recordsFiltered" => $this->model_delivery->count_filtered(),
            "data" => $data,
            'query' => $this->db->last_query()
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
            $row[] = $products->use_organization;
            $row[] = $products->prd_title;

            $row[] = $products->prd_title_producer;
            $row[] = $products->prd_comments;
            $row[] = $products->prd_volume_price;
            $row[] = $products->prd_price;
            $row[] = $this->model_products->get_locations($products->prd_id);
            if ($this->session->userdata('emp_employees_groups_id') != 5) $uri = 'profile'; else $uri = 'admin';
            //$row[] = '<span class="label-success label label-default">Active</span>';
            $row[] = '<a target="_blank" class="btn btn-success" href="/' . $uri . '/view_products/' . $products->prd_id . '">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View
            </a>
            <a target="_blank" class="btn btn-info" href="/' . $uri . '/edit_products/' . $products->prd_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger delete_product" data-toggle="modal" href="#myModal"  id="' . $products->prd_id . '">
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

    function ajax_providers_delivery()
    {
        $this->load->model('model_delivery');
        $_GET['provider'] = -2;
        $list = $this->model_delivery->get_datatables();
        foreach ($list as $delivery) {
            $row = array();
            $row[] = $delivery->use_organization;
            $row[] = $delivery->cou_name;
            $row[] = $delivery->reg_name;
            $row[] = $delivery->cit_name;
            $row[] = ($delivery->del_id_district == -1) ? 'ВСЕ' : $delivery->dis_name;


            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_delivery->count_all(),
            "recordsFiltered" => $this->model_delivery->count_filtered(),
            "data" => $data,
            "query" => $this->db->last_query()
        );
        echo json_encode($output);
    }

    function ajax_category()
    {
        $this->load->model('model_category');

        $list = $this->model_category->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $category) {
            $no++;
            $row = array();
            $cat = $this->model_category->find($category->cat_pid);
            $row[] = (empty($cat[0]) ? $category->cat_name : $cat[0]->cat_name);;
            $row[] = (!empty($cat[0]) ? $category->cat_name : '');
            $row[] = $category->cat_description;
            $row[] = date('d.m.Y H:i:s', strtotime(($category->created_at)));
            $row[] = '
            <a class="btn btn-info"  data-toggle="modal" href="#myModal21"  id="' . $category->cat_id . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger deleteCategory"  data-toggle="modal" href="#myModal22"  id="' . $category->cat_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_category->count_all(),
            "recordsFiltered" => $this->model_category->count_filtered(),
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
        echo json_encode($this->district->get_district((int)$this->input->get('country'), (int)$this->input->get('region'), (int)$this->input->get('city')));
    }

    public function get_min_order()
    {
        $this->load->model('model_products');
        echo json_encode($this->model_products->get_min_order((int)$this->input->get('country'), (int)$this->input->get('region'), (int)$this->input->get('city')));
    }

    public function update_order()
    {
        $this->load->model('model_orders');
        $id = $this->input->post('order_id');
        unset($_POST['order_id']);
        $this->model_orders->update($id);
        echo json_encode(['message' => 'Заказ сохранен успешно!']);
    }

    public function delete_ori()
    {
        $this->load->model('model_orders_items');
        if ($this->model_orders_items->delete($this->input->post('ori_id'))) {
            $success = 'Успешно удален';
        }
        echo json_encode(array('success' => $success, 'message' => ($success === false) ? $this->db->error() : ''));

        return $success;
    }

    public function change_amount_order_items()
    {
        $this->load->model('model_orders_items');
        $id = $this->input->post('ori_id');
        unset($_POST['ori_id']);
        $item = $this->model_orders_items->find($id);
        if ($item !== flase) {
            $_POST['ori_sum'] = $_POST['ori_count'] * $item->ori_price;
            $success = $this->model_orders_items->update($id);
        } else {
            $success = false;
        }
        echo json_encode(array('success' => $success, 'message' => ($success === false) ? $this->db->error() : ''));

        return $success;
    }

    public function get_order_items()
    {
        $this->load->model('model_users');
        $this->load->model('model_orders_items');
        //die(var_dump($_GET));
        $list = $this->model_orders_items->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $sum = 0;
        foreach ($list as $items) {
            $no++;
            $row = array();
            $user = $this->model_users->find($items->prd_id_user);
            $user = !empty($user[0]) ? $user[0] : false;
            if ($user) $name = $user->use_organization; else $name = '';

            $row[] = $name;
            $row[] = $items->prd_title;
            $row[] = $items->ori_price;
            $row[] = '<div class="input-group">
                         <span class="input-group-btn">
                             <button class="btn btn-primary minus-amount" type="button">-
                             </button>
                         </span>
                        <input id="' . $items->ori_id . '" type="text" class="form-control text-center calc-amount" value="' . $items->ori_count . '">
                        <span class="input-group-btn">
                            <button class="btn btn-info plus-amount" type="button">+
                            </button>
                        </span>
                    </div>';
            $row[] = $items->ori_sum;
            $row[] = '
            <a class="btn btn-danger delete_item" data-toggle="modal" href="#myModalDelete"  id="' . $items->ori_id . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>';
            $sum += $items->ori_sum;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_orders_items->count_all(),
            "recordsFiltered" => $this->model_orders_items->count_filtered(),
            "data" => $data,
            'query' => $this->db->last_query(),
            'sum' => $this->model_orders_items->get_all_sum_order($_GET['id'])

        );
        echo json_encode($output);
    }

    public function add_order_item()
    {
        //die(var_dump($_POST));
        $this->load->model('model_products');
        $this->load->model('model_orders_items');
        $post = $this->input->post();
        $data = [];
        $data['success'] = false;
        $data['error'] = '';
        $data['order_id'] = (int)$post['order_id'];
        $order_id = (int)$post['order_id'];
        if ((int)$post['order_id'] == 0) {
            $order_id = $this->add_order();
        }
        if ($order_id > 0) {
            $data['order_id'] = $order_id;
            $products = $this->model_products->find($post['product_id']);
            $products = (isset($products[0]) ? $products[0] : false);
            if (isset($products) && !empty($products)) {
                $insert_data = [
                    'ori_id_products' => $products->prd_id,
                    'ori_id_orders' => $order_id,
                    'ori_count' => $post['amount'],
                    'ori_price' => $products->prd_price,
                    'ori_sum' => $products->prd_price * $post['amount'],
                    'ori_done' => 0,
                    'ori_comments' => '',
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $item = $this->model_orders_items->get_count_in_order($order_id, $products->prd_id);
                if ($item == 0) {
                    $result = $this->model_orders_items->insert_data($insert_data);
                } else {
                    $find = $this->model_orders_items->find_in_order($order_id, $products->prd_id);
                    if ($find !== false) {
                        $amount = $find->ori_count + $post['amount'];
                        $data_update = [
                            'ori_count' => $amount,
                            'ori_sum' => $find->ori_price * $amount,
                        ];
                        $result = $this->model_orders_items->change_amount_order_items($find->ori_id, $data_update);
                    }
                }
                $data['success'] = $result;
                $data['error'] = ($result) ? '' : 'Ошибка добавления позиции товара';
            } else {
                $data['error'] = 'Указанный товар не найден';
            }
        } else {
            $data['error'] = 'Ошибка создания заказа';
        }
        echo json_encode($data);
    }

    public function getusername()
    {
        $this->load->model('model_orders');
        $user = $this->model_orders->get_user_by_name();
        echo json_encode($user);
    }

    public function get_user()
    {
        $this->load->model('model_users');
        $user = $this->model_users->find($this->input->post('id'));
        $user = !empty($user[0]) ? $user[0] : false;
        echo json_encode(['user' => $user]);
    }

    public function get_address_user()
    {
        $this->load->model('model_orders');
        $address = $this->model_orders->get_address();
        echo json_encode(['address' => $address]);

    }

    public function add_order()
    {
        $this->load->model('model_orders');
        $data = [
            'ord_id_user' => NULL,
            'ord_father_name' => NULL,
            'ord_name' => NULL,
            'ord_last_name' => NULL,
            'ord_phone' => NULL,
            'ord_comments' => NULL,
            'ord_delivery_datetime' => NULL,
            'ord_author' => NULL,
            'ord_id_country' => NULL,
            'ord_id_region' => NULL,
            'ord_id_city' => NULL,
            'ord_id_district' => NULL,
            'ord_street' => NULL,
            'ord_building' => NULL,
            'ord_room' => NULL,
            'ord_intercom' => NULL,
            'ord_destonation' => NULL,
            'ord_done' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->model_orders->insert_data($data);
    }

    public function filter_product()
    {
        $this->load->model('model_products');
        $data = [];
        $order = 'prd_id';
        $category = (int)$this->input->post('category');
        $country = (int)$this->input->post('ord_id_country');
        $region = (int)$this->input->post('ord_id_region');
        $city = (int)$this->input->post('ord_id_city');
        $district = (int)$this->input->post('ord_id_district');
        $min_order = (int)$this->input->post('min_order');
        $min_liytov = (int)$this->input->post('min_liytov');
        $order_price = $this->input->post('order_price');
        if (!empty($category))
            $this->db->where('prd_id_category in (select c.cat_id from category c where c.cat_id=' . $category . ' or c.cat_pid=' . $category . ')');
        if (!empty($country))
            $data['del_id_country'] = $country;
        if (!empty($region))
            $data['del_id_region'] = $region;
        if (!empty($city))
            $data['del_id_city'] = $city;
        if (!empty($min_order))
            $data['prd_amount_min'] = $min_order;
        if (!empty($min_liytov))
            $data['prd_volume_price'] = $min_liytov;
        if (!empty($district) && $district > 0)
            $data['del_id_district'] = $district;
        if (!empty($order_price))
            $order = 'prd_price ' . $order_price;

        $product = $this->model_products->get_products($data, $order);

        $html = '';

        foreach ($product as $item) {
            $html .= $this->load->view('/admin/one_product', $item, true);
        }
        echo json_encode(array('html' => $html, 'query' => $this->db->last_query()));
    }

    function profile()
    {
        $this->load->model('model_users');
        $this->load->model('model_providers');
        $id_user = $this->session->userdata('id_user');
        if ($this->input->method() == 'post') {
            $eprofile = $this->input->post('profile');

            if (isset($_POST['__phone_prefix'])) {
                $_POST['use_phone'] = $_POST['__phone_prefix'] . $_POST['use_phone'];
                unset($_POST['__phone_prefix']);
            }
            $post = $this->input->post();
            $message = "<i class=\"glyphicon glyphicon-ok-sign\" aria-hidden=\"true\"></i> <b>Изменения сохранены.</b>";
            switch ($eprofile) {
                case 'edit_providers':
                    $result = $this->edit_providers_data($post);
                    break;
                case 'edit_logist':
                    $result = $this->edit_logist_data($post);
                    break;
                case 'edit_user':
                    $result = $this->edit_user();
                    if (!$result)
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка сохранения. Обратитесь к администратору сайта!";
                    break;
                case 'edit_schedule':
                    $result = $this->edit_schedule($post);
                    if (!$result)
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка сохранения. Обратитесь к администратору сайта!";
                    break;
                case 'saveNewAddress':
                    $result = $this->saveNewAddress();
                    if (!$result)
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка сохранения. Обратитесь к администратору сайта!";
                    break;
                case 'deleteAddress':
                    $result = $this->deleteAddress();
                    if (!$result)
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка удаления. Обратитесь к администратору сайта!";
                    break;
                case 'saveNewPassword':
                    $result_arr = $this->saveNewPassword();
                    if (!$result_arr[0]) {
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>" . $result_arr[1] . "!";
                    }
                    $result = $result_arr[0];
                    break;
                case 'editProducts':
                    $result_arr = $this->saveNewPassword();
                    if (!$result_arr[0]) {
                        $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>" . $result_arr[1] . "!";
                    }
                    $result = $result_arr[0];
                    break;
            }
            echo json_encode(['success' => $result, 'message' => $message]);
            return true;
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
        $this->load->model('model_country');
        $country = $this->model_country->get_all();
        switch ($part) {
            case 'address':
                if ((int)$this->session->userdata('emp_employees_groups_id') == 3)
                    $data = array(
                        'content' => $this->load->view('/profile/main_address', ['country' => $country], true),
                        'profile' => '',
                        'bred' => $bred,

                    );
                else
                    $data = array(
                        'content' => $this->load->view('/profile/main_provider_address', ['country' => $country], true),
                        'profile' => '',
                        'bred' => $bred,

                    );
                break;
            case 'change_password':
                $client = $this->model_users->find($id_user);
                $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);
                $data = array(
                    'content' => $this->load->view('/profile/main_password', ['clients' => $client], true),
                    'profile' => '',
                    'bred' => $bred,

                );
                break;
            case 'template_order':
                $data = array(
                    'content' => $this->load->view('/profile/main_template_order', [], true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
            case 'balance':
                $data = array(
                    'content' => $this->load->view('/profile/main_template_order', [], true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
            case 'products':
                $data = array(
                    'content' => $this->load->view('/admin/products', [], true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
            case 'add_products':
                $this->load->model('model_products', 'products');
                $this->load->model('model_providers');
                $this->load->model('model_city');
                $this->load->model('model_country');
                $this->load->model('model_category');
                $this->load->model('model_delivery_product');
                $providers = $this->model_providers->get_all();
                $category = $this->model_category->get_category_tree();
                $country = $this->model_country->get_all();
                $data['country'] = $country;
                $data['providers'] = $providers;
                $data['category'] = $category;
                $data = array(
                    'content' => $this->load->view('/admin/add_products', $data, true),
                    'profile' => '',
                    'bred' => $bred,
                );
                break;
            default:
                if ($this->session->userdata('emp_employees_groups_id') == 2) {
                    $template = '/profile/main_providers';
                    $client = $this->model_users->find($id_user);
                    $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);
                    $var = 'providers';
                } else {
                    $template = '/profile/main_users';
                    $client = $this->model_users->find($id_user);
                    $client = (isset($client[0]) && !empty($client[0]) ? $client[0] : false);
                    $var = 'clients';
                }

                $data = array(
                    'content' => $this->load->view($template, [$var => $client, 'country' => $country], true),
                    'profile' => '',
                    'bred' => $bred,

                );
                $this->lang->load('email', 'english');
                if ($mess = $this->session->flashdata('email_confirm')) $data['data']['message_email_confirm'] = $this->lang->line('text_personal_registration_confirmed');
                break;
        }

        $this->load->view('/admin/profile', $data);
    }

    function saveNewPassword()
    {
        $this->load->model('model_employee');
        $result = array(false, '');
        $new_password = $this->input->post('new_password');
        $old_password = $this->input->post('old_password');
        $passconf = $this->input->post('passconf');

        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $id_user = $this->session->userdata('id_user');
        else
            $id_user = $this->input->post('provider');

        $user = $this->model_employee->get_user($id_user);
        if ($this->model_employee->generate_password($user->emp_salt, $old_password) == $user->emp_password) {
            if ($new_password == $passconf) {
                $password = $this->model_employee->generate_password($user->emp_salt, $new_password);
                $this->model_employee->update($user->emp_id_user, ['emp_password' => $password, 'updated_at' => date('Y-m-d H:i:S')]);
                $result = array(true, '  Пароль сменился успешно');
            } else {
                $result = array(false, '  {Новый пароль} не совпадает с {Подтвердите пароль}');
            }
        } else {
            $result = array(false, '  Вы указали неверно старый пароль. Повторите попытку проверив свой старый пароль');
        }

        return $result;
    }

    function edit_user()
    {
        $id_user = $this->session->userdata('id_user');
        $this->load->model('model_users');
        unset($_POST['profile']);
        if ($this->model_users->update($id_user)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveNewAddress()
    {
        if ($this->session->userdata('emp_employees_groups_id') != 5)
            $id_user = $this->session->userdata('id_user');
        else
            $id_user = $this->input->post('provider');
        $this->load->model('model_delivery');
        unset($_POST['profile']);
        $_POST['del_id_user'] = $id_user;
        if ($this->model_delivery->insert()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAddress()
    {
        $this->load->model('model_delivery');
        unset($_POST['profile']);

        if ($this->model_delivery->delete($this->input->post('id'))) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory()
    {
        $this->load->model('model_category');
        $result = $this->model_category->delete($this->input->post('cat_id'));
        if ($result) {
            $message = "<i class=\"glyphicon glyphicon-ok-sign\" aria-hidden=\"true\"></i> <b>Изменения сохранены.</b>";
        } else {
            $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка удаления. Обратитесь к администратору сайта!";
        }

        echo json_encode(['success' => $result, 'message' => $message]);
        return true;
    }

    public function deleteProducts()
    {
        $this->load->model('model_products');
        $result = $this->model_products->delete($this->input->post('prd_id'));
        if ($result) {
            $message = "<i class=\"glyphicon glyphicon-ok-sign\" aria-hidden=\"true\"></i> <b>Изменения сохранены.</b>";
        } else {
            $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка удаления. Обратитесь к администратору сайта!";
        }

        echo json_encode(['success' => $result, 'message' => $message]);
        return true;
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

    function edit_schedule($post)
    {
        $id = $this->session->userdata('id_user');

        $this->load->model('model_providers');
        $data = $this->model_providers->get_by_employee($id);
        // echo $this->db->last_query();die;
        $data = (isset($data[0]) && !empty($data[0]) ? $data[0] : false);
        unset($_POST['profile']);
        if (!empty($data) && $this->model_providers->update($data->use_id)) {
            return true;
        } else {
            return false;
        }
    }


    function product_category()
    {

        $bred = array(
            [
                'url' => '/admin',
                'title' => 'Главная',
                'flat' => false,
            ],
            [
                'url' => '/product_category',
                'title' => 'Категории товаров',
                'flat' => true,
            ],
        );
        $this->load->model('model_category');
        $category = $this->model_category->get_all();
        $data = array(
            'content' => $this->load->view('/admin/product_category', ['category' => $category], true),
            'bred' => $bred,
        );
        $this->load->view('/admin/main', $data);
    }

    function addCategory()
    {
        $this->load->model('model_category');
        $result = $this->model_category->insert();
        $message = "<i class=\"glyphicon glyphicon-ok-sign\" aria-hidden=\"true\"></i> <b>Изменения сохранены.</b>";
        if (!$result)
            $message = "<i class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></i>Извените! Ошибка сохранения. Обратитесь к администратору сайта!";

        echo json_encode(['success' => $result, 'message' => $message]);
        return true;
    }
}

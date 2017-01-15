<?php
/**
 * Created by PhpStorm.
 * User: AntonSH
 * Date: 23.10.14
 * Time: 15:16
 */

class Auth extends CI_Controller {

    public $page = array(
        'title'    => '',
        'data'     => '',
        'content'  => '',
        'active'   => 'auth'
    );

    public $error_registration='';

    /* @name_rus - Страница авторизации */

    /**
     * initial cntroller settings
     */
    function __construct() {

        parent::__construct();
	    $this->load->library('session');
        $this->load->model('model_auth');
        $this->load->library('form_validation');

    }

    /**
     * index auth page
     */
    public function index(){

        $this->page['content'] = $this->load->view('admin/auth/login', $this->page, true);
    }
    
    /**
     * Login to admin panel
     * @return nothing
     * @author Tremor
     */ 
    public function login(){

        $data = array();
        $this->load->helper('security');
        $this->form_validation->set_rules('login', 'Login', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|trim|required');

        if ($this->form_validation->run() == true){

            if ($this->model_auth->login($this->input->post('login'), $this->input->post('password'))){
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->model_auth->messages());
				$redirect = $this->session->userdata('admin_redirect');
				if ($redirect) {
					$this->session->set_userdata('admin_redirect', false);
					$this->session->unset_userdata('admin_redirect');
					redirect($redirect, 'refresh');
				}
				
                redirect('/admin', 'refresh');
            }else{
                $this->session->set_flashdata('message', $this->model_auth->messages());
                redirect('/auth/login', 'refresh');
            }

        }else{

            $data['login'] = $this->input->post('login');
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data['no_visible_elements'] = true;

            $this->load->view('admin/auth/login', $data);

        }
    }

    /**
     * Logout admin
     * @return nothing
     * @author Tremor
     */
    public function logout(){

        $this->data['title'] = "Logout";

        //log the employee out
        $this->model_auth->logout();

        redirect('/auth/login', 'refresh');
    }

    /**
     * create test account
     * @return nothing
     * @author Tremor
     */
    public function ins(){

        $array_data = array(
            'emp_password' => md5('176083549sQ'),
            'emp_fname' => 'Admin',
            'emp_lname' => '',
            'emp_email' => 'admin@waterbuy.net',
            'emp_employees_groups_id' => 5,
        );

        $this->db->insert('employee', $array_data);
    }
} // end Class

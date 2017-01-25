<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        parent::__construct();
        enter_site();


        if (isset($_GET['confirm_code'])) {
            $this->_check_confirm_email();

        }

        $this->load->view('welcome_message');
	}


    private function _check_confirm_email()
    {
        $this->load->library('session');
        $this->load->model('model_auth');
        $this->load->model('model_employee');
        // переход с письма с кодом подтверждения
        if (isset($_GET['confirm_code']) && isset($_GET['u'])) {
            //модель для работы с пользователями

            $confirm_code = $this->model_employee->get_user_confirm_code((int)$_GET['u']);
            if ($_GET['confirm_code'] === $confirm_code) {
                $this->model_employee->set_user_email_check((int)$_GET['u'], 1);
                $this->model_auth->login_by_id((int)$_GET['u']);
                $this->session->set_flashdata('email_confirm', 'confirmed');
                redirect('/profile', 'refresh');
                $this->model_auth->login_by_id((int)$_GET['u']);
            }
        }
    }

}

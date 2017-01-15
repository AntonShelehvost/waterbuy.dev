<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 13.01.2017
 * Time: 13:23
 */


/**
 * Отправка письма пользователю
 *
 * @param       $to - кому отправить
 * @param       $subject - тема письма
 * @param       $message - содержание письма
 * @param array $config - настройки писма
 *
 * @return bool - результат
 */
function mega_send_email($to = false, $subject, $message, $config = array('mailtype' => 'html', 'charset' => 'utf-8'), $title = '')
{
    $CI =& get_instance();
    /*if (strpos($message, 'mail-logo.png') === false) {
        $message = $CI->load->view('admin/email/view_email', array('title' => $title, 'text' => $message), true);
    }*/
    $CI->load->library('email');
    $CI->email->initialize($config);
    $CI->email->from('noreply@waterbuy.net', 'WaterBuy');
    //if (!$to) $to = $CI->model_site_settings->get_item('email_admin1');
    //$CI->email->bcc($CI->model_site_settings->get_item('email_admin1'));
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);

    if ($CI->email->send()) {
        //todo: добавить отправку письма в лог
        return true;
    }else{
        die($this->email->print_debugger());
    }
    return false;
}

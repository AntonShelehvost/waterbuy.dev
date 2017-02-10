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

function enter_site()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $uri = $_SERVER['REQUEST_URI'];
    $user = @$_SERVER['PHP_AUTH_USER'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $ref = @$_SERVER['HTTP_REFERER'];
    $dtime = date('r');

    if ($ref == "") {
        $ref = "None";
    }
    if ($user == "") {
        $user = "None";
    }
    $entry_line = "$dtime - IP: $ip | Agent: $agent | URL: $uri | Referrer: $ref | Username: $user " . PHP_EOL;
    $fp = fopen("./application/logs/logs.txt", "a");
    fputs($fp, $entry_line);
    fclose($fp);
}

function get_stat_enter_site()
{
    $string = file_get_contents('./application/logs/logs.txt');
    $enter = [];
    $enter = explode(PHP_EOL, $string);
    $ip = [];
    $allip = [];

    foreach ($enter as $item) {
        if (!empty($item)) {
            $str = explode('|', $item);
            $str2 = explode(' - ', $str[0]);
            $allip[] = $str2[1];
            if (!in_array($str2[1], $ip)) $ip[] = $str2[1];

        }
    }

    return count(array_unique($allip));
}


/*
 * Считывает данные из любого excel файла и созадет из них массив.
 * $filename (строка) путь к файлу от корня сервера
 */
function parse_excel_file($filename)
{
    // подключаем библиотеку
    require_once './assets/excel/Classes/PHPExcel.php';

    $result = array();

    // получаем тип файла (xls, xlsx), чтобы правильно его обработать
    $file_type = PHPExcel_IOFactory::identify($filename);
    // создаем объект для чтения
    $objReader = PHPExcel_IOFactory::createReader($file_type);
    $objPHPExcel = $objReader->load($filename); // загружаем данные файла в объект
    $result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив

    return $result;
}


/** Транслитирование кирилического текста
 * @param $str - входящая строка
 * @return string - результат
 */
function translitNameHTTP($str)
{
    $tr = array(
        "А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
        "Д" => "D", "Е" => "E", "Ж" => "J", "З" => "Z", "И" => "I",
        "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N",
        "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T",
        "У" => "U", "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH",
        "Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "YI", "Ь" => "",
        "Э" => "E", "Ю" => "YU", "Я" => "YA", "а" => "a", "б" => "b",
        "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
        "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
        "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
        "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
        "ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya",
        "," => "_", "ё" => "e", "Ё" => "E", ";" => "", ":" => "", " " => "-", '?' => '',
        "'" => '', "\"" => '', "«" => '', "»" => '', "–" => '-',
        "і" => 'i', "І" => 'I', "’" => '', "(" => '', ")" => '', "@" => '', "&" => '', "!" => '',
        "=" => '-', 'є' => 'e', 'Є' => 'E'
    );
    return strtr($str, $tr);
}
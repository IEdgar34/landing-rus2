<?php
define('RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify');
define('RECAPTCHA_KEY', '6Ld-n14qAAAAAJB4Wr-LXFbj-yXMW12MtYRPM002');
$title = "Сообщение с сайта behappy";                 // Тема сообщения
$admin = "behappy_clinic@mail.ru";                            // Получатель
$url = "https://www.google.com/recaptcha/api/siteverify";   // API reCAPTCHA для проверки подлинности капчи
$key = "6Ld-n14qAAAAAJB4Wr-LXFbj-yXMW12MtYRPM002";

$name = $_POST['name'];                                     //  Поле имени
$phone = $_POST['phone'];                                   //  Поле связи
// $text = $_POST['text'];                                     //  Свободное поле текста

//@ Обработка входящих параметров для избежания простых способов обхода
$name = htmlspecialchars($name);                            //  Преобразуем спец символы в HTML
$phone = htmlspecialchars($phone);
// $text = htmlspecialchars($text);
$name = urldecode($name);                                   //  Декодируем значение
$phone = urldecode($phone);
// $text = urldecode($text);
$name = trim($name);                                        //  Убираем лишние пробелы
$phone = trim($phone);
// $text = trim($text);

//@ Проверка на обязательные поля
if (empty($name) || empty($phone)) {
    print_r($_POST);
    //echo '<meta http-equiv="refresh" content="2;URL=/">';   //  Редирект на главную
    exit('Заполните поля имени и способа связи');           //  Завершаем работу
}

//@ Проверка на наличие ключа капчи
if (!$_POST["g-recaptcha-response"]) {
    echo '<meta http-equiv="refresh" content="2;URL=/">';   //  Редирект на главную
    exit('Ошибка проверки на робота');                      //  Завершаем работу
} else {

    //@ Проверка капчи, формируем параметры запроса
    $query = array(
        "secret" => $key,
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER['REMOTE_ADDR']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query); 
    $googledata = json_decode(curl_exec($ch), $assoc=true); 
    curl_close($ch);
    //@ Отрицательный ответ от сервера
    if (!$googledata['success']) {
        echo '<meta http-equiv="refresh" content="2;URL=/">';   //  Редирект на главную
        exit('Вы не прошли проверку на робота');                //  Завершаем работу
    }
}

//@ Отправка письма функцией mail() - получатель, заголовок, текст
if  ( mail( $admin, $title, "Имя: ".$name.". Связь: ".$phone.". \r\n" ) ) {
    echo '<meta http-equiv="refresh" content="2;URL=/">';       //  Редирект на главную
    echo "Сообщение успешно отправлено";                        //  Говорим что сообщение отправлено
} else {
    echo "При отправке сообщения возникли ошибки, все поля обязательны к заполнению";   //  Увы, сообщение не отправилось
}

?>
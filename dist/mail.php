<?php
$title = "Сообщение с сайта behappy";
$admin = "edo.jan.94@bk.ru";
$name = $_POST['name'];
$phone = $_POST['phone'];
$textarea = $_POST['textarea'];
$name = htmlspecialchars($name);
$phone = htmlspecialchars($phone);
$textarea = htmlspecialchars($textarea);
$name = urldecode($name);
$phone = urldecode($phone);
$textarea = urldecode($textarea);
$name = trim($name);
$phone = trim($phone);
$textarea = trim($textarea);
if (empty($name) || empty($phone)) {
    print_r($_POST);
    exit('Заполните поля имени и способа связи');
}
$message = "Имя: " . $name . "\r\n" .
           "Номер телефона: " . $phone . "\r\n" .
           "Вопрос: " . $textarea . "\r\n";

if (mail($admin, $title, $message)) {
    echo '<meta http-equiv="refresh" content="2;URL=/">';
    echo "Сообщение успешно отправлено";
} else {
    echo "При отправке сообщения возникли ошибки, все поля обязательны к заполнению";
}
?>
<?php
$title = "Сообщение с сайта Мясной";
$admin = "franchise@ab-group.rest";
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
$headers = [
    "From" => "no-reply@ваш-сайт.ru",  // Замените на ваш домен
    "Reply-To" => "no-reply@ваш-сайт.ru",
    "Content-Type" => "text/plain; charset=utf-8",
    "MIME-Version" => "1.0",
    "X-Mailer" => "PHP/" . phpversion()
];

// Преобразуем заголовки в строку
$headersString = "";
foreach ($headers as $key => $value) {
    $headersString .= "$key: $value\r\n";
}

if (empty($name) || empty($phone)) {
    echo "Заполните поля имени и способа связи";
    exit;
}

$message = "Имя: " . $name . "\r\n" .
           "Номер телефона: " . $phone . "\r\n" .
           "Вопрос: " . $textarea . "\r\n";

if (mail($admin, $title, $message, $headersString)) {
    
    echo "Сообщение успешно отправлено";
    exit;
} else {
    echo "При отправке сообщения возникли ошибки, все поля обязательны к заполнению";
    exit;
}
?>
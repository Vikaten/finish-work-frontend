<?php
$msg_box = ""; // в этой переменной будем хранить сообщения формы

if($_POST['btn_submit']){
$errors = array(); // контейнер для ошибок
// проверяем корректность полей
if($_POST['user_name'] == "") $errors[] = "The 'Your name' field is not filled in!";
if($_POST['user_number'] == "") $errors[] = "The 'Your number' field is not filled in!";

// если форма без ошибок
if(empty($errors)){
// собираем данные из формы
$message = "Name user: " . $_POST['user_name'] . "<br/>";
$message .= "E-mail user: " . $_POST['user_email'] . "<br/>";
send_mail($message); // отправим письмо
// выведем сообщение об успехе
$msg_box = "<span style='color: green;'>The message has been sent successfully!</span>";
}else{
// если были ошибки, то выводим их
$msg_box = "";
foreach($errors as $one_error){
$msg_box .= "<span style='color: red;'>$one_error</span><br/>";
}
}
}
// функция отправки письма
function send_mail($message){
// почта, на которую придет письмо
$mail_to = "vikaten06@gmail.com";
// тема письма
$subject = "Feedback letter";

// заголовок письма
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
$headers .= "From: Тестовое письмо <адрес_почты_на_хосте>\r\n"; // от кого письмо

// отправляем письмо
mail($mail_to, $subject, $message, $headers);
}
?>
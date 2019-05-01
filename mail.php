<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$pol = $_POST['pol'];
$form_of_study = $_POST['form_of_study'];
$propiska = $_POST['propiska'];
$location = $_POST['location'];
$file = $_FILES['file'];
$baza = $_POST['baza'];
$Date_of_Birth = $_POST['Date_of_Birth'];
$specialnost = $_POST['specialnost'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'abituriyent.abituriyent@mail.ru';
$mail->Password = 'kawUlS83QZlsOmkANU'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('abituriyent.abituriyent@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('komissiya85@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка от абитуриента';
$mail->Body    = '<h1><b>Абитериент оставил заявку: </b></h1><br>'. 
                 '<b>Ф.И.О.: </b> '  .$name.' '.$surname.' '.$patronymic.'.'.
                 '<br><b>Пол: </b>'.$pol.
                 '<br><b>Форма обучения: </b>'.$form_of_study.
                 '<br><b>Дата рождения: </b>'.$Date_of_Birth.
                 '<br><b>Почта: </b> ' .$email.
                 '<br><b>Место жительства по прописки: </b> ' .$propiska.
                 '<br><b>Фактическое место жительства: </b> ' .$location.
                 '<br><b>Контактный телефон телефон: </b> '   .$phone.
                 '<br><b>База классов: </b> '   .$baza.
                 '<br><b>Специальности: </b> '   .$specialnost;

$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank.html');
}
?>
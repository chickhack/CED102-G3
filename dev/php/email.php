<?php
require("./PHPMailer/class.phpmailer.php");
$receive_data = json_decode(trim(file_get_contents("php://input")));
$customer = $receive_data->orderer;
$email = $receive_data->email;
echo $customer;
echo $email;
//Send mail using gmail
$mail = new PHPMailer(true);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "ced102space@gmail.com"; // =====GMAIL username
$mail->Password = "AAAA1111"; // =====GMAIL password

//Typical mail data
$mail->AddAddress("$email");//========
$mail->SetFrom("ced102space@gmail.com");//========
$mail->Subject = "Spaced";//========
$mail->Body = "親愛的顧客 $customer ， 感謝您在Spaced商城購物，期待您的下次消費";//========

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>
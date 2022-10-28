<?php 

 require __DIR__ .'/../../vendor/autoload.php';

 $request = $_REQUEST['email'];
 $base64 = base64_encode("?email=$request");
 $url = "alterarSenha.php:9000/$base64";
 $response = json_encode([
    'success' => false,
    'data' => [],
    'message' => 'Nenhuma resposta obtida pelo servidor.'
 ]);
 //echo $url;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
//Server settings    
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '7433623f90f6b9';
$phpmailer->Password = '6d6f73562d0c85';

    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $phpmailer->setFrom('wander.silva@gmail.com', 'Wander');
    $phpmailer->addAddress('wander.silva@gmail.com', 'Wscom');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $phpmailer->isHTML(true);                                  //Set email format to HTML
    $phpmailer->Subject = 'Resetar a senha';
    $phpmailer->Body    = 'Clique no link abaixo para enviar solicitação de alteração de senha:';
    $phpmailer->Body    .= $url;
    $phpmailer->AltBody = 'Clique no link abaixo para enviar solicitação de alteração de senha:';

    $mail->send();
    
    $response = json_encode([
          'success' => true,
          'data' => [],
          'message' => 'Link para recuperação de senha enviado com sucesso para o email informado'         
    ]);

} catch (Exception $e) {
    $response = json_encode([
        'success' => true,
        'data' => [],
        'message' => "Não foi possível enviar o email: <br /> {$mail->ErrorInfo}"         
  ]);

}

echo $response;
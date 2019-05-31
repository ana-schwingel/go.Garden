<?php
    include "connection.php";
    # Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    require_once("phpmailer/PHPMailer.php");
    require_once("phpmailer/SMTP.php");

    $email = $_POST['inputEmail'];
    $sql = "select * from profiles where email = '$email'";
    $result_sql = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($result_sql);
    $name = $row['name'];
    $username = $row['username'];
    $password = $row['password'];

# Inicia a classe PHPMailer
$mail = new PHPMailer();

# Define os dados do servidor e tipo de conexão
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "localhost"; # Endereço do servidor SMTP
$mail->Port = 587; // Porta TCP para a conexão
$mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
$mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
$mail->Username = 'heitor_murara@estudante.sc.senai.br'; # Usuário de e-mail
$mail->Password = 'TIYX7572'; // # Senha do usuário de e-mail

# Define o remetente (você)
$mail->From = "heitor_murara@estudante.sc.senai.br"; # Seu e-mail
$mail->FromName = "Heitor Murara"; // Seu nome

# Define os destinatário(s)
$mail->AddAddress("$email", "$name");

# Define os dados técnicos da Mensagem
$mail->IsHTML(true); # Define que o e-mail será enviado como HTML
#$mail->CharSet = 'iso-8859-1'; # Charset da mensagem (opcional)

# Define a mensagem (Texto e Assunto)
$mail->Subject = "Redefinição de senha"; # Assunto da mensagem
$mail->Body = "Você solicitou a redefinição de senha, informamos que seu usuário é: '$username' e sua senha é: 'password' \r\n :)";

# Define os anexos (opcional)
#$mail->AddAttachment("c:/temp/documento.pdf", "documento.pdf"); # Insere um anexo

# Envia o e-mail
$enviado = $mail->Send();

# Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

# Exibe uma mensagem de resultado (opcional)
if ($enviado) {
 echo "E-mail enviado com sucesso!";
} else {
 echo "Não foi possível enviar o e-mail.";
 echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}
?>
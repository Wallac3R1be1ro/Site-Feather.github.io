<?php
session_start();

$Nome = $_POST["nome_User"];
$Email = $_POST["email_User"];
$SenhaAdm = $_POST["senha_User"];



include("../conexao/conexao.php");

if ( $_POST["senha_User"] == $_POST["confirmSenha_User"]) 
{
    include ("../conexao/SenhaEmail.php");
    $_SESSION ['Nomeuser'] = $Nome;
    $_SESSION ['Emailuser'] = $Email;
    $_SESSION ['Senhauser'] = $SenhaAdm;
    $_SESSION ['codigoGen'] = $codigo = rand(2,100);

    try 
    {

        

        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s'); 
        
        require_once("../conexao/phpmailer/class.phpmailer.php");
        $para = $Email;
        $de ='wallacesantos12wr@outlook.com';
        $de_nome = 'Equipe Feather';


        function smtpmailer($para, $de, $de_nome, $codigo)
        {
            
            global $erro;
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587;
            $mail->Username = USER;
            $mail->Password = PWD;
            $mail->SetFrom($de, $de_nome);
            $mail->Subject = "Confirmar Email";
            $mail->Body = $codigo;
            $mail->AddAddress($para);
            if(!$mail->Send()) 
            {
                $error = 'Mail error: '.$mail->ErrorInfo; 
                return false;
            } 
            else 
            {
                $error = 'Mensagem enviada!';
                return true;
            }

        }

        

        $Vai    = "Seu codigo de confirmação é: $codigo";

        if (smtpmailer($Email, 'wallacesantos12wr@outlook.com', 'Equipe Feather', $Vai)) 
        {
        echo "<script> 
                    alert ('confirme seu codigo enviado no Email!');
                    document.location.href = 'verificar.php';
                </script>";
        }  
        if (!empty($error)) echo $error;

    }
    catch(PDOException $erro)
    {
        echo "Erro" . $erro -> getMessage();
    }
}
    


else 
{
    echo "<script> alert ('Senha não confere!');
    document.location.href = 'Cadastro.html';</script>";
}
?>
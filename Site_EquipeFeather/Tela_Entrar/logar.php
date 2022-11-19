<?php

    session_start();

    $_SESSION["controle"] = "logado";

    $LoginUser = $_POST["Email"];
    $SenhaUser = $_POST["Senha"];

    include "../conexao/conexao.php";

    $Comando=$conexao->prepare("SELECT id_user, nome_user, email_user, senha_user FROM tb_usuario 
                                WHERE email_user =? AND senha_user =?");
    
    $Comando->bindParam(1, $LoginUser);
    $Comando->bindParam(2, $SenhaUser);
    
    if ($Comando->execute()) 
    {
    

        if ($Comando->rowCount() > 0) 
        {
            while ($Linha = $Comando->fetch(PDO::FETCH_OBJ)) 
            {
                $id = $Linha->idUsuario;
                $_SESSION['id_user'] = $id;

                $nome = $Linha->nomeUsuario;
                $_SESSION['nome_user'] = $nome;

                $email = $Linha->emailUsuario;
                $_SESSION['email_user'] = $email;

                $senha = $Linha->senhaUsuario;
                $_SESSION['senha_user'] = $senha;

                header('location:../Tela_Inicio/inicio.html');
            }
        }
   
        else 
        {
            unset($_SESSION['controle']);

            echo "
            <script> 
            alert('Usuario e/ou Senha não confere!');
            document.location.href = 'Entrar.html';        
            </script>";
            
        }
    }
?>
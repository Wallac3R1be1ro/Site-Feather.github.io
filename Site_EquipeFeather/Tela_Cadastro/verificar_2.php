<?php 
        session_start();
        $codigo_user = $_POST["codigo_User"];   
        include("../conexao/conexao.php");

            try
            {
                if ($_POST["codigo_User"] == $_SESSION['codigoGen'])
                {
            

                    $Comando=$conexao->prepare("INSERT INTO tb_usuario (nome_user, email_user, senha_user) VALUES ( ?, ?, ?)");
            
                    $Comando->bindParam(1, $_SESSION ['Nomeuser']);
                    $Comando->bindParam(2, $_SESSION ['Emailuser']);
                    $Comando->bindParam(3, $_SESSION ['Senhauser']);
            
                        
                    if ($Comando->execute())
                    {
                        if ($Comando->rowCount () >0) 
                        {
                            echo "<script> 
                            alert ('Conta cadastrada com sucesso');
                            document.location.href = 'Cadastro.html';
                            </script>"; 						
            
                        }
                        else 
                        {
                        echo "Erro ao tentar efetivar o contato.";

                        }
                    }
                    else 
                    { 
        
                        throw new PDOException("Erro: Não foi possivel executar a declaração sql.");
            
                    }
                }
                else {
                    echo "<script> 
                            alert ('Codigo incorreto!');
                            document.location.href = 'verificar.php';
                            </script>";
                }   
            }   
            catch (PDOException $erro)
            {
                echo"Erro" . $erro->getMessage();
            }          
?>
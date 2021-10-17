<?php
require_once 'Classes/usuarios.php';
$u = new usuario;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
   
<div class="container">
<form method="POST">
    <p class="cabecalho">Cadastrar</p>
    <div class="box">
        <p>Nome</p>
        <div>
        <input type="text" name="nome" id="" placeholder="Entre com seu Nome" maxlength="50">
</div>
</div>
<div class="box">
        <p>Telefone</p>
        <div>
        <input type="text" name="telefone" id="" placeholder="Entre com seu Telefone"  maxlength="14">
</div>
</div>
    <div class="box">
        <p>Usuario</p>
        <div>
        <input type="text" name="email" id="" placeholder="Entre com seu Email" maxlength="40">
</div>
</div>
<div class="box">
    <p>Senha</p>
    <div>
        <input type="text" name="senha" id="" placeholder="Entre com sua Senha" maxlength="15">
    </div>
</div>
<div class="box">
        <p>Confirme sua senha</p>
        <div>
        <input type="text" name="confSenha" id="" placeholder="Entre com sua senha novamente">
</div>
</div>
<button class="loginBtn">Cadastrar</button>
</form>
</div>

<?php

if(isset ($_POST['nome']))
{
$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$confirmarSenha = addslashes($_POST['confSenha']);

if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
 {
     $u -> conectar("projeto_login", "localhost","root", "");
       if( $u -> $msgERRO == "")
       {   
            if($senha == $confirmarSenha)
            {
                if ($u -> Cadastrar($nome,$telefone,$email,$senha))
            {
                    ?>
                     <div id= "msg-sucesso">
                          "Cadastrado com Sucesso! Acesse para Entrar";
                       </div>
                     <?php
                }
                 else{
                     ?>
                    <div class="msg-erro">
                     "Email ja cadastrado!";
                    </div>
                     <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                   "senha e confirmar senha não correspondem!";
                </div>
               <?php
            }
        }
        else
        {
            ?>
            <div class="msg-erro">
              "Erro:" .$u-> msgERRO;
            </div>
        <?php
        }
    }else{
        ?>
        <div class="msg-erro">
            "preencha todos os campos";
        </div>
    <?php
}
}



?>



</body>
</html>
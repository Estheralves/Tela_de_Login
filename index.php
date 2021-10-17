<?php
require_once 'CLASSES/usuarios.php';
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
<form method="POST" >
    <p class="cabecalho">Entrar</p>
    <div class="box">
        <p>Email</p>
        <div>
        <input type="email" name="email" id="" placeholder="Entre com seu Email">
</div>
</div>
<div class="box">
    <p>Senha</p>
    <div>
        <input type="senha" name="senha" id="" placeholder="Entre com sua Senha">
    </div>
</div>

<button class="loginBtn">Entrar</button>
<p class="texto">Nao tem uma conta? <a href="cadastrar.php">Cadastrar</a></p>
</form>
</div>
<?php
if(isset ($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
     if ( !empty($email) && !empty($senha))
     {
        $u -> conectar("projeto_login", "localhost","root", "");
            if( $u-> msgERRO == "")
           {   
                if($u->logar($email, $senha))
                {
                header("location: areaPrivada.php");
             }
                else
                {
                    ?>
                    <div class="msg-erro">
                 "Email e/ou Senha estão incorretos!";
                    </div>
                    <?php
                }
            }
            else
                {
                   ?>
                   <div class="msg-erro">
                        " Erro:" .$u->msgERRO;
                     </div>
                     <?php
                      }
                     } else
                {
                  ?>
                 <div class="msg-erro">
                   "Preencha todos os campos!";
                  </div>
                 <?php
            }
    }

?>

</body>
</html>
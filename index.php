<?php
require_once 'config.php';

require_once DBAPI;

if(!isset($_SESSION))
    session_start();

//Login de Usários
if(isset($_POST['login'])){
  
  
  $erro = array();

  // Captação de dados
    $senha = $_POST['senha'];
    $_SESSION['login'] = $mysqli->escape_string($_POST['login']);
    $_SESSION['senha'] = md5(md5($_POST['senha']));//criptografando a senha duas vezes   
    // Validação de dados
    if(!filter_var($_SESSION['login']))
        $erro[] = "Preencha seu <strong>Login</strong> corretamente.";

    if(strlen($senha) < 0 || strlen($senha) > 16)
        $erro[] = "Preencha sua <strong>senha</strong> corretamente.";

    if(count($erro) == 0){

        $sql = "SELECT senha as senha, id as valor, tipoPerfil as tipoPerfil 
        FROM usuarios 
        WHERE login = '$_SESSION[login]'";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();
        
        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>Login</strong> informado.";

        elseif(strcmp($dado['senha'], ($senha)) == 0){
            $_SESSION['usuario_logado'] = $dado['valor'];
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='menu.php';</script>";
            $_SESSION['tipoPerfil'] = $dado['tipoPerfil'];//aqui estou passando o nivel de acesso do usuario
            exit();
            unset($_SESSION['login']);
        }

    }


}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/index.css" rel="stylesheet">


</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sistema Lounge Cars</h3>
                        </div>
                        <div class="panel-body">
                            <?php // mostra os erros
                            if(isset($erro)) 
                                if(count($erro) > 0){ ?>
                                    <div class="alert alert-danger">
                                        <?php foreach($erro as $msg) echo "$msg <br>"; ?>
                                    </div>
                                <?php 
                                }
                                ?>
                            <form class="form-signin" method="post">
                                <h2 class="form-signin-heading">Efetue Login</h2>
                                    <p class="form-signin-heading">Digite seu login e senha</p>
                                        <label for="inputEmail" class="sr-only">Login</label>
                                            <input name="login" type="text" id="inputEmail" class="form-control" placeholder="Login" required autofocus><br>
                                        <label for="inputPassword" class="sr-only">Senha</label>
                                            <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                                                <div class="checkbox">
                                                    <label> 
                                               
                                                    </label>
                                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-ok"></span> Entrar </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
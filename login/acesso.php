<?php
 # Verificando abaixo se o nível do usuário que foi autenticado é diferente do
 # nível do programa
 if ($_SESSION['tipoPerfil'] <> $nivel_programa) {
 echo "<h1>Você não possui acesso nivel de acesso para esta pagina. Aguarde redirecionamento em
instantes.</h1>";
 echo "<meta http-equiv=refresh content=\"2;URL=../menu.php\">";
 exit;
 }
?>
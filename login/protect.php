<?php
if(!function_exists("protect")){
//verifica se ha alguma seção aberta
  function protect(){
//se não houver e criada
    if(!isset($_SESSION))
		session_start();
//verifica se o valor da variavel e numerica e se positivo ou negativo 		
		if(!isset($_SESSION['usuario_logado'])|| !is_numeric($_SESSION['usuario_logado'])){
				header("location: index.php");
    }
}
}

?>
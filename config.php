<?php
/** O nome do banco de dados*/
define('DB_NAME', 'projeto-2');
/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');
/** nome do host do MySQL */
define('DB_HOST', 'localhost');

    
/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/projeto/');
	
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');
	
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');

/** ________________________________________________________________________________________________________________________________**/
/** abertura do banco de dados para o login //conexao.php///  **/

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "projeto-2";
$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

/** ________________________________________________________________________________________________________________________________**/
/** abertura do banco de dados para o select ///  **/
$sevirdor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "projeto-2";

$conn = mysqli_connect($sevirdor, $usuario, $senha, $dbname
);
if(!$conn){
die ("Falha na conexão: ". mysqli_connect_erro());
}else{
    //echo "conexão realizada"
}
?>
